<?php

namespace App\Http\Controllers;

use App\Mail\mailContact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class emailContact extends Controller
{
    public function send(Request $request){
        Mail::to($request->email)->send(new mailContact($request));
        echo json_encode(['message' => 'ok']);
    }
}
