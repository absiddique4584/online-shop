<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Mail\Welcome;
use App\Models\About;
use App\Models\Brand;
use App\Models\Condition;
use App\Models\Customer;
use App\Models\Policy;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Session;
use Illuminate\Support\Facades\View;

class CheckoutController extends Controller
{
    public function __construct(){
        $brands = Brand::where('status',Brand::ACTIVE_BRAND)->where('top_brand',1)->get();
        View::share('brands',$brands);
    }

    public function index(){
        $profiles = Profile::get();
        $conditions = Condition::get();
        $policies = Policy::get();
        $abouts = About::get();
        return view('checkout.index',compact('profiles','conditions','policies','abouts'));
    }

    public function register(Request $request){
     $request->validate([
        'name' => 'required|min:5|max:30',
        'email' => 'required|unique:users,email',
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

     $details = [
         'name' => $customer->name,
     ];
    Mail::to($customer->email)->send(new Welcome($details));
     return 'ok';
    }
}
