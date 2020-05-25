<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
       $profiles = Profile::get();
        return view('admin.dashboard',compact('profiles'));
    }
}
