<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreIssueSubCategoriesRequest;
use App\Models\IssueSubcategory;
use Illuminate\Http\Request;

class IssueSubCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(['data' => IssueSubcategory::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return abort('404');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreIssueSubCategoriesRequest $request)
    {
        $issueSubCategories = IssueSubCategory::create($request->all());
        return response()->json(['data' => $issueSubCategories]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return abort('404');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return abort('404');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, StoreIssueSubCategoriesRequest $request)
    {
        $issueSubCategories = IssueSubcategory::findOrFail($id);
        $issueSubCategories->update($request->all());
        return response()->json(['data' => "success fully edited"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $issueSubCategories = IssueSubCategory::findOrFail($id);
        $issueSubCategories->delete();
        return response()->json(['data' =>"success fully deleted"]);
    }
}
