<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\WelcomeEmail;


class MailController extends Controller
{
    //
    function sendEmail(){
        $to="ironspider714@gmail.com";
        $msg="This is a test mail";
        $subject="Testing Subject of  Mail";
        Mail::to($to)->send(new WelcomeEmail($msg,$subject));
    }
}
