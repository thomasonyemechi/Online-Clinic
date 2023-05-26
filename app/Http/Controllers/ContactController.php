<?php

namespace App\Http\Controllers;

use App\Mail\Sendtoadmin;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{

    function deleteContactMessage(Request $request)
    {
        foreach($request->data as $msg_id) {
            Contact::where('id', $msg_id)->delete();
        }
        return back()->with('success', count($request->data).' items has been deleted');
    }



    function seeContactMessage(Request $request)
    {
        foreach($request->data as $msg_id) {
            Contact::where('id', $msg_id)->update([
                'status' => 1
            ]);
        }
        return back()->with('success', count($request->data).' items marked as seen');
    }


    function sendContactMessage(Request $request)
    {
        $val = Validator::make($request->all(), [
            'name' => 'required|string|min:3|max:50',
            'email' => 'required|email',
            'phone' => 'required|string|max:30',
            'message' => 'required|string'
        ])->validate();

        Contact::create([
            'full_name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'message' => $request->message
        ]);


        Mail::to(env('MAIL_USERNAME'))->send(new Sendtoadmin($request->name, $request->email, $request->phone, $request->message));


        return back()->with('success', 'Your message have been sucessfully sent, we will reachout to you!');

    }
}
