<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\About;

class AboutController extends Controller
{
    public function about()
    {
        return view('home.about.about_us');
    }

    public function getAboutus()
    {
        $aboutus = About::find(1);
        return view('admin.backend.about.get_about', compact('aboutus'));
    }
}
