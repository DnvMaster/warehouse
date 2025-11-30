<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Faq;

class FaqController extends Controller
{
    public function allFaqs()
    {
        $allfaqs = Faq::latest()->get();
        return view('admin.backend.faq.all_faq',compact('allfaqs'));
    }

    public function addFaqs()
    {
        $addfaqs = Faq::latest()->get();
        return view('admin.backend.faq.add_faq',compact('addfaqs'));
    }

    public function storeFaqs(Request $request)
    {
        Faq::create([
            'title' => $request->title,
            'description' => $request->description,
        ]);
        $notification = array(
            'message' => 'Вопрос успешно добавлен.',
            'alert-type' => 'success',
        );
        return redirect()->route('all.faqs')->with($notification);
    }

    public function editFaqs($id)
    {
        $editFaq = Faq::find($id);
        return view('admin.backend.faq.edit_faqs',compact('editFaq'));
    }

    public function updateFaqs(Request $request) 
    {
        $faqs_id = $request->id;
        Faq::find($faqs_id)->update([
            'title' =>$request->title,
            'description' => $request->description, 
        ]);
        $notification = array(
            'message' => 'Вопрос успешно обновлён',
            'alert-type' => 'success'
        );
        return redirect()->route('all.faqs')->with($notification); 
    }

    public function deleteFaqs($id) 
    {
         Faq::find($id)->delete();

        $notification = array(
            'message' => 'Вопрос успешно удалён',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification); 
    }
}