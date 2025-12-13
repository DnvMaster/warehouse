<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;


class ContactController extends Controller
{
    public function contactUs()
    {
        return view('home.contact.contact');
    }

    public function contactMessage(Request $request)
    {
        Contact::create([
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,
        ]);
        $notification = array(
            'message' => 'Ваше сообщение успешно отправлено',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }

    public function contactAllMessage()
    {
        $messages = Contact::latest()->get();
        return view('admin.contact.all_message',compact('messages'));
    }

    public function contactMessageDelete($id)
    {
        Contact::find($id)->delete();
        $notification = array(
            'message' => 'Сообщение удалено успешно.',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }
}
