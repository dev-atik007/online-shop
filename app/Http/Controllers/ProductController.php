<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category', 'subcategory', 'brand')->get();
        // dd($products);
        return view('admin.product.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::whereNull('parent_id')->get();
        $subcategories = Category::whereNull('is_parent')->get();   
        $brands = Brand::all();
        return view('admin.product.create', compact('categories', 'subcategories', 'brands'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'product_name' => 'required|max:40',
            'product_description' => 'string|required',
            'product_summary' => 'string|required',
            'product_category' => 'nullable',
            'product_sub_category' => 'nullable',
            'product_brand' => 'nullable',
            'product_quantity' => 'numeric|min:2',
            'product_price' => 'numeric',
            'status' => 'required|max:40',
            'product_weight' => 'numeric',
            'feature_product' => 'nullable',
            'product_image' => 'nullable'
        ]);
        // dd($request->all());
        // $productImage = null;
        // if ($request->hasFile('product_image')) {
        //     $file = $request->file('productImage');
        //     $categoryImage = uniqid('product_' . strtotime(date('Ymdhsis')), true) . '_' . rand(1, 1000) . $request->file('productImage')->getClientOriginalName();
        //     $file->storeAs('/uploads/product', $productImage);
        // }
        $fileName='';
        if($request->hasFile('product_image'))
        {
            $fileName=date('Ymdhis').'.'.$request->file('product_image')->getClientOriginalExtension();
            $request->file('product_image')->storeAs('/uploads/',$fileName);
        }

        $new_product = Product::create([
            'product_name' => $request->product_name,
            'product_description' => $request->product_description,
            'product_summary' => $request->product_summary,
            'product_photo' => $request->$fileName,
            'product_category' => $request->product_category,
            'product_sub_category' => $request->product_sub_category,
            'product_brand' => $request->product_brand,
            'product_quantity' => $request->product_quantity,
            'product_price' => $request->product_price,
            'product_weight' => $request->product_weight,
            'status' => $request->status,
        ]);

        return redirect()->route('admin.product.list');
        
    }

    public function edit($id)
    {
        $product = Product::find($id);
        $categories = Category::whereNull('parent_id')->get();
        $subcategories = Category::whereNull('is_parent')->get();
        $brands = Product::all();
        return view('admin.product.edit', compact('product', 'categories', 'subcategories','brands'));
    }
}
