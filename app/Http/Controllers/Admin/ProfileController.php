<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Profile;
use Exception;
use Image;

class ProfileController extends Controller
{


    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $profiles = Profile::get();
        return view('admin.profile.manage', compact('profiles'));
    }






    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'website_address' => 'required',
            'email' => 'required',
            'image' => 'required'
        ]);
        $profile = null;
        try {
            $image = $request->file('image');
            $fileEx = $image->getClientOriginalExtension();
            $fileName = date('Ymdhis.') . $fileEx;
            Image::make($image)
                ->resize(100, 100)
                ->save(public_path('uploads/profile/') . $fileName);
            //$image->move(public_path('uploads/slider/'), $fileName);

            $profile = Profile::create([
                'name' => $request->name,
                'address' => $request->address,
                'phone' => $request->phone,
                'website_address' => $request->website_address,
                'email' => $request->email,
                'image' => $fileName,
            ]);
        } catch (Exception $exception) {
            $profile = false;
        }

        if ($profile) {
            setMessage('success', 'Yay! A Profile has been successfully created.');
        } else {
            setMessage('danger', 'Oops! Unable to create a new Profile.');
        }
        return redirect()->back();
    }




    /**
     * @param $id
     * @param $name
     */
    public function changeprofileName($id ,$name){
        $profile = Profile::select('id','name')->find($id);
        $profile->name = $name;
        $profile->save();
    }


}
