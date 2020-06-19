<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Brand;
use App\Models\Condition;
use App\Models\Mail;
use App\Models\Policy;
use App\Models\Profile;
use Illuminate\Http\Request;
use Exception;



class MailController extends Controller
{




    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function contactUs(){
        $profiles = Profile::get();
        $abouts = About::get();
        $conditions = Condition::get();
        $policies = Policy::get();
        return view('site.contact-us',compact('profiles','abouts','conditions','policies'));
    }





    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request){
        $request->validate([
            'first_name'=>'required',
            'last_name'=>'required',
            'mobile'=>'required',
            'email'=>'required',
            'message'=>'required'
        ]);



        $mail =null;
        try {
            Mail::create([
                'first_name' =>$request->first_name,
                'last_name' =>$request->last_name,
                'mobile' =>$request->mobile,
                'email' =>$request->email,
                'message' =>$request->message,
            ]);
            $mail = true;
        }catch (Exception $exception){
            $mail = false;
        }
        if ($mail == true){
            setMessage('success','Mail Save Success !');
        }else{
            setMessage('danger','Something Wrong !');
        }
        return redirect()->back();
    }







}
