<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Picture;
use Illuminate\Http\Request;
use App\Category;
use App\Product;

class ProductsController extends Controller
{
    public function index()
    {
        $active = 'prod';
        return view('backend.products', compact('active'));
    }

    public function newProduct()
    {
        $active = 'prod';
        return view('backend.add-product', compact('active'));
    }

    public function edit($id)
    {
        $product = Product::find($id);
        $active = 'prod';
        return view('backend.edit-product', compact('active', 'product'));
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

    public function upload(Request $request)
    {
        $picture   = $request->file('file');

        if($picture) {
            $picture_name = $picture->getClientOriginalName();
            if (file_exists('products/images/' . $picture_name)) {
                $picture_name = rand(0, 999999) . '-t-' . $picture_name;
            }
            move_uploaded_file($picture, "products/images/" . $picture_name);

            Picture::create([
                'product_id' => $request->id,
                'url'        => $picture_name
            ]);

            return response()->json([
                'image' => $picture_name
            ], 200);
        }


        return response()->json([
            'error' => 'Ceva probleme...'
        ], 500);

    }

    public function gallery($id)
    {
        $pictures = Picture::where('product_id', $id)->get();
        $active = 'prod';
        return view('backend.gallery', compact('active', 'pictures'));
    }

}
