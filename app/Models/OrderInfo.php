<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderInfo extends Model
{
    protected $fillable =['order_id','product_id','product_name','product_price','product_qty'];

   // public function order(){
    //    return $this->belongsTo(Order::class);
    //}
}
