<?php

namespace App\Http\Controllers;

use App\Models\User;
use Inertia\Inertia;
use Illuminate\Http\Request;


class PageController extends Controller
{   
    
    public function getUsers()
    {
        
        $user = User::get();
        return Inertia::render('Users', [
            'users' => $user->map(fn($user)=>[
                'id' => \App\Libraries\Helper::doubleUserID($user->id)
            ])
        ]);
    }
}
