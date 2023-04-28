<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Banner;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $banners = Banner::all();
        $categories = Category::all();
        $query = $request->input('query');
        $category_name = $request->input('category_name');
        if ($category_name) {
            $category = Category::where('name', $category_name)->first();
            if ($category) {
                $products = $category->products()
                    ->where(function($q) use ($query){
                        $q->where('name', 'like', '%'.$query.'%')
                          ->orWhere('desc', 'like', '%'.$query.'%');
                    })
                    ->paginate(12);
            } else {
                $products = collect();
            }
        } else {
            $products = Product::where('name', 'like', '%'.$query.'%')
                ->orWhere('desc', 'like', '%'.$query.'%')
                ->paginate(12);
        }
    
        return view('shop', compact('categories', 'products', 'banners', 'category_name'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
