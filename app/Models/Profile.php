<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
  protected $fillable =['name','address','phone','website_address','email','image','create'];
}
