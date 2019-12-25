<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Founder;

class PageController extends Controller
{
    public function about()
    {
        $data =   [
            'founders'   => Founder::all(),
            //'categories' => Category::all()
        ];

        return view('web.page.about')->with($data);
    }

    public function help()
    {

        return view('web.page.help');
    }

    public function contact()
    {

        return view('web.page.contact');
    }
}