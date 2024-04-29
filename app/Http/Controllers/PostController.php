<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Exception;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function createPost(Request $request)
    {
       $inputs = $request->only([
            "title",
            "cover",
            "category",
            "content",
            "caption",
            "author",
            "keywords",
            "isCommentOn"
        ]);

       try {
           $post = Post::create($inputs);
           return Response() -> json(
               [
                   "success" => true,
                   "post" => $post,
                   "message" => "پست جدید با موفقیت ایجاد شد"
               ]
           );
       } catch (Exception $error){
           return Response() -> json(
               [
                   "success" => false,
                   "message" => "لفطا تمام اطلاعات درخواست شده را وارد کنید"
               ]
           );
       }
    }
}
