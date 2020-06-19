<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class CheckoutadminController extends Controller
{


    public function __construct(){

        $profiles = Profile::get();
        View::share('profiles',$profiles);
    }


    public function orders(){

        //$payment = Payment::with('order')->get();
        //return $payment;
        //exit();
        $orders = Order::with('customer')
            ->leftJoin('payments','payments.order_id','=','orders.id')
            ->select("orders.id","orders.customer_id","orders.shipping_id","orders.total","orders.status",
                "payments.status as p_status","payments.type as p_type")
            ->orderBy('id','DESC')
            ->get();
        //return $orders;
        //exit();
       return view('admin.checkout.manage-order',compact('orders'));
    }




    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id){
        $id = base64_decode($id);
        $order = Order::find($id);
        $order->delete();
        setMessage('success','Order has been Successfully Deleted !');
        return redirect()->back();
    }




    public function customerInfo(){
        $customerinfo =Customer::get();
        //return $customerinfo;
        //exit();
        return view('admin.checkout.customer-info',compact('customerinfo'));
    }


    public function customerDelete($id){
        $id = base64_decode($id);
        $customer = Customer::find($id);
        $customer->delete();
        setMessage('success','Customer has been Successfully Deleted !');
        return redirect()->back();
    }


}
