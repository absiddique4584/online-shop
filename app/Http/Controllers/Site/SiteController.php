<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Condition;
use App\Models\Product;
use App\Models\Profile;
use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Brand;
use App\Models\About;
use App\Models\Policy;
class SiteController extends Controller
{
   public function index(){
       $abouts = About::get();
       $sliders = Slider::select('title','sub_title','image','url')->where('status','active')->get();
       $brands = Brand::select('brand_name')->where('status',Brand::ACTIVE_BRAND)->where('top_brand','1')->get();
       $categories = Category::with('sub_categories')->where('status','active')->get();
       $profiles = Profile::get();
       $conditions = Condition::get();
       $policies = Policy::get();
       return view('site.index',compact('sliders','categories','brands','profiles','abouts','conditions','policies'));
   }

   public function category($slug){
       $abouts = About::get();
       $brands = Brand::select('brand_name')->where('status',Brand::ACTIVE_BRAND)->where('top_brand','1')->get();
       $id = SubCategory::where('slug',$slug)->pluck('id');
       $products =  Product::where('subcat_id',$id)->where('status',Product::ACTIVE_PRODUCT)->get();
       $profiles = Profile::get();
       $conditions = Condition::get();
       $policies = Policy::get();
      return view('site.category',compact('brands','products','profiles','abouts','conditions','policies'));

   }public function product($slug){
       $abouts = About::get();
       $brands = Brand::select('brand_name')->where('status',Brand::ACTIVE_BRAND)->where('top_brand','1')->get();
       $id = Product::where('slug',$slug)->pluck('id');
       $product =  Product::where('id',$id)->where('status',Product::ACTIVE_PRODUCT)->first();
       $profiles = Profile::get();
       $conditions = Condition::get();
       $policies = Policy::get();
      return view('site.product',compact('brands','product','profiles','abouts','conditions','policies'));
   }

   public function about(){
       $brands = Brand::select('brand_name')->where('status',Brand::ACTIVE_BRAND)->where('top_brand','1')->get();
       $profiles = Profile::get();
       $abouts = About::get();
       $conditions = Condition::get();
       $policies = Policy::get();
       return view('site.about',compact('abouts','brands','profiles','conditions','policies'));
   }

   public function condition(){
       $abouts = About::get();
       $brands = Brand::select('brand_name')->where('status',Brand::ACTIVE_BRAND)->where('top_brand','1')->get();
       $profiles = Profile::get();
       $conditions = Condition::get();
       $policies = Policy::get();
       return view('site.condition',compact('abouts','brands','profiles','conditions','policies'));
   }
   public function policy(){
       $abouts = About::get();
       $brands = Brand::select('brand_name')->where('status',Brand::ACTIVE_BRAND)->where('top_brand','1')->get();
       $profiles = Profile::get();
       $conditions = Condition::get();
       $policies = Policy::get();
       return view('site.policy',compact('abouts','brands','profiles','conditions','policies'));
   }

}
