<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\PostImage;
use App\Trait\MultiImageTrait;


class PostController extends Controller
{
    //use MultiImageTrait;
    function index(){
        $posts = Post::with('category')->orderBy('id','DESC')->get() ->paginate(15);

//        foreach ($posts as $post) {
//            $category = $post->category; // Lấy thông tin của category
//            $categoryId = $category->id; // Lấy ID của category
//            // Sử dụng thông tin category và các thông tin khác của bài post
//        }


        return view('admin.post.index')->with(compact('posts'))->paginate(15);

    }

    function create(){
        $categories= Category::orderBy('id','DESC')->get();
        return view('admin.post.create')->with(compact('categories'));
    }

    function store(PostRequest $request){

        $postData=Post::createPost($request->only(['title', 'slug', 'content', 'status','user_id','categories_id']));

        $postId = $postData->id;

        if ($request->hasFile('images')) {
            $images = $request->file('images');
            foreach ($images as $image) {
                $imagePath = $image->store('post_images'); // Lưu tệp tin ảnh vào thư mục 'post_images'

                // Tạo bản ghi mới trong bảng PostImage
                $postImage = new PostImage();
                $postImage->post_id = $postId;
                $postImage->image_path = $imagePath;
                $postImage->save();
            }
        }

        return redirect()->route('admin.post.index');


    }

    function edit(){

    }

    function update(){

    }
}
