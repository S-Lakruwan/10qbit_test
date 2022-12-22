<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreIssueCategoriesRequest;
use App\Models\IssueCategory;
use Illuminate\Http\Request;

class IssueCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(['data' => IssueCategory::all()]);
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
    public function store(StoreIssueCategoriesRequest $request)
    {
        $issueCategories = IssueCategory::create($request->all());
        return response()->json(['data' => $issueCategories]);
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
    public function update($id, StoreIssueCategoriesRequest $request)
    {
        $issueCategories = IssueCategory::findOrFail($id);
        $issueCategories->update($request->all());
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
        $issueCategories = IssueCategory::findOrFail($id);
        $issueCategories->delete();
        return response()->json(['data' =>"success fully deleted"]);
    }
}
