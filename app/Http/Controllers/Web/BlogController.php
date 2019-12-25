<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BlogPost as Post;
use App\Models\BlogCategory as Category;

class BlogController extends Controller
{

    public function index()
    {
        $data =   [
            'blogs' => Post::with (['blog_category'])->orderBy('id','desc')->paginate(6),
            'latest_blogs' => Post::inRandomOrder()->with(['blog_category'])->limit(3)->get(),
            'blog_categories' => Category::with (['posts'])->orderBy('name','desc')->get()
        ];

        return view('web.blog.index')->with($data);
    }


    public function show_by_slug($slug)
    {
        $data = array(
            'blog' => Post::with(['blog_category', 'admin', 'comment'])->where('slug', $slug)->firstOrfail(),
            'recent_posts' => Post::with(['blog_category', 'admin'])->orderBy('id', 'desc')->limit(3)->get(),
            'blog_categories' => Category::with (['posts'])->orderBy('name','desc')->get(),
            'postComment' => Post::with(['comment'])->where('slug', $slug)->get()
        );
       // return $data['blog_categories'];
        return view('web.blog.single', $data);
    }
}
