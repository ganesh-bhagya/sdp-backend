<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ComplaintsController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get("get-users-list",[UsersController::class,'getUsersList']);
Route::get("create-user",[UsersController::class,'createUser']);
Route::get("login-user",[UsersController::class,'loginUser']);

Route::get("add-complaint",[ComplaintsController::class,'addComplaint']);
Route::get("get-complaints",[ComplaintsController::class,'getComplaints']);
Route::get("select-complaint/{id}",[ComplaintsController::class,'selectComplaint']);
Route::get("update-complaint",[ComplaintsController::class,'updateComplaint']);
Route::get("delete-complaint/{id}",[ComplaintsController::class,'deleteComplaint']);
Route::get("select-complaint-by-user/{id}",[ComplaintsController::class,'selectComplaintByUser']);