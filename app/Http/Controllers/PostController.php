<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Traits\PostTrait;


class PostController extends Controller
{
    use PostTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($slug= null)
    {   

         // Query Post Per Route
         $post = $this->getPostItemsPerRoute();
        
        
        // Chech if incoming request has slug
         $slug = request()->route('slug');

        

        // Query Only Users Post
         $currentItems = "All";
        if(request()->has('user_id')){
            $post = $post->where('user_id','=',request()->user_id);
            $currentItems = "My";

        }

     
   
        return Inertia::render('Home', [
                            'post' => $post->search(request()->only('search','sort'))
                            ->latest()->paginate(10)
                            ->withQueryString()
                            ->through(fn($post)=>[
                            'id' =>$post->id,
                            'body' => $post->body,
                            'caption' => $post->caption,
                            'image' => $post->image,
                            'slug' => $post->slug,
                            'author' => $post->User ? $post->User->name : null,
                            'created_at'=>$post->created_at,
                            
                            'canEdit' =>Auth()->user() ? Request()->user()->can('update',$post) : false,
                            
                            ]),
                            'filters' => request()->only('search','sort'),
                             'currentItems' => $currentItems,
                             'noteDetails' =>  [
                                    'noteDetails' =>Post::where('slug','=',$slug)->with('User:id,name')->get(),
                                    'canEdit' => Auth()->user() ? Request()->user()->can('update', Post::where('slug','=',$slug)->first()) : false
                             ]

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Post $post)
    {
        $data = request()->validate([
                'image' => ['required','string'],
                'caption' => ['required','string'],
                'body' => ['required','string','max:255'],


        ]);

        $data = array_merge(
             [  'user_id' => Auth()->user()->id ],$data

        );
        $post->create($data);

        return redirect('/');


       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show()
    {       
           return Inertia('Create',[]);

    }

    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        if(request()->user()->can('update',$post)){

            return inertia('Edit',[

                'Post' => $post
    
    ])  ;
            
        }else{
            abort(403);
        }



    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Post $post)
    {   

        
            $post->update([
                'body' => request()->body,
                'caption' => request()->caption

            ]);


            return redirect('/');

                 
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
          $post->delete();

          return redirect('/');



    }

    public function showArchivePage(){
            return inertia('Archive');

    }


    public function markAsArchive($id){
            $post = Post::where('id','=',$id)->first();
            

            $post->update([
                'isArchive' => 1
            ]);
            return redirect()->intended()->with([
                "message" => "added to archive"

            ]);

    }
    public function removefromArchive($id){
            $post = Post::where('id','=',$id)->first();
           
            

            $post->update([
                'isArchive' => 0
            ]);
            return redirect('/archive')->with([
                "message" => "removed from archive"


            ]);

    }

    public function getPostItemBySlug(Post $post){

        if(request()->expectsJson()){
            return(
                [
                  'noteDetails' =>   Post::where('slug','=', $post->slug)->with('User:id,name')->first(),
                  'canEdit' => Auth()->user() ? Request()->user()->can('update', $post) : false
                ]
                );

        }

    }
}
