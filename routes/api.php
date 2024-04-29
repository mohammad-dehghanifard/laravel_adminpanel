<?php

use App\Http\Controllers\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post("/post/create",[PostController::class,"createPost"]);
Route::put("/post/update/{id}",[PostController::class,"updatePost"]);
Route::get("/post/getAll",[PostController::class,"getAllPost"]);
Route::delete("/post/delete/{id}",[PostController::class,"deletePost"]);
