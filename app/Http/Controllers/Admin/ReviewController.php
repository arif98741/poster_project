<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Review;
use Session;



class ReviewController extends Controller
{

    public function index()
    {
        $data =  [
            'reviews_data' => Review::with(['company', 'reviewer'])->orderBy('created_at', 'desc')->get()
        ];

        return view('admin.review.index')->with($data);
    }


    public function approve($id)
    {
        $review  = Review::find($id);
        $review->status = 0;
        $review->save();
        Session::flash('success', 'Review updated successful');
        return redirect(url('admin/review'));
    }

    public function deny($id)
    {

        $review  = Review::find($id);
        $review->status = 1;
        $review->save();

        Session::flash('success', 'Review updated successful');
        return redirect(url('admin/review'));
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }
}