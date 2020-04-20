<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Mail;

class MailController extends Controller
{
    public function send(Request $request)
    {
        $data = array('body' => $request->get('content'));
        Mail::send(['text'=>'contact'], $data, function($message) use ($request) {
            $message->to('contact@kilalo.io')->subject($request->get('subject'));
            $message->from($request->get('email'),$request->get('name'));
         });

        return response()->json([
           "statut" => "success",
           "message" => "Mail sent."
        ],200);
    }
}