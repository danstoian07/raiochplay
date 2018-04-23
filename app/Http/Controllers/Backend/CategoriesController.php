<?php

namespace App\Http\Controllers\Backend;

use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoriesController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('order', 'asc')->get();
        $active = 'cat';

        return view('backend.categories', compact('active', 'categories'));
    }

    public function store(CategoryRequest $request)
    {
        if ($request->active == 'on') {
            $request['active'] = 1;
        }

        $category = Category::create([
            'name'         => $request->name,
            'slug'         => $request->slug,
            'keywords'     => $request->keywords,
            'description'  => $request->description,
            'order'        => 999,
            'active'       => $request->active
        ]);

        $picture   = $request->file('picture');
        if($picture) {
            $picture_name = $picture->getClientOriginalName();
            if (file_exists('categories/pictures/' . $picture_name)) {
                $picture_name = rand(0, 9999) . '-t-' . $picture_name;
            }
            move_uploaded_file($picture, "categories/pictures/" . $picture_name);

            $category->update(['picture' => $picture_name]);
        }

        return redirect()->route('admin.categories')->with('message', 'Categoria a fost adaugata!')->with('color', 'bg-green');
    }

    public function order(Request $request)
    {
        $array = json_decode( $request->json, true );
//        dd($array);

        //RESET all values
        DB::table('categories')->update(['order' => NULL, 'main_category_id' => NULL]);

        $order = 1;
        foreach ($array as $parent) {
            $category = Category::find($parent['id']);
            $category->update(['order' => $order]);
            $order++;
            if(isset($parent['children'])) {
                $second_order = 1;
                foreach ($parent['children'] as $child) {
                    $second_category = Category::find($child['id']);
                    $second_category->update(['order' => $second_order, 'main_category_id' => $parent['id']]);
                    $second_order++;
                    if(isset($child['children'])) {
                        $third_order = 1;
                        foreach ($child['children'] as $nephew) {
                            $third_category = Category::find($nephew['id']);
                            $third_category->update(['order' => $third_order, 'main_category_id' => $child['id']]);
                            $third_order++;
                        }
                    }
                }
            }
        }

        return redirect()->route('admin.categories')->with('message', 'Ordinea a fost salvata!')->with('color', 'bg-green');
    }


    public function show($id)
    {
        $selected_category = Category::find($id);
        $categories = Category::orderBy('order', 'asc')->get();
        $active = 'cat';

        return view('backend.categories', compact('active', 'categories', 'selected_category'));
    }

    public function saveChanges(CategoryRequest $request)
    {
        $category = Category::find($request->id);

        if ($request->active == 'on') {
            $request['active'] = 1;
        }

        $category->update([
            'name'         => $request->name,
            'slug'         => $request->slug,
            'keywords'     => $request->keywords,
            'description'  => $request->description,
            'active'       => $request->active
        ]);

        $picture   = $request->file('picture');
        if($picture) {
            $picture_name = $picture->getClientOriginalName();
            if (file_exists('categories/pictures/' . $picture_name)) {
                $picture_name = rand(0, 9999) . '-t-' . $picture_name;
            }
            move_uploaded_file($picture, "categories/pictures/" . $picture_name);

            $category->update(['picture' => $picture_name]);
        }

        return redirect()->route('admin.categories')->with('message', 'Categoria a fost modificata!')->with('color', 'bg-green');
    }


    public function delete($id)
    {
        $category = Category::find($id);

        //remove children first
        $children = $category->childrenOf($category->id);
        if($children) {
            foreach ($children as $child) {
                $child->update(['main_category_id' => NULL]);
            }
        }

        //delete
        $category->delete();

        return redirect()->route('admin.categories')->with('message', 'Categoria a fost stearsa!')->with('color', 'bg-pink');
    }




}
