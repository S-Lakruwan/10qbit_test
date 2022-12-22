<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreImagesRequest extends FormRequest
{

    public function rules()
    {
        return [
            'image' => 'required|image|mimes:png,jpg,jpeg|max:2048',
            'imagable_type' => 'required',
            'imagable_id' => 'required',

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
            'image.required' => 'Image is required',
            'imagable_type.required' => 'Imagable Type is required',
            'imagable_id.required' => 'Imagable Id is required',
        ];
    }
}
