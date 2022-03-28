<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PatternController extends Controller{

    // Views

    function homeView(){ return view('home'); }
    function aboutView(){ return view('about'); }
    function branchesView(){ return view('branches'); }
    function contactView(){ return view('contact'); }

}