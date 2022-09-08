<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Logout extends Controller
{
    public function  __construct(){

        $this->middleware('auth');
    }

    public function logout(){
            Auth::logout();
        

            return redirect('/');

    }

}