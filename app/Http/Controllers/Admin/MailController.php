<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Profile;
use App\Models\Mail;
use Illuminate\Http\Request;

class MailController extends Controller
{
    public function manage(){
        $abouts =  About::latest()->get();
        $profiles = Profile::get();
        $mails = Mail::get();
        return view('admin.mail.manage',compact('abouts','profiles','mails'));
    }

    public function destroy($id){
        $id = base64_decode($id);
        $mail = Mail::find($id);
        $mail->delete();
        setMessage('success','Mail has been Successfully Deleted !');
        return redirect()->back();
    }



}
