<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $fillable= ['brand_name','brand_slug','status'];
    public const ACTIVE_BRAND = 1;


    public function products(){
        return $this->hasMany(Product::class);
    }
}
