<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class LoadMoreDataController extends Controller
{
   public function index(){
       return view('test.load-more-data');
   }
   public function load_more(Request $request){
    if ($request->ajax()){
       if ($request->id){
           $category = Category::where('id', '<', $request->id)->orderBy('id','DESC')->limit(4)->get();
       } else{
           $category = Category::orderBy('id','DESC')->limit(4)->get();
       }
    }
       return view('test.get-data',compact('category'));
}
}
