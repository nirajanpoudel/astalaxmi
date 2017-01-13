<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class BillRequest extends Request
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
            'date'=>'required',
            'client_id'=>'required',
            'paid'=>'required',
        ];
    }

    public function messages(){
        return [
        'client_id.required'=>'To whom you are going to build bill',
        'paid.required'=>'Inform a payment status'
        ];
    }
}
