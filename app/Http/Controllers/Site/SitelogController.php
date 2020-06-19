<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Brand;
use App\Models\Condition;
use App\Models\Customer;
use App\Models\Policy;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Session;

class SitelogController extends Controller
{





    public function registration(){
        $profiles = Profile::get();
        $conditions = Condition::get();
        $policies = Policy::get();
        $abouts = About::get();
        return view('site.site-registration',compact('profiles','policies','conditions','abouts'));
    }


    public function register(Request $request){
        $request->validate([
            'name' => 'required|min:5|max:30',
            'email' => 'required|unique:customers,email',
            'phone' => 'required|min:11|max:11',
            'password' => 'min:5|max:20|required_with:confirm_password|same:confirm_password',

        ]);

        $customer = Customer::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => bcrypt( $request->password ),

        ]);
        Session::put('customerId',$customer->id);

        //$details = [
        //   'name' => $customer->name,
        // ];
        //Mail::to($customer->email)->send(new Welcome($details));


        return redirect('/');
    }



    public function loggedin(){
        $profiles = Profile::get();
        $conditions = Condition::get();
        $policies = Policy::get();
        $abouts = About::get();
        return view('site.site-login',compact('profiles','policies','conditions','abouts'));
    }








    public function siteloggedin(Request $request)
    {
        //return $request;

        $request->validate([
            'email' => 'required',
            'password' => 'required|min:6',
        ]);

        $customer = Customer::where('email', $request->email)->select('id', 'email', 'password')->first();
        // return $customer;

        if ($customer) {
            if (password_verify($request->password, $customer->password)) {
                Session::put('customerId', $customer->id);
                return redirect('/');
            } else {
                setMessage('danger', 'These credentials Password do not match our records.');
                return redirect()->back();
            }
        } else {
            setMessage('danger', 'These credentials do not match our records.');
            return redirect()->back();
        }
    }


}
