<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//use App\Models\BlogPost;
use App\Models\Founder;
use Session;
use Image;
use Storage;

class AboutController extends Controller
{
    

    public function index()
    {
        $data =   [
            'founders' => Founder::all(),
       
        ];

        //return response()->json($data);
        return view('admin.founder.index')->with($data);
    }

    public function create()
    {
        return view('admin.founder.create');
    }

    public function store(Request $request)
    {
        $founder = new Founder;
        $founder->name = $request->name;
        $founder->designation = $request->designation;
        if ($request->hasFile('image')) {

            $founder->image = $this->uploadImage($request,$founder);
        }

        if ($founder->save()) {
            Session::flash('success', 'Founder inserted successful');
            return redirect(route('admin.founder.index'));
        }else{
            Session::flash('success', 'Founder inserted successful');
            return redirect(route('admin.founder.index'));
        }  
    }

    public function edit($id)
    {
        $data =   [
            'founder' => Founder::find($id)
       
        ];
        return view('admin.founder.edit')->with($data);
    }

  
    public function update(Request $request, $id)
    {
        $founder = Founder::find($id);
        $founder->name = $request->name;
        $founder->designation = $request->designation;
        if ($request->hasFile('image')) {

            $founder->image = $this->updateImage($request,$founder);
        }

        if ($founder->save()) {
            Session::flash('success', 'Founder updated successful');
            return redirect(route('admin.founder.index'));
        }else{
            Session::flash('success', 'Founder updated successful');
            return redirect(route('admin.founder.index'));
        }  
    }

    private function uploadImage($request,$founder)
    {
        $filenameWithExt = $request->file('image')->getClientOriginalName();
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        $extension = $request->file('image')->getClientOriginalExtension();
        $fileNameToStore = 'founder'.'_'.time().'.'.$extension;
        $path = $request->file('image')->storeAs('public/uploads/founder', $fileNameToStore);
        return str_replace("public/uploads/founder/", '', $path);
        
    }

    private function updateImage($request,$founder)
    {
        //dd($founder);
        
        if (file_exists("public/uploads/founder/".$founder->image)) {

            
            Storage::delete("public/uploads/founder/".$founder->image);
        
        }


        $filenameWithExt = $request->file('image')->getClientOriginalName();
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        $extension = $request->file('image')->getClientOriginalExtension();
        $fileNameToStore = 'founder'.'_'.time().'.'.$extension;
        $path = $request->file('image')->storeAs('public/uploads/founder', $fileNameToStore);
        return str_replace("public/uploads/founder/", '', $path);
    }

    
       public function destroy($id)
    {
           $founder = Founder::findOrfail($id);

           if ($founder->delete()) {
            # code...
            Session::flash('success', 'Deleted successfully');
            return redirect(route('admin.founder.index'));
        }else{
            Session::flash('error', ' Delete failed');
            return redirect(route('admin.founder.index'));
        }
           
    }


}
