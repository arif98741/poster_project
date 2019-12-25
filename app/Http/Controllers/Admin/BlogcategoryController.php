<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BlogCategory;
use Session;

class BlogcategoryController extends Controller
{

    public function index()
    {
        $data =   [
            'blog_categories' => BlogCategory::all(),
        ];

        return view('admin.blog_category.index')->with($data);
    }


    public function create()
    {
        $data = [
            'blog_categories' => BlogCategory::all()
        ];
        return view('admin.blog_category.create')->with($data);
    }

    public function store(Request $request)
    {
        BlogCategory::create(['name' => $request->name]);
        Session::flash('success', 'Category inserted successful');
        return redirect(route('admin.blog_category.index'));
    }




    public function edit($id)
    {
        $category = BlogCategory::find($id);
        return view('admin.blog_category.edit')->with(compact('category'));
    }


    public function update(Request $request, $id)
    {
        $category = BlogCategory::find($id);
        $category->name = $request->name;

        if ($category->save()) {
            # code...
            Session::flash('success', 'Category updated successfully');
            return redirect(route('admin.blog_category.index'));
        } else {
            Session::flash('error', 'Category update failed');
            return redirect(route('admin.blog_category.index'));
        }
    }


    public function delete($id)
    {
        $category = BlogCategory::find($id);
        if ($category->delete()) {
            # code...
            Session::flash('success', 'Blog Category deleted successfully');
            return redirect(route('admin.blog_category.index'));
        } else {
            Session::flash('error', 'Blog Category deleted failed');
            return redirect(route('admin.blog_category.index'));
        }
    }
}