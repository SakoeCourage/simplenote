<?php 

namespace App\Traits;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Route;
use App\Models\Post;


trait PostTrait{



      /**
     * get Want Items to Send per Given route
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $post
     * @return \Illuminate\Database\Eloquent\Builder  $post
     */    
    public function getPostItemsPerRoute(){
        $currentRoute = Route::getCurrentRoute()->uri();
        $post = Post::query();
        if($currentRoute == '/'){
            $post = $post->where('isArchive','=',0);

        }   
        elseif($currentRoute == 'trash'){


            $post = $post->onlyTrashed();  
         
        }elseif($currentRoute == 'archive'){
            
            
            $post = $post->where('isArchive','=',1);

        }
        return $post;

    }    


}