<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function index()
    {
        $active = 'home';
        return view('backend.index', compact('active'));
    }

    public function testSession()
    {
        return redirect()->route('admin.categories')->with('message', 'Categoria a fost adaugata!')->with('color', 'bg-red');
    }


}
