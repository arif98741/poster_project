<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//use App\Models\BlogPost;
use App\Models\Company;
use Session;
use Image;
use Storage;

class CompanyController extends Controller
{
    
     public function index()
    {
        $data =   [
            'companies' => Company::all(),
        ];

        //return response()->json($data);
        return view('admin.company.index')->with($data);
    }


    public function create()
    {
        return view('admin.company.create');
    }


    public function store(Request $request)
    {
        $company               = new Company;
        $company->company_name = $request->company_name;
         $company->description = $request->description;
        $company->website      = $request->website;
        $company->phone        = $request->phone;
        $company->address      = $request->address;
        if ($request->hasFile('image')) {

            $company->image = $this->uploadImage($request,$company);
        }

        if ($company->save()) {
            Session::flash('success', 'Company inserted successful');
            return redirect(route('admin.company.index'));
        }else{
            Session::flash('success', 'Company inserted successful');
            return redirect(route('admin.company.index'));
        }  
    }

    public function edit($id)
    {
        $data =   [
            'company' => Company::find($id)
       
        ];
        return view('admin.company.edit')->with($data);
    }

  
    public function update(Request $request, $id)
    {
        $company               = Company::find($id);
        $company->company_name = $request->company_name;
        $company->description  = $request->description;
        $company->website      = $request->website;
        $company->phone        = $request->phone;
        $company->address      = $request->address;
        if ($request->hasFile('image')) {

            $company->image   = $this->updateImage($request,$company);
        }

        if ($company->save()) {
            Session::flash('success', 'Company updated successful');
            return redirect(route('admin.company.index'));
        }else{
            Session::flash('success', 'Company updated successful');
            return redirect(route('admin.company.index'));
        }  
    }

    private function uploadImage($request,$company)
    {
        $filenameWithExt = $request->file('image')->getClientOriginalName();
        $filename        = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        $extension       = $request->file('image')->getClientOriginalExtension();
        $fileNameToStore = 'company'.'_'.time().'.'.$extension;
        $path            = $request->file('image')->storeAs('public/uploads/company', $fileNameToStore);
        return str_replace("public/uploads/company/", '', $path);
        
    }

    private function updateImage($request,$company)
    {
        //dd($company);
        
        if (file_exists("public/uploads/company/".$company->image)) {

            
            Storage::delete("public/uploads/company/".$company->image);
        
        }


        $filenameWithExt = $request->file('image')->getClientOriginalName();
        $filename        = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        $extension       = $request->file('image')->getClientOriginalExtension();
        $fileNameToStore = 'company'.'_'.time().'.'.$extension;
        $path            = $request->file('image')->storeAs('public/uploads/company', $fileNameToStore);
        return str_replace("public/uploads/company/", '', $path);
    }

    
    public function update_status ($status, $id)
    {
           $company = Company::find($id);
           $company->status = $status;
           if ($company->update()) {
            Session::flash('success', 'Updated successfully');
            return redirect(route('admin.company.index'));
        }else{
            Session::flash('error', ' Updated failed');
            return redirect(route('admin.company.index'));
        }
           
    }

    public function destroy($id)
    {
           $company = Company::findOrfail($id);

           if ($company->delete()) {
            # code...
            Session::flash('success', 'Deleted successfully');
            return redirect(route('admin.company.index'));
        }else{
            Session::flash('error', ' Delete failed');
            return redirect(route('admin.company.index'));
        }
           
    }

    
}
