<?php

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\ImagesController;
use App\Http\Controllers\IssueCategoriesController;
use App\Http\Controllers\IssuesController;
use App\Http\Controllers\IssueSubCategoriesController;
use App\Http\Controllers\SubCategoriesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//issues
Route::resource('issues', IssuesController::class);

//categories
Route::resource('categories', CategoriesController::class);

//sub_categories
Route::resource('sub_categories', SubCategoriesController::class);

//comments
Route::resource('comments', CommentsController::class);

//issue_categories
Route::resource('issue_categories', IssueCategoriesController::class);

//issue_subcategories
Route::resource('issue_subcategories', IssueSubcategoriesController::class);

//images
Route::post('/images', [ImagesController::class, "create"])->name('image.create');
Route::delete('/images/{id}', [ImagesController::class, "delete"])->name('image.delete');
