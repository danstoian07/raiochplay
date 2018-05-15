<?php

namespace App\Http\Controllers\Backend;

use App\Analytics;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function index()
    {
        $analytics = Analytics::first();
        $view_code = $analytics->view_code;
        $client_id = $analytics->client_id;
        $active = 'home';

        return view('backend.index', compact('active', 'view_code', 'client_id'));
    }

    public function testSession()
    {
        return redirect()->route('admin.categories')->with('message', 'Categoria a fost adaugata!')->with('color', 'bg-red');
    }


}
