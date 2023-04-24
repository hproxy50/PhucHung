<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
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
                    ->paginate(100);
            } else {
                $products = collect();
            }
        } else {
            $products = Product::where('name', 'like', '%'.$query.'%')
                ->orWhere('desc', 'like', '%'.$query.'%')
                ->paginate(100);
        }
    
        return view('products.index', compact('categories', 'products', 'category_name'));
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        //
        $categories = Category::all();
        return view('products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'required|string|max:255',
            'desc' => 'required|string|max:25555',
            'price' => 'required|numeric|min:0',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'category_id' => 'required|exists:App\Models\Category,id'
        ]);
        $input = $request ->all();
        if ($image = $request ->file('image')){
            $destinationPath = 'images/';
            $profileImage = date('YmdHis') . "." . $image -> getClientOriginalExtension();
            $image ->move ($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }
        Product::create([
            'name' => $request->name,
            'desc' => $request->desc,
            'price' => $request->price,
            'image' => $profileImage,
            'category_id' => $request->category_id,
        ]);
        return redirect()->route('products.index')->with('msg', 'Product Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
        return view('products.show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
        $categories = Category::all();
        return view('products.edit', compact('categories', 'product'));
 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Find the product to be updated
        $product = Product::find($id);
        
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'desc' => 'required|string|max:25555',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'category_id' => 'required|exists:App\Models\Category,id'
        ]);
        
        // Store the new input data in an array
        $input = $request->all();
        
        // If a new image file is uploaded, save it to the server
        if ($image = $request->file('image')){
            $destinationPath = 'images/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = $profileImage;
        } else {
            // If no new image is uploaded, use the existing image
            $input['image'] = $product->image;
        }
        
        // Update the product with the new input data
        $product->update([
            'name' => $input['name'],
            'desc' => $input['desc'],
            'price' => $request->price,
            'image' => $input['image'],
            'category_id' => $input['category_id'],
        ]);
        
        // Redirect the user back to the product index page with a success message
        return redirect()->route('products.index')->with('msg', 'Product updated successfully');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
        $product->delete();
        return redirect()->route('products.index')->with('msg', 'Product Delete Successfully');
    }
}
