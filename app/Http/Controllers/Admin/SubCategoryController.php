<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $categories = SubCategory::with('category')->latest()->get();

        return view('admin.sub-category.manage', compact('categories'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $categories = Category::orderBy('name', 'ASC')->get();
        return view('admin.sub-category.create', compact('categories'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'category' => 'required',
            'name'     => 'required|min:5|max:20',
        ]);
        $category = null;
        try {
            $name     = $request->name;
            $category = Category::create([
                'category_id' => $request->category,
                'name'        => $name,
                'slug'        => slugify($name)
            ]);
        } catch (Exception $exception) {
            $category = false;
        }

        if ($category) {
            setMessage('success', 'Yay! A sub category has been successfully created.');
        } else {
            setMessage('danger', 'Oops! Unable to create a new sub category.');
        }
        return redirect()->back();
    }


    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $id       = base64_decode($id);
        $subCat = SubCategory::find($id);

        $categories = Category::orderBy('name', 'ASC')->get();

        return view('admin.sub-category.edit', compact('subCat', 'categories'));
    }

    public function update(Request $request)
    {
        $id = $request->id;

        $category = SubCategory::find($id);

        $request->validate([
            'category' => 'required',
            'name'     => 'required|min:5|max:20',
        ]);

        $success = null;
        try {
            $name    = $request->name;
            $success = $category->update([
                'category_id' => $request->category,
                'name'        => $name,
                'slug'        => slugify($name)
            ]);
        } catch (Exception $exception) {
            $success = false;
        }

        if ($success) {
            setMessage('success', 'Yay! A sub category has been successfully updated.');
        } else {
            setMessage('danger', 'Oops! Unable to update sub category.');
        }
        return redirect()->back();
    }

    /**
     * @param $id
     * @param $status
     */
    public function updateStatus($id, $status)
    {
        $category         = SubCategory::find($id);
        $category->status = $status;
        $category->save();
    }


    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        $id       = base64_decode($id);
        $category = SubCategory::find($id);
        $category->delete();
        setMessage('success', 'Category has been successfully deleted!');
        return redirect()->back();
    }
}
