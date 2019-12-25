<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;
use Auth;



class HomeController extends Controller
{
    public function index()
    {
        $data =   [];

        return view('web.home')->with($data);
    }


    public function contact()
    {
        $data =   [];

        return view('web.contact')->with($data);
    }



    public function search(Request $request)
    {
        $data['keyword'] = $request->keyword;


        if (isset($request->category_id)) {

            $data = array(
                'companies' => DB::table('companies')
                    ->join('categories', 'categories.id', '=', 'companies.category_id')
                    ->join('reviews', 'reviews.company_id', '=', 'companies.id')
                    ->join('companies_rating', 'companies_rating.company_id', '=', 'companies.id')
                    ->select("companies.*", DB::raw("sum(reviews.rating) as company_rating"), DB::raw("count(reviews.id) as total_rating"))
                    ->where('categories.id', $request->category_id)
                    ->orWhere('companies.company_name', 'like', '%' . $request->keyword . '%')
                    ->orderBy('companies_rating.total_rating', 'asc')
                    ->groupBy('reviews.company_id')
                    ->get()
            );

            $data['categories'] = Category::orderBy("category_name")->get();
            return view('web.search')->with($data);
        } elseif (isset($request->keyword)) {
            $data = array(
                'companies' => DB::table('companies')
                    ->join('categories', 'categories.id', '=', 'companies.category_id')
                    ->join('reviews', 'reviews.company_id', '=', 'companies.id')
                    ->join('companies_rating', 'companies_rating.company_id', '=', 'companies.id')
                    ->select("companies.*", DB::raw("sum(reviews.rating) as company_rating"), DB::raw("count(reviews.id) as total_rating"))
                    ->where('companies.company_name', 'like', '%' . $request->keyword . '%')
                    ->orderBy('companies_rating.total_rating', 'asc')
                    ->groupBy('reviews.company_id')
                    ->get()
            );

            $data['categories'] = Category::orderBy("category_name")->get();
            return view('web.search')->with($data);
        } else if (isset($request->category_id)) {

            $data = array(
                'companies' => DB::table('companies')
                    ->join('categories', 'categories.id', '=', 'companies.category_id')
                    ->join('reviews', 'reviews.company_id', '=', 'companies.id')
                    ->join('companies_rating', 'companies_rating.company_id', '=', 'companies.id')
                    ->select("companies.*", DB::raw("sum(reviews.rating) as company_rating"), DB::raw("count(reviews.id) as total_rating"))
                    ->where('companies.company_name', 'like', '%' . $request->keyword . '%')
                    ->orderBy('companies_rating.total_rating', 'asc')
                    ->groupBy('reviews.company_id')
                    ->get()
            );
            $data['categories'] = Category::orderBy("category_name")->get();
            return view('web.search')->with($data);
        }
    }
}