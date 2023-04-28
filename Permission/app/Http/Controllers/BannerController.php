<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Banner;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $banners = Banner::all();
        return view('banners.index')->with('banners', $banners);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $banners = Banner::all();
        return view('banners.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'description' => 'required'
        ]);
    
        $input = $request ->all();
        if($image = $request -> file('image')){
            $destinationPath = 'images/';
            $profileImage = date('YmdHis') . "." . $image -> getClientOriginalExtension();
            $image ->move ($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }
        Banner::create([
            'title' => $request->title,
            'image' => $profileImage,
            'description' => $request->description,
        ]);
        return redirect()->route('banners.index')->with('msg', 'Banner Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Banner $banner)
    {
        //
        $banners = Banner::all();
        return view('banners.edit', compact('banner'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $banner = Banner::find($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'description' => 'required|string|max:255',
        ]);
        $input = $request->all();

        if ($image = $request->file('image')){
            $destinationPath = 'images/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = $profileImage;
        } else {
            // If no new image is uploaded, use the existing image
            $input['image'] = $banner->image;
        }
        $banner->update([
            'name' => $input['title'],
            'image' => $input['image'],
            'description' => $input['description'],
        ]);
        return redirect()->route('banners.index')->with('msg', 'Banner updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Banner $banner)
    {
        $banner->delete();
        return redirect()->route('banners.index')->with('msg', 'Product Delete Successfully');
    }
}
