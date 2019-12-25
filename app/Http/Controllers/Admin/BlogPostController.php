<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\BlogCategory;
use App\Models\BlogPost;
use Session;
use Image;
use Storage;

class BlogPostController extends Controller
{

    public function index()
    {
        $data =   [
            'blogs' => BlogPost::with(['blog_category'])->get(),

        ];
        return view('admin.blog.index')->with($data);
    }


    public function create()
    {
        $data =   [
            'blog_categories' => BlogCategory::orderBy('name', 'asc')->get(),

        ];
        return view('admin.blog.create')->with($data);
    }

    public function store(Request $request)
    {
        $blog = new BlogPost;
        $blog->title = $request->title;
        $blog->blog_category_id = $request->blog_category_id;
        $blog->slug = Str::slug($request->title, '-');
        $blog->description = $request->description;
        if ($request->hasFile('image')) {

            $blog->image = $this->uploadImage($request, $blog);
        }


        if ($blog->save()) {
            Session::flash('success', 'Category inserted successful');
            return redirect(route('admin.blog.index'));
        } else {
            Session::flash('success', 'Category inserted successful');
            return redirect(route('admin.blog.index'));
        }
    }


    public function edit($id)
    {
        $data =   [
            'blog_categories' => BlogCategory::orderBy('name', 'asc')->get(),
            'blog' => BlogPost::find($id)

        ];
        return view('admin.blog.edit')->with($data);
    }


    public function update(Request $request, $id)
    {
        $blog = BlogPost::find($id);
        $blog->title = $request->title;
        $blog->blog_category_id = $request->blog_category_id;
        $blog->slug = Str::slug($request->title, '-');
        $blog->description = $request->description;

        if ($request->hasFile('image')) {

            $blog->image = $this->updateImage($request, $blog);
        }

        if ($blog->save()) {
            Session::flash('success', 'Founder updated successful');
            return redirect(route('admin.blog.index'));
        } else {
            Session::flash('success', 'Founder updated successful');
            return redirect(route('admin.blog.index'));
        }
    }


    public function destroy($id)
    {

        $blog = BlogPost::find($id);

        if ($blog->delete()) {
            # code...
            Session::flash('success', 'Blog deleted successfully');
            return redirect(route('admin.blog.index'));
        } else {
            Session::flash('error', 'Blog deleted failed');
            return redirect(route('admin.blog.index'));
        }
    }

    private function uploadImage($request, $blog)
    {
        $filenameWithExt = $request->file('image')->getClientOriginalName();
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        $extension = $request->file('image')->getClientOriginalExtension();
        $fileNameToStore = 'blog' . '_' . time() . '.' . $extension;
        $path = $request->file('image')->storeAs('public/uploads/blog', $fileNameToStore);
        return str_replace("public/uploads/blog/", '', $path);
    }

    private function updateImage($request, $blog)
    {

        if (file_exists("public/uploads/blog/" . $blog->image)) {


            Storage::delete("public/uploads/blog/" . $blog->image);
        }


        $filenameWithExt = $request->file('image')->getClientOriginalName();
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        $extension = $request->file('image')->getClientOriginalExtension();
        $fileNameToStore = 'blog' . '_' . time() . '.' . $extension;
        $path = $request->file('image')->storeAs('public/uploads/blog', $fileNameToStore);
        return str_replace("public/uploads/blog/", '', $path);
    }
}