<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Usability;
use App\Models\Connect;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class UsabilityController extends Controller
{
    public function getUsability()
    {
        $usability = Usability::find(1);
        return view('admin.backend.usability.get_usability',compact('usability'));
    }

    public function updateUsability(Request $request)
    {
        $usability_id = $request->id;
        $usability = Usability::find($usability_id);

        if($request->file('image')) {
            $image = $request->file('image');
            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            $img = $manager->read($image);
            $img->resize(560,400)->save(public_path('upload/usability/'.$name_gen));
            $save_url = 'upload/usability/'.$name_gen;

            if(file_exists(public_path($usability->image))) {
                @unlink(public_path($usability->image));
            }

            Usability::find($usability_id)->update([
                'title' => $request->title,
                'description' => $request->description,
                'youtube' => $request->youtube,
                'link' => $request->link,
                'image' => $save_url,
            ]);
            $notification = array(
                'message' => 'Изображение в секции Юзабилити успешно обновлено.',
                'alert-type' => 'success',
            );
            return redirect()->back()->with($notification);
        } else {
            Usability::find()->update([
                'title' => $request->title,
                'description' => $request->description,
                'youtube' => $request->youtube,
                'link' => $request->link,
            ]);
            $notification = array(
                'message' => 'Изображение в секции Юзабилити не обновлено.',
                'alert-type' => 'success',
            );
            return redirect()->back()->with($notification);
        }
    }

    public function allConnect()
    {
        $allConnect = Connect::latest()->get();
        return view('admin.backend.connect.all_connect',compact('allConnect'));
    }

    public function addConnect()
    {
        $addConnect = Connect::latest()->get();
        return view('admin.backend.connect.add_connect',compact('addConnect'));
    }

    public function storeConnect(Request $request)
    {
        Connect::create([
            'title' => $request->title,
            'description' => $request->description,
        ]);
        $notification = array(
            'message' => 'Данные успешно обновлены.',
            'alert-type' => 'success',
        );
        return redirect()->route('all.connect')->with($notification);
    }
}