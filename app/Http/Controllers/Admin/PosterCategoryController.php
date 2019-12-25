<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PosterCategory;


class PosterCategoryController extends Controller
{
    public function index()
    {
        $data =   [
            'blog_categories' => PosterCategory::all(),
        ];

        return view('admin.poster_category.index')->with($data);
    }


    public function create()
    {
        $data = [
            'blog_categories' => PosterCategory::all()
        ];
        return view('admin.poster_category.create')->with($data);
    }

    public function store(Request $request)
    {
        PosterCategory::create(['name' => $request->name]);
        Session::flash('success', 'Category inserted successful');
        return redirect(route('admin.poster_category.index'));
    }




    public function edit($id)
    {
        $category = PosterCategory::find($id);
        return view('admin.poster_category.edit')->with(compact('category'));
    }


    public function update(Request $request, $id)
    {
        $category = PosterCategory::find($id);
        $category->name = $request->name;

        if ($category->save()) {
            # code...
            Session::flash('success', 'Category updated successfully');
            return redirect(route('admin.poster_category.index'));
        } else {
            Session::flash('error', 'Category update failed');
            return redirect(route('admin.poster_category.index'));
        }
    }


    public function delete($id)
    {
        $category = PosterCategory::find($id);
        if ($category->delete()) {
            # code...
            Session::flash('success', 'Blog Category deleted successfully');
            return redirect(route('admin.poster_category.index'));
        } else {
            Session::flash('error', 'Blog Category deleted failed');
            return redirect(route('admin.poster_category.index'));
        }
    }
}