<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($slug= null)
    {   
   
        
        $slug = request()->route('slug');


        
        return Inertia::render('Home', [
                            'post' => Post::latest()->paginate(10)->through(fn($post)=>[
                            'id' =>$post->id,
                            'body' => $post->body,
                            'caption' => $post->caption,
                            'image' => $post->image,
                            'slug' => $post->slug,
                            'author' => $post->User ? $post->User->name : null,
                            'canEdit' =>Auth()->user() ? Request()->user()->can('update',$post) : false,
                            'noteDetails' =>   fn()=>Post::where('slug','=',$slug)->with('User:id,name')->get()
                ]),
               

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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {       
            $item = Post::where('slug','=',$slug)->firstorFail();

            return inertia('Home');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}
