<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreSubCategoriesRequest extends FormRequest
{

    public function rules()
    {
        return [
            'name' => 'required|max:255',
            'description' => 'required',
            'category_id' => 'required|exists:categories,id'
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
            'name.required' => 'Name is required',
            'description.required' => 'Description is required'
        ];
    }
}
