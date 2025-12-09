<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BlogCategory;
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
        $blog_category = BlogCategory::latest()->get();
        return view('admin.backend.post.add_post', compact('blog_category'));
    }

    public function storeBlogPost(Request $request)
    {
         if($request->file('image')) {
            $image = $request->file('image');
            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()).'.'. $image->getClientOriginalExtension();
            $img = $manager->read($image);
            $img->resize(746,500)->save(public_path('upload/post/'. $name_gen));
            $save_url = 'upload/post/'.$name_gen;
            BlogPost::create([
                'blog_category_id' => $request->blog_category_id,
                'post_title' => $request->post_title,
                'post_slug' => strtolower(str_ireplace(' ', '-', $request->post_title)),
                'long_description' => $request->long_description,
                'image' => $save_url,
            ]);
            $notification = array(
                'message' =>'Пост успешно создан.',
                'alert-type' => 'success',
            );
            return redirect()->route('all.blog.post')->with($notification);
        }  
    }

    public function editBlogPost($id)
    {
        $blog_edit = BlogPost::find($id);
        $blog_category = BlogCategory::latest()->get();
        return view('admin.backend.post.edit_post', compact('blog_edit','blog_category'));
    }

    public function updateBlogPost(Request $request)
   {
        $blog_edit_id = $request->id;
        if ($request->file('image')) {
            $image = $request->file('image');
            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            $img = $manager->read($image);
            $img->resize(746,500)->save(public_path('upload/post/'.$name_gen));
            $save_url = 'upload/post/'.$name_gen;
            BlogPost::find($blog_edit_id)->update([
                'blog_category_id' => $request->blog_category_id,
                'post_title' => $request->post_title,
                'post_slug' => strtolower(str_ireplace(' ', '-', $request->post_title)),
                'long_description' => $request->long_description,
                'image' => $save_url,
            ]);
            $notification = array(
                'message' =>'Пост успешно отредактирован.',
                'alert-type' => 'success',
            );
            return redirect()->route('all.blog.post')->with($notification); 
        } else {
            BlogPost::find($blog_edit_id)->update([
                'blog_category_id' => $request->blog_category_id,
                'post_title' => $request->post_title,
                'post_slug' => strtolower(str_ireplace(' ', '-', $request->post_title)),
                'long_description' => $request->long_description,
            ]);
            
            $notification = array(
                'message' => 'Данные об изображении не отредактированы',
                'alert-type' => 'success'
            );
    
            return redirect()->route('all.blog.post')->with($notification);  
        }
    }
}
