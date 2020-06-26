<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Exception;

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
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function view($id){
        $id =base64_decode($id);
       // dd($id);
        $orders = Order::with('shipping','customer','order_info','payment')->find($id);
         //return $orders;
        return view('admin.checkout.view',compact('orders'));
    }






    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function invoice( $id){

        $id = base64_decode($id);
        $orders = Order::with('shipping','order_info')->find($id);
        $profiles = Profile::get();
        //return $orders;
        //return $profiles;
        return view('admin.checkout.invoice',compact('orders','profiles')) ;
    }





    /**
     *
     */
    public function printInvoice($id){
        $id = base64_decode($id);
        $orders = Order::with('shipping','order_info')->find($id);
        $profiles = Profile::get();
        return view('admin.checkout.print-invoice',compact('orders','profiles')) ;
    }





    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request){
       // dd($request->all());
        $request->validate([
           "id"=>'required',
           "order_status"=>'required',
           "payment_status"=>'required'
        ]);

        try {
            $order = Order::find($request->id);
            $order->status = $request->order_status;
            $order->update();

            $payment = Payment::where("order_id",$request->id)->first();
            $payment->status = $request->payment_status;
            $payment->update();

            setMessage('success','Status updated Successfully !');
        }catch (Exception $exception){
            setMessage('danger','Something Wrong !');
        }
        return redirect()->back();

    }







    /**
     * @param Request $request
     */
    public function updateStatus(Request $request){
        $request->validate([
            "id"=>'required',
            "status"=>'required',
        ]);
        try {
            $order = Order::find($request->id);
            $order->status = $request->status;
            $order->update();

        }catch (Exception $exception){

        }

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





    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function customerInfo(){
        $customerinfo =Customer::get();
        //return $customerinfo;
        //exit();
        return view('admin.checkout.customer-info',compact('customerinfo'));
    }





    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function customerDelete($id){
        $id = base64_decode($id);
        $customer = Customer::find($id);
        $customer->delete();
        setMessage('success','Customer has been Successfully Deleted !');
        return redirect()->back();
    }


}
