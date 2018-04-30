<?php

namespace App\Http\Controllers\Frontend;

use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\ContactFormRequest;
use App\Http\Requests\NewsletterFormRequest;
use App\Mail\NewContact;
use App\Newsletter;
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

    public function despreNoi()
    {
        return view('frontend.despre-noi');
    }

    public function newsletter()
    {
        $cod_antispam = rand(1000, 9999);
        return view('frontend.newsletter', compact('cod_antispam'));
    }

    public function submitNewsletter(NewsletterFormRequest $request)
    {
        $newsletter_exists = Newsletter::where('email', $request->email)->where('subscribed', 1)->first();
        if($newsletter_exists) {
            return back()->withErrors(['Sunteti deja abonat!']);
        }

        $newsletter_unsubscribed = Newsletter::where('email', $request->email)->where('subscribed', '!=', 1)->first();
        if($newsletter_unsubscribed) {
            $newsletter_unsubscribed->update(['subscribed' => 1]);
            return redirect()->route('frontend.newsletter')->with('message', 'Felicitari! Sunteti abonat din nou la newsletter!');
        }

        Newsletter::create([
            'email' => $request->email,
            'subscribed' => 1
        ]);

        return redirect()->route('frontend.newsletter')->with('message', 'Felicitari! Sunteti abonat la newsletter!');
    }

    public function contact()
    {
        $cod_antispam = rand(1000, 9999);
        return view('frontend.contact', compact('cod_antispam'));
    }

    public function submitContact(ContactFormRequest $request)
    {

        \Mail::to('fylipdan@gmail.com')->send(new NewContact($request));

        return redirect()->route('frontend.contact')->with('message', 'Mesajul a fost transmis cu succes!');
    }

    public function pageNotFound()
    {
        return view('frontend.index.404');
    }
}
