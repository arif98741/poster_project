<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Package;
use Session;


class PackageController extends Controller
{
    public function index()
    {
           $data =   [
             'packages' => Package::all(),
         ];

        //return response()->json($data);

        return view('admin.package.index')->with($data);
    
    }

   
    public function create()
    {
          $data =   [
             'packages' => Package::all(),
           ];
          return view('admin.package.create')->with($data);
    }

   
    public function store(Request $request)
    {
           $package = new Package;
           $package->type = $request->type;
           $package->duration = $request->duration;
           $package->description = $request->description;
           $package->price = $request->price;
           $package->duration_unit = $request->duration_unit;
           $package->save();

        // Package::create( 
        //     ['type' => $request->type],
        //     ['duration' => $request->duration],
        //     ['description' => $request->description],
        //     ['price' => $request->price],
        //     ['duration_unit' => $request->duration_unit]
        // );
        Session::flash('success', 'Pricing Plan inserted successful');
        return redirect(route('admin.package.index'));

    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {   
          $data =   [
             'packages_all' => Package::all(),
             'package' =>Package::findOrfail($id)
         ];

        //echo $data['package']->description; exit;

        return view('admin.package.edit')->with($data);
    }

   
    public function update(Request $request, $id)
    {
        $package = Package::find($id);
        $package->type = $request->type;
       $package->duration = $request->duration;
       $package->description = $request->description;
       $package->price = $request->price;
       $package->duration_unit = $request->duration_unit;
        
        if ($package->save()) {
            # code...
            Session::flash('success', 'Pricing plan updated successfully');
            return redirect(route('admin.package.index'));
        }else{
            Session::flash('error', 'Pricing plan  update failed');
            return redirect(route('admin.package.index'));
        }
    }

    
    public function destroy($id)
    {
           $package = Package::findOrfail($id);

           if ($package->delete()) {
            # code...
            Session::flash('success', 'Deleted successfully');
            return redirect(route('admin.package.index'));
        }else{
            Session::flash('error', ' Delete failed');
            return redirect(route('admin.package.index'));
        }
           
    }
}
