<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::all();
        return view('admin.brand.index', compact('brands'));
    }

    public function create()
    {
        $brands = Brand::all();
        return view('admin.brand.create', compact('brands'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'string|required',
            'description' => 'string|required',
            'summary' => 'string|required',
            'photo' => 'nullable',
            'status' => 'required'
        ]);
        // dd($request->all());

        $brandImage = null;
        if($request->hasFile('image')) {
            $file = $request->file('image');
            $brandImage = uniqid('brand_' . strtotime(date('Ymdhsis')), true) . '_' . rand(1, 1000) . $request->file('image')->getClientOriginalName();
            $file->storeAs('/uploads/brand', $brandImage);
        }
        

        $brands = Brand::create([
            'name' => $request->name,
            'description' => $request->description,
            'summary' => $request->summary,
            'image' => $request->image,
            'status' => $request->status,
        ]);
        if($brands) {
            Toastr()->success('Brand Added Successfully!');
            return redirect()->route('admin.brand.list');
        }else {
            Toastr()->error('Fill up Brand Credential!');
            return redirect()->back();
        }
    }

    public function edit($id)
    {
        $brands = Brand::find($id);
        return view('admin.brand.edit', compact('brands'));
    }

    public function update(Request $request, $id)
    {
        $brands = Brand::find($id);
        $request->validate([
            'name' => 'string|required',
            'description' => 'string|required',
            'summary' => 'string|required',
            'photo' => 'nullable',
            'status' => 'required'
        ]);

        $brandImage = null;
        if($request->hasFile('image')) {
            $file = $request->file('image');
            $brandImage = uniqid('brand_' . strtotime(date('Ymdhsis')), true) . '_' . rand(1, 1000) . $request->file('image')->getClientOriginalName();
            $file->storeAs('/uploads/brand', $brandImage);
        }
        
        $brands = Brand::create([
            'name' => $request->name,
            'description' => $request->description,
            'summary' => $request->summary,
            'image' => $request->image,
            'status' => $request->status,
        ]);
        if($brands) {
            Toastr()->success('Brand Successfully updated!');
            return redirect()->route('admin.brand.list');
        }else {
            Toastr()->error('Fill up Brand Credential!');
            return redirect()->back();
        }
    }

    public function view($id)
    {
        $brands = Brand::find($id);
        if($brands) {
            return view ('admin.brand.view');
        }
    }

    public function delete($id)
    {
        $delete = Brand::find($id);
        if($delete)
        {
            $delete->delete();
            Toastr()->success('Category Deleted Successfully!');
            return redirect()->back();
        } 
        else 
        {
            return redirect()->route('category.list');
        }
        
    }


}
