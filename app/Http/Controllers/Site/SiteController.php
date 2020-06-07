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








    public function index(){
       $abouts = About::get();
        $brands = Brand::select('brand_name')->where('status',Brand::ACTIVE_BRAND)->where('top_brand',1)->get();
       $sliders = Slider::where('start', '<=', date('Y-m-d h:i:s'))
            ->where('end', '>=', date('Y-m-d h:i:s'))
           ->where('status','active')
           ->get();

       $categories = Category::with('sub_categories')->where('status','active')->get();
       $profiles = Profile::get();
       $conditions = Condition::get();
       $policies = Policy::get();
       #Home Page
        $s_offers =  Product::where('status',Product::ACTIVE_PRODUCT)
            ->orderBy('id','DESC')
            ->limit(12)
            ->get();
        $s_deals =  Product::where('status',Product::ACTIVE_PRODUCT)
            ->orderBy('id','ASC')
            ->limit(12)
            ->get();
        $hot_deals =  Product::where('status',Product::ACTIVE_PRODUCT)
            ->where('hot_deals',1)
            ->get();

        $f_products =  Product::where('status',Product::ACTIVE_PRODUCT)
            ->where('f_products',1)
            ->get();
        $n_arrivals =  Product::where('status',Product::ACTIVE_PRODUCT)
            ->orderBy('id','DESC')
            ->limit(24)
            ->get();




       return view('site.index',compact('sliders','categories','brands','profiles','abouts','conditions','policies','s_offers','s_deals','hot_deals','f_products','n_arrivals'));
   }







# public function category($slug){
#$id = Category::where('slug',$slug)->select('id')->first();
#$categories = Category::where('status',1)->get();
#$posts = Category::with('posts')->find($id->id);
#return view('category',compact('categories','posts'));
#}




#------------------
    public function brandWiseProduct() {
        $abouts = About::get();
        $profiles = Profile::get();
        $conditions = Condition::get();
        $policies = Policy::get();
        $brands = Brand::select('brand_name')->where('status',Brand::ACTIVE_BRAND)->where('top_brand',1)->get();

        $brand_wise_products = Brand::with('products')->get();
//return $brand_wise_products;
//exit();
        return view('site.brand-wise-product',compact('abouts','profiles','brands','conditions','policies','brand_wise_products'));

    }

#------------------






    /**
     * @param $slug
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
   public function category($slug){
       $abouts = About::get();
       #$products =  Product::where('subcat_id',$id)->where('status',Product::ACTIVE_PRODUCT)->get();
       $profiles = Profile::get();
       $brands = Brand::select('brand_name')->where('status',Brand::ACTIVE_BRAND)->where('top_brand',1)->get();
       $conditions = Condition::get();
       $policies = Policy::get();
      return view('site.category',compact('profiles','abouts','brands','conditions','policies','slug'));

   }







    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function loadMoreCatProduct(Request $request){
        $profiles = Profile::get();
        $abouts = About::get();
        $conditions = Condition::get();
        $brands = Brand::select('brand_name')->where('status',Brand::ACTIVE_BRAND)->where('top_brand',1)->get();
        $policies = Policy::get();

        $id       = SubCategory::where('slug', $request->slug)->pluck('id');
        if ($request->ajax()) {
            if ($request->id) {
                $products = Product::where('subcat_id', $id)->where('id', '<', $request->id)->orderBy('id', 'DESC')->limit(8)->get();
            } else {
                $products = Product::where('subcat_id', $id)->orderBy('id', 'DESC')->limit(8)->get();
            }
        }

        return view('site.get-category-product',compact('profiles','abouts','brands','conditions','policies','products'));
    }








    /**
     * @param $slug
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
   public function product($slug){
       $abouts = About::get();
       $brands = Brand::select('brand_name')->where('status',Brand::ACTIVE_BRAND)->where('top_brand',1)->get();
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
      return view('site.product',compact('product','profiles','brands','abouts','conditions','policies','relatedProducts','newProducts'));
   }







    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
   public function about(){
       $profiles = Profile::get();
       $abouts = About::get();
       $brands = Brand::select('brand_name')->where('status',Brand::ACTIVE_BRAND)->where('top_brand',1)->get();
       $conditions = Condition::get();
       $policies = Policy::get();
       return view('site.about',compact('abouts','profiles','conditions','brands','policies'));
   }






    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

   public function contactUs(){
       $profiles = Profile::get();
       $abouts = About::get();
       $brands = Brand::select('brand_name')->where('status',Brand::ACTIVE_BRAND)->where('top_brand',1)->get();
       $conditions = Condition::get();
       $policies = Policy::get();
       return view('site.contact-us',compact('profiles','abouts','brands','conditions','policies'));
   }







    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
   public function condition(){
       $abouts = About::get();
       $profiles = Profile::get();
       $brands = Brand::select('brand_name')->where('status',Brand::ACTIVE_BRAND)->where('top_brand',1)->get();
       $conditions = Condition::get();
       $policies = Policy::get();
       return view('site.condition',compact('abouts','profiles','brands','conditions','policies'));
   }





    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
   public function policy(){
       $abouts = About::get();
       $brands = Brand::select('brand_name')->where('status',Brand::ACTIVE_BRAND)->where('top_brand',1)->get();
       $profiles = Profile::get();
       $conditions = Condition::get();
       $policies = Policy::get();
       return view('site.policy',compact('abouts','profiles','brands','conditions','policies'));
   }

}
