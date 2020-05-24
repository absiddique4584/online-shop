<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Brand;
class SiteController extends Controller
{
   public function index(){
       $sliders = Slider::select('title','sub_title','image','url')->where('status','active')->get();
       $brands = Brand::select('brand_name')->where('status',Brand::ACTIVE_BRAND)->where('top_brand','1')->get();
       $categories = Category::with('sub_categories')->where('status','active')->get();

       return view('site.index',compact('sliders','categories','brands'));
   }

   public function category($slug){
       $brands = Brand::select('brand_name')->where('status',Brand::ACTIVE_BRAND)->where('top_brand','1')->get();
      $id = SubCategory::where('slug',$slug)->pluck('id');
     $products =  Product::where('subcat_id',$id)->where('status',Product::ACTIVE_PRODUCT)->get();
      return view('site.category',compact('brands','products'));
   }
}
