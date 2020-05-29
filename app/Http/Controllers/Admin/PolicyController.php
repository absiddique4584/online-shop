<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Exception;
use App\Models\Profile;
use App\Models\Policy;
class PolicyController extends Controller
{




    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(){
        $policies =  Policy::latest()->get();
        $profiles = Profile::select('name','image')->get();

        return view('admin.policy.manage',compact('policies','profiles'));
    }




    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(){
        $profiles = Profile::select('name','image')->get();
        return view('admin.policy.create',compact('profiles'));
    }




    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request){

        $request->validate([
            'privacy_policy'=>'required',
            'collect_info'=>'required',
            'utilize_info'=>'required'
        ]);
        $policies =null;
        try {

            Policy::create([
                'privacy_policy' =>$request->privacy_policy,
                'collect_info' =>$request->collect_info,
                'utilize_info' =>$request->utilize_info,
            ]);
            $policies = true;
        }catch (Exception $exception){
            $policies = false;
        }
        if ($policies == true){
            setMessage('success','Policy Save Success !');
        }else{
            setMessage('danger','Something Wrong !');
        }
        return redirect()->back();
    }




    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id){
        $id = base64_decode($id);
        $policies= Policy::find($id);
        $profiles = Profile::select('name','image')->get();
        return view('admin.policy.edit',compact('policies','profiles'));
    }





    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id){
        $policies = Policy::find($id);

        $request->validate([
            'privacy_policy'=>'required',
            'collect_info'=>'required',
            'utilize_info'=>'required'
        ]);

        $success =null;
        try {
            $policies->update([
                'privacy_policy' =>$request->privacy_policy,
                'collect_info' =>$request->collect_info,
                'utilize_info' =>$request->utilize_info,
            ]);
            $success = true;
        }catch (Exception $exception){
            $success = false;
        }
        if ($success == true){
            setMessage('success','Policies updated Successfully !');
        }else{
            setMessage('danger','Something Wrong !');
        }
        return redirect()->back();
    }





    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id){
        $id = base64_decode($id);
        $policies = Policy::find($id);
        $policies->delete();
        setMessage('success','Policies has been Successfully Deleted !');
        return redirect()->back();
    }
}
