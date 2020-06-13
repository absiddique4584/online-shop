<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Mail\Welcome;
use App\Models\About;
use App\Models\Brand;
use App\Models\Condition;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderInfo;
use App\Models\Payment;
use App\Models\Policy;
use App\Models\Profile;
use App\Models\Shipping;
use Darryldecode\Cart\Cart;
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


     return redirect('checkout/shipping');
    }







    public function shipping(){
        $profiles = Profile::get();
        $conditions = Condition::get();
        $policies = Policy::get();
        $abouts = About::get();

        $customer = Customer::find( Session::get('customerId'))->select('name','email','phone')->first();

        return view('checkout.shipping',compact('profiles','conditions','policies','abouts','customer'));
    }









    public  function shippingInfo(Request $request){



        $request->validate([
            'name' => 'required|min:5|max:30',
            'email' => 'required',
            'phone' => 'required|min:11|max:11',
            'address' => 'required|string',

        ]);

        $shipping = Shipping::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,

        ]);
        Session::put('shippingId',$shipping->id);

        return redirect('checkout/payment');


    }

    public function payment(){
        $profiles = Profile::get();
        $conditions = Condition::get();
        $policies = Policy::get();
        $abouts = About::get();
        return view('checkout.payment',compact('profiles','conditions','policies','abouts'));
    }




    public function order(Request $request)
    {

        $profiles = Profile::get();
        $conditions = Condition::get();
        $policies = Policy::get();
        $abouts = About::get();

        $order = $this->insertOrder();


        Payment::create([
            "order_id" => $order->id,
            "type" => $request->type
        ]);

        $this->insertorderInfo($order->id);


        \Cart::clear();
        return view('checkout.success', compact('profiles', 'conditions', 'policies', 'abouts'));


    }




    private function insertOrder(){
        $order = Order::create([
            "customer_id" => Session::get('customerId'),
            "shipping_id" => Session::get('shippingId'),
            "total" => \Cart::getTotal(),
        ]);
        return $order;
    }





    private function insertorderInfo($orderId){

        foreach (\Cart::getContent() as $item){
        OrderInfo::create([
            "order_id" => $orderId,
            "product_id" => $item->id,
            "product_name" => $item->name,
            "product_price" => $item->price,
            "product_qty" => $item->quantity,

        ]);
        }
    }
}
