<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BlogCategory;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use SebastianBergmann\CodeCoverage\Report\PHP;

class BlogController extends Controller
{
    public function blogCategory()
    {
        $blogCategory = BlogCategory::latest()->get();
        return view('admin.backend.blogcategory.blog_category', compact('blogCategory'));
    }

    public function storeBlogCategory(Request $request)
    {
        BlogCategory::insert([
            'category_name' => $request->category_name,
            'category_slug' => strtolower(str_replace('', '-', $request->category_name)),
        ]);
        $notification = array(
            'message' => 'Категория блога успешно добавлена.',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }

    public function editBlogCategory($id)
    {
        $editCategories = BlogCategory::find($id);
        return view('admin.backend.blogcategory.blog_edit_category', compact('editCategories'));
    }

    public function updateBlogCategory(Request $request)
    {
        $categories_id = $request->id;
        BlogCategory::find($categories_id)->update([
            'category_name' => $request->category_name,
            'category_slug' => strtolower(str_replace('', '-', $request->category_name)),
        ]);
        $notification = array(
            'message' => 'Категория успешно обновлёна',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function deleteBlogCategory($id) 
    {
        BlogCategory::find($id)->delete();
        $notification = array(
            'message' => 'Категория успешно удалёна',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification); 
    }
}
