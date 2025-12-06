<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BlogPost;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class BlogPostController extends Controller
{
    public function allBlogPost()
    {
        $allPosts = BlogPost::latest()->get();
        return view('admin.backend.post.all_post', compact('allPosts'));
    }

    public function addBlogPost()
    {
        //
    }
}
