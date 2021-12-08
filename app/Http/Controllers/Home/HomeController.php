<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //

    public function Index()
    {
    	return view('front.pages.index');
    }
    public function About()
    {
    	return view('front.pages.about');
    }
    public function Contact()
    {
    	return view('front.pages.contact');
    }
}
