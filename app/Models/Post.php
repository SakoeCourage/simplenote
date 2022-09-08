<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;



class Post extends Model
{
    use Sluggable, HasFactory ,SoftDeletes;

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'caption'
            ]
        ];
    }

   
    protected $guarded=['id'];

    public function User(){
    return $this->belongsTo(User::class);

    }

    public function scopeSearch($query, array $filters){
        $query->when($filters['search'] ?? false, function($query, $search){
            $query->where('caption', 'Like', '%' . $search . '%')
            ->orwhere('body', 'Like', '%' . $search . '%');
            })

            ->when($filters['sort'] ?? false, function($query,$sort){
         
            if($sort === 'asc'){
                $query->orderBy('created_at','asc');
            }else{
                $query->orderBy('created_at','desc') ;
            }
    });



    }

}
