<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Exception;
use App\Models\Product;

class ProductController extends Controller
{

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $products = Product::select('id', 'name', 'model', 'buying_price', 'selling_price', 'special_price', 'special_start', 'special_end', 'quantity', 'thumbnail', 'status')->orderBy('id', 'desc')->get();

        return view('admin.product.manage', compact('products'));
    }


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('admin.product.create');
    }


    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'          => 'required',
            'model'         => 'required',
            'buying_price'  => 'required',
            'selling_price' => 'required',
            'special_price' => 'required',
            'special_start' => 'required',
            'special_end'   => 'required',
            'quantity'      => 'required',
            'thumbnail'     => 'required',
        ]);
        $product = null;
        try {
            $image = $request->file('thumbnail');
            $fileEx = $image->getClientOriginalExtension();
            $fileName = date('Ymdhis.') . $fileEx;
            $image->move(public_path('uploads/product/'), $fileName);

            $product = Product::create([
                'name'  => $request->name,
                'model' => $request->model,
                'buying_price'  => $request->buying_price,
                'selling_price'  => $request->selling_price,
                'special_price'  => $request->special_price,
                'special_start'  => $request->special_start,
                'special_end'  => $request->special_end,
                'quantity'   => $request->quantity,
                'thumbnail' => $fileName,

            ]);
        } catch (Exception $exception) {
            $product = false;
        }

        if ($product) {
            setMessage('success', 'Yay! A Product has been successfully created.');
        } else {
            setMessage('danger', 'Oops! Unable to create a new Product.');
        }
        return redirect()->back();
    }


    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $id = base64_decode($id);
        $products = Product::find($id);

        return view('admin.product.edit', compact('products'));
    }


    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $products = Product::find($id);

        $request->validate([
            'name'          => 'required',
            'model'         => 'required',
            'buying_price'  => 'required',
            'selling_price' => 'required',
            'special_price' => 'required',
            'special_start' => 'required',
            'special_end'   => 'required',
            'quantity'      => 'required',
            'thumbnail'     => 'required',
        ]);

        $success = null;
        try {
            $image = $request->file('image');
            $fileEx = $image->getClientOriginalExtension();
            $fileName = date('Ymdhis.') . $fileEx;
            $image->move(public_path('uploads/product/'), $fileName);

            $success = $products->update([
                'name'  => $request->name,
                'model' => $request->model,
                'buying_price'  => $request->buying_price,
                'selling_price'  => $request->selling_price,
                'special_price'  => $request->special_price,
                'special_start'  => $request->special_start,
                'special_end'  => $request->special_end,
                'quantity'   => $request->quantity,
                'thumbnail' => $fileName,
            ]);
        } catch (Exception $exception) {
            $success = false;
        }

        if ($success) {
            setMessage('success', 'Yay! A Product has been successfully updated.');
        } else {
            setMessage('danger', 'Oops! Unable to update Product.');
        }
        return redirect()->back();
    }


    /**
     * @param $id
     * @param $status
     */
    public function updateStatus($id, $status)
    {
        $products = Product::find($id);
        $products->status = $status;
        $products->save();
    }


    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        try {
            $id = base64_decode($id);
            $products = Product::find($id);
            unlink(public_path('uploads/product/') . $products->image);
            $products->delete();
            setMessage('success', 'Product has been successfully deleted!');
        }catch (Exception $exception){
            setMessage('warning', "Oops! Something Wrong,Can't Delete!");
        }

        return redirect()->back();
    }
}
