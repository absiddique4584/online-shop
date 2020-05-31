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
use Illuminate\Support\Facades\View;

class SiteController extends Controller
{


    public function __construct(){
        $brands = Brand::select('brand_name')->where('status',Brand::ACTIVE_BRAND)->where('top_brand','1')->get();
         View::share('brands', $brands);
    }



    public function index(){
       $abouts = About::get();
       $sliders = Slider::select('title','sub_title','image','url')->where('status','active')->get();
       $categories = Category::with('sub_categories')->where('status','active')->get();
       $profiles = Profile::get();
       $conditions = Condition::get();
       $policies = Policy::get();
       return view('site.index',compact('sliders','categories','profiles','abouts','conditions','policies'));
   }





    /**
     * @param $slug
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
   public function category($slug){
       $abouts = About::get();
       #$products =  Product::where('subcat_id',$id)->where('status',Product::ACTIVE_PRODUCT)->get();
       $profiles = Profile::get();
       $conditions = Condition::get();
       $policies = Policy::get();
      return view('site.category',compact('profiles','abouts','conditions','policies','slug'));

   }







    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function loadMoreCatProduct(Request $request){
        $profiles = Profile::get();
        $abouts = About::get();
        $conditions = Condition::get();
        $policies = Policy::get();

        $id       = SubCategory::where('slug', $request->slug)->pluck('id');
        if ($request->ajax()) {
            if ($request->id) {
                $products = Product::where('subcat_id', $id)->where('id', '<', $request->id)->orderBy('id', 'DESC')->limit(8)->get();
            } else {
                $products = Product::where('subcat_id', $id)->orderBy('id', 'DESC')->limit(8)->get();
            }
        }

        return view('site.get-category-product',compact('profiles','abouts','conditions','policies','products'));
    }








    /**
     * @param $slug
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
   public function product($slug){
       $abouts = About::get();
       $id = Product::where('slug',$slug)->pluck('id');
       $product =  Product::where('id',$id)->where('status',Product::ACTIVE_PRODUCT)->first();
       $relatedProducts =  Product::where('id' , '!=' , $product->id)
           ->where('subcat_id',$product->subcat_id)
           ->where('status',Product::ACTIVE_PRODUCT)
           ->orderBy('id','DESC')
           ->limit(10)
           ->get();
       $newProducts =  Product::where('status',Product::ACTIVE_PRODUCT)
           ->orderBy('id','DESC')
           ->limit(12)
           ->get();
       $profiles = Profile::get();
       $conditions = Condition::get();
       $policies = Policy::get();
      return view('site.product',compact('product','profiles','abouts','conditions','policies','relatedProducts','newProducts'));
   }





    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
   public function about(){
       $profiles = Profile::get();
       $abouts = About::get();
       $conditions = Condition::get();
       $policies = Policy::get();
       return view('site.about',compact('abouts','profiles','conditions','policies'));
   }

   public function condition(){
       $abouts = About::get();
       $profiles = Profile::get();
       $conditions = Condition::get();
       $policies = Policy::get();
       return view('site.condition',compact('abouts','profiles','conditions','policies'));
   }
   public function policy(){
       $abouts = About::get();
       $profiles = Profile::get();
       $conditions = Condition::get();
       $policies = Policy::get();
       return view('site.policy',compact('abouts','profiles','conditions','policies'));
   }

}
