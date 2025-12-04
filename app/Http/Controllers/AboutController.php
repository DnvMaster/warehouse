<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\About;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

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

    public function updateAbout(Request $request)
    {
        $aboutus_id = $request->id;
        $about = About::find($aboutus_id);
        if ($request->file('image')) {
            $image = $request->file('image');
            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            $img = $manager->read($image);
            $img->resize(526,550)->save(public_path('upload/about/'.$name_gen));
            $save_url = 'upload/about/'.$name_gen;
            if(file_exists(public_path($about->image))) {
                @unlink(public_path($about->image));
            }
            About::find($aboutus_id)->update([
                'title' => $request->title,
                'description' => $request->description,
                'image' => $save_url,
            ]);
            $notification = array(
                'message' => 'Данные с изображением успешно обновлены.',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification); 
        } else {
            About::find($aboutus_id)->update([
                'title' => $request->title,
                'description' => $request->description, 
            ]);
            $notification = array(
                'message' => 'Ошибка - Изображение не обновлено',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);  
        }
    }

}
