<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class JournalRequest extends Request
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
            'description'=>'required'
            // // 't.*.debit' => 'required',
            // 't_0_account_id'=>'required',
            // 't_1_account_id'=>'required',
            // // 't.*.debit' => 'required_without_all:t.*.credit',
            // 't_0_credit_amount' => 'required_without_all:t_0_debit_amount',
            // 't_1_credit_amount' => 'required_without_all:t_1_debit_amount',
            // 't_1_debit_amount' => 'required_without_all:t_1_credit_amount',
            // 't_0_debit_amount'=>'same:t_1_credit_amount',
            // 't_1_debit_amount'=>'same:t_0_credit_amount'
        ];
    }
}
