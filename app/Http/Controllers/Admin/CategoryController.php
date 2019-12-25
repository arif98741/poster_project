<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Session;

class CategoryController extends Controller
{

    public function index()
    {

        $data =   [
            'categories' => Category::all(),
        ];

        return view('admin.category.index')->with($data);
    }


    public function create()
    {
        return view('admin.category.create');
    }


    public function store(Request $request)
    {
        if ($request->hasFile('image')) {

            Category::create([
                'category_name' => $request->category_name,
                'image' => $this->uploadImage($request)
            ]);
        } else {
            Category::create([
                'category_name' => $request->category_name
            ]);
        }

        Session::flash('success', 'Category inserted successful');
        return redirect(route('admin.category.index'));
    }


    public function edit($id)
    {
        $category = Category::find($id);

        return view('admin.category.edit')->with(compact('category'));
    }


    public function update(Request $request, $id)
    {
        $category = Category::find($id);
        $category->category_name = $request->category_name;
        if ($request->hasFile('image')) {


            $category->image = $this->updateImage($request, $category);
        }


        if ($category->save()) {
            # code...
            Session::flash('success', 'Category updated successfully');
            return redirect(route('admin.category.index'));
        } else {
            Session::flash('error', 'Category update failed');
            return redirect(route('admin.category.index'));
        }
    }

    public function show()
    {
        Session::flash('success', 'Category deleted successfully');
        return redirect(route('admin.category.index'));
    }


    private function uploadImage($request)
    {
        $filenameWithExt = $request->file('image')->getClientOriginalName();
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        $extension = $request->file('image')->getClientOriginalExtension();
        $fileNameToStore = 'category' . '_' . time() . '.' . $extension;
        $path = $request->file('image')->storeAs('public/uploads/category', $fileNameToStore);
        return str_replace("public/uploads/category/", '', $path);
    }


    private function updateImage($request, $category)
    {

        if (file_exists("public/uploads/category/" . $category->image)) {

            Storage::delete("public/uploads/category/" . $category->image);
        }

        $filenameWithExt = $request->file('image')->getClientOriginalName();
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        $extension = $request->file('image')->getClientOriginalExtension();
        $fileNameToStore = 'category' . '_' . time() . '.' . $extension;
        $path = $request->file('image')->storeAs('public/uploads/category', $fileNameToStore);
        return str_replace("public/uploads/category/", '', $path);
    }


    public function delete($id)
    {
        $category = Category::find($id);
        if ($category->delete()) {
            # code...
            Session::flash('success', 'Category deleted successfully');
            return redirect(route('admin.category.index'));
        } else {
            Session::flash('error', 'Category deleted failed');
            return redirect(route('admin.category.index'));
        }
    }
}