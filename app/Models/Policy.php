<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Policy extends Model
{
    protected $fillable = ['privacy_policy','collect_info','utilize_info'];
}
