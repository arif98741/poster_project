<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Category;
use App\Models\Company;
use App\Models\Reviewer;
use App\Models\Review;
use App\Models\Package;
use Session;
use Auth;



class HomeController extends Controller
{
    public function index()
    {
        $data =   [
            'top_categories' => Category::with('companies.reviews')->limit(6)->get(),
            'categories' => Category::all(),
            'reviews_data' => Review::with(['company', 'reviewer'])->where(['status' => 1])->orderBy('created_at', 'desc')->limit(12)->get()
        ];

        return view('web.home')->with($data);
    }


    public function company_landing()
    {
        $data =   [
            'companies' => Company::inRandomOrder()->get()
        ];
        return view('company.companies.companies_landing')->with($data);
    }


    public function pricing()
    {

        $data =   [
            'standards' => Package::where(['type' => 'standard'])->limit(3)->get(),
            'extendeds' => Package::where(['type' => 'extended'])->limit(3)->get(),
            'premiums' => Package::where(['type' => 'premium'])->limit(3)->get()
        ];

        return view('company.companies.pricing')->with($data);
    }



    public function row_listings()
    {
        $data =   [
            'company_rating' => Review::with(['company'])->where(['status' => 1])->sum('rating'),
            'reviews_data' => Review::with(['company', 'review_image', 'reviewer', 'reply'])->where(['status' => 1])->orderBy('created_at', 'desc')->get(),
            'company'     => Company::with(['category'])->firstOrFail(),
            'categories'   => Category::all()
        ];

        return view('reviewer.row_listing.row_list')->with($data);
    }


    public function category_listing($orderby = 'company-name')
    {
        $data  = [];
        if ($orderby == 'company-name') {
            $data = array(
                'companies' => DB::table('companies')
                    ->leftjoin('reviews', 'reviews.company_id', '=', 'companies.id')
                    ->leftjoin('companies_rating', 'companies_rating.company_id', '=', 'companies.id')
                    ->select("companies.*", DB::raw("sum(reviews.rating) as company_rating"), DB::raw("count(reviews.id) as total_rating"))
                    ->orderBy('companies.company_name', 'asc')
                    ->groupBy('reviews.company_id')
                    ->get()
            );
        } else if ($orderby == 'highest') {
            $data = array(
                'companies' => DB::table('companies')
                    ->join('reviews', 'reviews.company_id', '=', 'companies.id')
                    ->leftjoin('companies_rating', 'companies_rating.company_id', '=', 'companies.id')
                    ->select("companies.*", DB::raw("sum(reviews.rating) as company_rating"), DB::raw("count(reviews.id) as total_rating"))
                    ->orderBy('companies_rating.total_rating', 'desc')
                    ->groupBy('reviews.company_id')
                    ->get()
            );
        } elseif ($orderby == 'lowest') {
            $data = array(
                'companies' => DB::table('companies')
                    ->join('reviews', 'reviews.company_id', '=', 'companies.id')
                    ->leftjoin('companies_rating', 'companies_rating.company_id', '=', 'companies.id')
                    ->select("companies.*", DB::raw("sum(reviews.rating) as company_rating"), DB::raw("count(reviews.id) as total_rating"))
                    ->orderBy('companies_rating.total_rating', 'asc')
                    ->groupBy('reviews.company_id')
                    ->get()
            );
        }

       // return $data['companies']; exit;


        return view('company.category_listing.top_company')->with($data);
    }


    public function profile(Request $request, $id)
    {
        $data = [
            'profile' => Reviewer::with(['review', 'country'])->findorFail($id),
            'reviews_data' => Review::with(['company', 'review_image'])->where('reviewer_id', $id)->get()
        ];
        //return $data['profile'];
        // exit;

        return view('web.profile.reviewer_profile')->with($data);
    }

    public function review()
    {
        return view('reviewer.review.reviews');
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