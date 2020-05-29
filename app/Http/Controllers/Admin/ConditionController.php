<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ConditionRequest;
use Illuminate\Http\Request;
use Exception;
use App\Models\Condition;
use App\Models\Profile;
class ConditionController extends Controller
{

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(){
        $conditions =  Condition::latest()->get();
        $profiles = Profile::select('name','image')->get();

        return view('admin.condition.manage',compact('conditions','profiles'));
    }




    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(){
        $profiles = Profile::select('name','image')->get();
        return view('admin.condition.create',compact('profiles'));
    }




    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ConditionRequest $request){

        $conditions =null;
        try {

            Condition::create([
                'introduction' =>$request->introduction,
                'account' =>$request->account,
                'order' =>$request->order,
                'conduct' =>$request->conduct,
                'submission' =>$request->submission,
                'information' =>$request->information,
                'indemnity' =>$request->indemnity,
                'losses' =>$request->losses,
                'promise' =>$request->promise,
                'waiver' =>$request->waiver,
                'law' =>$request->law,
                'offer' =>$request->offer,
                'process' =>$request->process,
                'security' =>$request->security,
                'warranty' =>$request->warranty
            ]);
            $conditions = true;
        }catch (Exception $exception){
            $conditions = false;
        }
        if ($conditions == true){
            setMessage('success','Condition Save Success !');
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
        $conditions= Condition::find($id);
        $profiles = Profile::select('name','image')->get();
        return view('admin.condition.edit',compact('conditions','profiles'));
    }





    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ConditionRequest $request, $id){
        $conditions = Condition::find($id);


        $success =null;
        try {
            $conditions->update([
                'introduction' =>$request->introduction,
                'account' =>$request->account,
                'order' =>$request->order,
                'conduct' =>$request->conduct,
                'submission' =>$request->submission,
                'information' =>$request->information,
                'indemnity' =>$request->indemnity,
                'losses' =>$request->losses,
                'promise' =>$request->promise,
                'waiver' =>$request->waiver,
                'law' =>$request->law,
                'offer' =>$request->offer,
                'process' =>$request->process,
                'security' =>$request->security,
                'warranty' =>$request->warranty
            ]);
            $success = true;
        }catch (Exception $exception){
            $success = false;
        }
        if ($success == true){
            setMessage('success','Condition updated Successfully !');
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
        $conditions = Condition::find($id);
        $conditions->delete();
        setMessage('success','Condition has been Successfully Deleted !');
        return redirect()->back();
    }
}
