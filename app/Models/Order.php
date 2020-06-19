<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    protected $fillable =['customer_id','shipping_id','total'];

use SoftDeletes;
   // public function shipping(){
    //    return $this->belongsTo(Shipping::class)->select('id','name','phone');
   // }

    public function customer(){
        return $this->belongsTo(Customer::class)->select('id','name','phone');
    }

    public function orderinfo(){
        return $this->hasMany(OrderInfo::class);
    }

}
