<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Auth;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function show(){

        if(Auth::check()){
            return redirect()->route('feed');
        }

        return view('pages.welcome_page');
    }
}
