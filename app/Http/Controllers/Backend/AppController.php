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

    public function updateAppsImage()
    {
        //
    }
}
