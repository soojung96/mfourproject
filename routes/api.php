<?php

//imported UserController.php and User.php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Models\User;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//route that allows you to create and add a user to storage
Route::post('/users/create/', [UserController::class, 'store']);

//route that allows you to update a preexisting user
Route::post('/users/update/{id}', [UserController::class, 'update']);

//route that shows all users
Route::get('/users', [UserController::class, 'index']);
