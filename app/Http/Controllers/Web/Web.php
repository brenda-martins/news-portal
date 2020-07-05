<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;

class Web extends Controller
{


    public  function index()
    {
        return view("site.index", [

            "latestNews" => Post::where('spotlight', 0)
                ->orderBy('created_at', 'desc')
                ->take(6)
                ->get(),

            "highlights" => Post::where('spotlight', 1)
                ->orderBy('created_at', 'desc')
                ->take(8)
                ->get()
        ]);
    }
}
