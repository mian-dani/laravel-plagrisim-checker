<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function aboutUs()
    {
    return view('site.about-us');
    }
    public function courses()
    {
    return view('site.courses');
    }
    public function contactUs()
    {
    return view('site.contact-us');
    }
    public function gallery()
    {
    return view('site.gallery');
    }
}
