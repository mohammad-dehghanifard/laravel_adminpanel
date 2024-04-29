<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PostController extends Controller
{
    public function createPost(Request $request): JsonResponse
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

    public function updatePost(Request $request,$id): JsonResponse
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
            $post = Post::find($id);
            $post-> update($inputs);
            return Response() -> json(
                [
                    "success" => true,
                    "post" => $post,
                    "message" => "پست  با موفقیت ویرایش شد"
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

    public function getAllPost(): JsonResponse
    {
        $posts = Post::all();
        return Response()->json(
            [
                "success" => true,
                "posts" => $posts,
                "message" => "لیست پست ها با موفیت دریافت شد"
            ]
        );
    }

    public function deletePost($id): JsonResponse
    {
        try {
            $post = Post::find($id);
            $post->delete();
            return Response() -> json(
                [
                    "success" => true,
                    "message" => "پست مورد نظر با موفقیت حذف شد!"
                ]
            );
        } catch (Exception $exception) {
            return Response() -> json(
                [
                    "success" => false,
                    "message" => "پست مورد پیدا نشد!"
                ]
            );
        }
    }
}
