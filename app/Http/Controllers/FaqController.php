<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class FaqController extends Controller
{
    //Returns page with "faqs" information
    public function show(){
        
        return view('pages.faq');
    }
}
