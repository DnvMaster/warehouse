<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\App;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class AppController extends Controller
{
    public function updateApps(Request $request, $id)
    {
        $apps = App::findOrFail($id);
        $apps->update($request->only(['title','description']));
        return response()->json(['success' => true, 'message' => 'Обновлено успешно']);
    }

    public function updateAppsImage(Request $request, $id)
    {
        $apps = App::findOrFail($id);
        if($request->file('image')) {
            $image = $request->file('image');
            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            $img = $manager->read($image);
            $img->resize(306,481)->save(public_path('upload/apps/'.$name_gen));
            $save_url = 'upload/apps/'.$name_gen;

            if(file_exists(public_path($apps->image))) {
                @unlink(public_path($apps->image));
            }

            $apps->update([
                'image' => $save_url,
            ]);

            return response()->json([
                'success' => true,
                'image_url' => asset($save_url),
                'message' => 'Изображение успешно обновлено',
            ]);
        }
        return response()->json(['success'=> false, 'message' => 'Не удалось загрузить изображение.'], 400);
    }
}
