<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreIssueSubCategoriesRequest extends FormRequest
{

    public function rules()
    {
        return [
            'issue_id' => 'required|exists:issues,id',
            'sub_category_id' => 'required|exists:sub_categories,id'
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'success'   => false,
            'message'   => 'Validation errors',
            'data'      => $validator->errors()

        ]));
    }



    public function messages()
    {
        return [
        ];
    }
}
