<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class StoreIssuesRequest extends FormRequest
{

    public function rules()
    {
        return [
            'title' => 'required|max:255',
            'body' => 'required',
            'uuid' => 'required',
            'slug' => 'required'
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
            'title.required' => 'Title is required',
            'body.required' => 'Body is required',
            'uuid.required' => 'Uuid is required',
            'slug.required' => 'Slug is required'
        ];
    }
}
