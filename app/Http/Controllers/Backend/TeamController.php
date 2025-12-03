<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Team;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class TeamController extends Controller
{
    public function allTeam()
    {
        $teams = Team::latest()->get();
        return view('admin.backend.team.all_team', compact('teams'));
    }

    public function addTeam()
    {
        return view('admin.backend.team.add_team');
    }

    public function storeTeam(Request $request)
    {
        if($request->file('image')) {
            $image = $request->file('image');
            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()).'.'. $image->getClientOriginalExtension();
            $img = $manager->read($image);
            $img->resize(306,397)->save(public_path('upload/team/'. $name_gen));
            $save_url = 'upload/team/'.$name_gen;
            Team::create([
                'name' => $request->name,
                'position' => $request->position,
                'image' => $save_url,
            ]);
            $notification = array(
                'message' =>'Данные успешно добавлены',
                'alert-type' => 'success',
            );
            return redirect()->route('all.team')->with($notification);
        }
    }

    public function editTeam($id)
    {
        $editeam = Team::find($id);
        return view('admin.backend.team.edit_team',compact('editeam'));
    }

    public function updateTeam(Request $request)
    {
        $team_id = $request->id;
        if ($request->file('image')) {
            $image = $request->file('image');
            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            $img = $manager->read($image);
            $img->resize(306,397)->save(public_path('upload/team/'.$name_gen));
            $save_url = 'upload/team/'.$name_gen;
            Team::find($team_id)->update([
                'name' => $request->name,
                'position' => $request->position,
                'image' => $save_url,
            ]);
            $notification = array(
                'message' => 'Данные об изображении клиента обновлены',
                'alert-type' => 'success'
            );
            return redirect()->route('all.team')->with($notification);        
        } else {
            Team::find($team_id)->update([
                'name' => $request->name,
                'position' => $request->position, 
            ]);
            
            $notification = array(
                'message' => 'Данные об изображении клиента не обновлены',
                'alert-type' => 'success'
            );
            return redirect()->route('all.team')->with($notification);  
        }
    }
    public function deleteTeam($id)
    {
        $team = Team::find($id);
        $img = $team->image;
        unlink($img);
        Team::find($id)->delete();
        $notification = array(
            'message' => 'Данные успешно удалены',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }
}
