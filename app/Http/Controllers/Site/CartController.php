<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Condition;
use App\Models\Policy;
use App\Models\Product;
use App\Models\Profile;
use App\Models\Slider;
use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class CartController extends Controller
{





    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function add(Request $request)
    {
        $product = Product::select('name', 'slug', 'selling_price', 'special_price', 'special_start', 'special_end', 'thumbnail')->find($request->id);

        $price = false;
        if ($product->special_start <= date('Y-m-d') && $product->special_end >= date('Y-m-d')) {
            $price = true;
        }

        \Cart::add([
            'id'         => $request->id,
            'name'       => $product->name,
            'price'      => $price ? $product->special_price : $product->selling_price,
            'quantity'   => 1,
            'attributes' => [
                'slug'      => $product->slug,
                'thumbnail' => $product->thumbnail
            ],
        ]);

        return redirect('cart/show');
    }





    public function show(){
        #$items = \Cart::getContent();
        $abouts = About::get();
        $profiles = Profile::get();
        $conditions = Condition::get();
        $policies = Policy::get();
     return view('cart.show',compact('abouts','profiles','conditions','policies'));
    }




    public function remove(Request $request){
        \Cart::remove($request->id);
        return redirect()->back();
    }




    public function update(Request $request){
        \Cart::update($request->id, array(
            'quantity' => array(
                'relative' => false,
                'value' => $request->quantity
            ),
        ));
        return redirect()->back();
    }
}



