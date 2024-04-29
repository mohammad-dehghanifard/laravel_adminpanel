<?php

use App\Http\Controllers\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post("/post/create",[PostController::class,"createPost"]);
Route::put("/post/update/{id}",[PostController::class,"updatePost"]);
