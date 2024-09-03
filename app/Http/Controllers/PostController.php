<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        return view('posts.index');
    }

    public function show(Post $post){
        $ultimas=Post::latest('id')->take(5)->get();
        return view('posts.show',compact('post','ultimas'));
    }

    public function search(Category $category){
        $posts=Post::where('category_id',$category->id)->get();
        $categories=Category::all();
        return view('posts.search',compact('posts','categories'));
    }
}
