<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Carbon;

class ContactController extends Controller
{
    //
    public function Contact(){

        return view('frontend.contact');

    }// End Method

    public function StoreMessage(Request $request){

        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'subject' => 'required',
            'phone' => 'required',

        ],[
            'name.required' => 'Your Name is Required',
            'email.required' => 'Your Email is Required',
            'subject.required' => 'Please Fill the Subject\'s Part',
            'phone.required' => 'Your Phone Number is Required',
        ]);

        Contact::insert([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'phone' => $request->phone,
            'message' => $request->message,
            'created_at' => Carbon::now()
        ]);

        $notification = array(
            'message' => 'Your Message Has Been Submitted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }// End Method

    public function ContactMessage(){

        $contacts = Contact::latest()->get();
        return view('admin.contact.allcontact', compact('contacts'));

    }// End Method

    public function ShowMessage($id){
        $message = Contact::findOrFail($id);
        return view('admin.contact.showmessage', compact('message'));

    }// End Method

    public function DeleteContact($id){
        Contact::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Contact Message Has Been Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);   
    }// End Method
}
