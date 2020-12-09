<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index()
    {
        return view('contactus');
    }

    public function send_contact(Request $request)
    {
        $data = array('name' => $request->get('name'), 'email' => $request->get('email'), 'mobile' => $request->get('mobile'), 'messages' => $request->get('message'), 'url' => 'http://' . request()->getHttpHost());
        Mail::send('mail.contact_details', $data, function ($message) {
            $message->to('mohitsrisai.vejendla@flemingcollege.ca', 'mohitsrisai.vejendla@flemingcollege.ca')->subject('Contact Details - Library Self Checkout');
            $message->from(env('MAIL_USERNAME'), 'Library Self Checkout');
        });
        $response = array(
            'status' => 'success',
            'title' =>  'Success',
            'msg'   =>  'Contact Details Send Successfully'
        );
        return response()->json($response, 200);
    }
}
