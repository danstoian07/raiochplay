<?php

namespace App\Http\Controllers\Frontend;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        return view('frontend.index');
    }

    public function produse()
    {
        $categories = Category::where('active', 1)->get();

        return view('frontend.produse', compact('categories'));
    }

    public function categoria($slug)
    {
        $category = Category::where('slug', $slug)->first();

        return view('frontend.categoria', compact('category'));
    }
}
