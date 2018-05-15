<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Picture;
use Illuminate\Http\Request;
use App\Category;
use App\Product;
use Illuminate\Support\Facades\DB;

class ProductsController extends Controller
{
    public function index()
    {
        $products = Product::where('active', 1)->get();
        $active = 'prod';

        return view('backend.products', compact('active', 'products'));
    }

    public function newProduct()
    {
        $active = 'prod';
        $categories = Category::where('active', 1)->orderBy('order')->get();
        return view('backend.add-product', compact('active', 'categories'));
    }

    public function edit($id)
    {
        $product = Product::find($id);
        $categories = Category::where('active', 1)->orderBy('order')->get();
        $active = 'prod';
        return view('backend.edit-product', compact('active', 'product', 'categories'));
    }

    public function store(ProductRequest $request)
    {
        if ($request->active == 'on') {
            $request['active'] = 1;
        }

        $product = Product::create([
            'name'         => $request->name,
            'category_id'  => $request->category_id,
            'code'         => $request->code,
            'slug'         => $request->slug,
            'description'  => $request->description,
            'materials'    => $request->materials,
            'views'        => 0,
            'active'       => $request->active
        ]);

        return redirect()->route('admin.product.edit', ['id' => $product->id])->with('message', 'Produsul a fost adaugat! Acum poti adauga imagini!')->with('color', 'bg-green');
    }

    public function saveChanges(ProductRequest $request)
    {
        $product = Product::find($request->id);

        if ($request->active == 'on') {
            $request['active'] = 1;
        }

        $product->update([
            'name'         => $request->name,
            'category_id'  => $request->category_id,
            'code'         => $request->code,
            'slug'         => $request->slug,
            'description'  => $request->description,
            'materials'    => $request->materials,
            'active'       => $request->active
        ]);

        return redirect()->route('admin.product.edit', ['id' => $product->id])->with('message', 'Produsul a fost modificat!')->with('color', 'bg-green');
    }


    public function upload(Request $request)
    {
        $picture   = $request->file('file');

        if($picture) {
            $picture_name = $picture->getClientOriginalName();
            if (file_exists('products/images/' . $picture_name)) {
                $picture_name = rand(0, 999999) . '-t-' . $picture_name;
            }
            move_uploaded_file($picture, "products/images/" . $picture_name);

            $order = 99;
            if(! getFirstPicture($request->id)) {
                $order = 1;
                $product = Product::find($request->id);
                $product->update(['thumb' => $picture_name]);
            }

            $picture = Picture::create([
                'product_id' => $request->id,
                'url'        => $picture_name,
                'order'      => $order
            ]);

            return response()->json([
                'image' => $picture->url
            ], 200);
        }

        return response()->json([
            'error' => 'Ceva probleme...'
        ], 500);

    }

    public function gallery($id)
    {
        $pictures = Picture::where('product_id', $id)->orderBy('order')->get();
        $active = 'prod';
        return view('backend.gallery', compact('active', 'pictures', 'id'));
    }

    public function sortPics(Request $request)
    {
        //RESET all values
        DB::table('pictures')->where('product_id', $request->id)->update(['order' => NULL]);
        $ordine = str_replace("sort=","",$request->ordine);
        $array = explode("&", $ordine);

        $order = 1;
        foreach ($array as $item) {
            $picture = Picture::find($item);
            $picture->update(['order' => $order]);
            if($order == 1) {
                $picture->product->update(['thumb' => $picture->url]);
            }
            $order++;
        }

        return redirect()->route('admin.product.gallery', ['id' => $request->id])->with('message', 'Ordinea pozelor a fost salvata!')->with('color', 'bg-green');
    }

}
