<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreImagesRequest;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ImagesController extends Controller
{

    /**
     * create
     *
     * @return json
     */
    public function create(StoreImagesRequest $request)
    {
        $rules = [];
        if ($request->imagable_type == 'issue') {
            $rules =  [
                'imagable_id' => 'exists:issues,id',
            ];
            $request->imagable_type = 'App\Models\Issue';
        } else if ($request->imagable_type == 'comment') {
            $rules =  [
                'imagable_id' => 'exists:comments,id',
            ];
            $request->imagable_type = 'App\Models\Comment';
        } else {
            return response()->json(['data' => 'Not fount that type.']);
        }

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json(['data' => $validator->messages()]);
        }

        $file = $request->file('image');
        $request->size = $file->getSize();

        $filename = time() . '-' . $file->getClientOriginalName();
        $file->storeAs('public/', $filename);
        $image = Image::create([
            'imagable_type' => $request->imagable_type,
            'imagable_id' => $request->imagable_id,
            'size' => $file->getSize(),
            'path' => asset('storage') . '/' . $filename,
            'name' => $filename,
            'extension' => $file->getSize(),
        ]);


        return response()->json(['data' => $image]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $image = Image::findOrFail($id);
        $image->delete();
        return response()->json(['data' => "success fully deleted"]);
    }
}
