<?php

namespace App\Http\Controllers\Frontend;

use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\ContactFormRequest;
use App\Http\Requests\NewsletterFormRequest;
use App\Mail\NewContact;
use App\Newsletter;
use App\Product;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $banner = 'Jump.jpg';
        $slogan = 'Jocul este pe primul loc';
        $sub_slogan = 'Distractia este garantata cand siguranta este adecvata. Amenajarea unui loc de joaca trebuie tratata cu seriozitate.';

        return view('frontend.index', compact('banner', 'slogan', 'sub_slogan'));
    }

    public function produse()
    {
        $categories = Category::where('active', 1)->get();
        $products = Product::where('active', 1)->take(9)->get();

        $banner = 'Jump.jpg';
        $slogan = 'Jocul este pe primul loc';
        $sub_slogan = 'Distractia este garantata cand siguranta este adecvata. Amenajarea unui loc de joaca trebuie tratata cu seriozitate.';

        return view('frontend.produse', compact('categories', 'products', 'banner', 'slogan', 'sub_slogan'));
    }

    public function categoria($slug)
    {
        $category = Category::where('slug', $slug)->first();
        $categories = Category::where('active', 1)->get();
        $products = Product::where('category_id', $category->id)->where('active', 1)->get();

        $banner = $category->picture;
        if(! $banner) {
            $banner = 'Jump.jpg';
        }
        $slogan = $category->name;
        $sub_slogan = $category->description;

        return view('frontend.produse', compact('category', 'products', 'categories', 'banner', 'slogan', 'sub_slogan'));
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
