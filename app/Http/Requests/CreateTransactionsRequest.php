<?php

namespace App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Http\FormRequest;


class CreateTransactionsRequest extends FormRequest
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
           
            'account_id' => 'required',
            'transaction_title' => 'required',
            'transaction_amt' => 'required',
            'transaction_type' => 'required'
        ];
    }
}
