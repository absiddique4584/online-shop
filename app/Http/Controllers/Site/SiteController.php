<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Brand;
class SiteController extends Controller
{
   public function index(){
       $sliders = Slider::select('title','sub_title','image','url')->where('status','active')->get();
       $brands = Brand::select('brand_name')->where('status',1)->get();
       $categories = Category::select('name')->where('status','active')->get();
       $subcategories = SubCategory::with('category')->where('status','active')->get();

       return view('site.index',compact('sliders','categories','brands','subcategories'));
   }
}
