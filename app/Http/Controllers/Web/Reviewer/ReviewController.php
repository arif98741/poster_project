<?php

namespace App\Http\Controllers\Web\Reviewer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function reivews()
    {
    	return view('reviewer.review.write_review');
    }
}
