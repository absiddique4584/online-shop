<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ConditionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'introduction' =>'required',
            'account' =>'required',
            'order' =>'required',
            'conduct' =>'required',
            'submission' =>'required',
            'information' =>'required',
            'indemnity' =>'required',
            'losses' =>'required',
            'promise' =>'required',
            'waiver' =>'required',
            'law' =>'required',
            'offer' =>'required',
            'process' =>'required',
            'security' =>'required',
            'warranty' =>'required'
        ];
    }
}
