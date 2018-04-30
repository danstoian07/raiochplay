<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Newsletter;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{
    public function index()
    {
        $abonati = Newsletter::where('subscribed', 1)->get();
        $dezabonati = Newsletter::where('subscribed', '!=', 1)->get();
        $active = 'newsletter';

        return view('backend.newsletter', compact('active', 'abonati', 'dezabonati'));
    }
}
