<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Unique;
use Illuminate\Support\Str;
use Yoeunes\Toastr\Facades\Toastr;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::with('parentCategory')->orderBy('id', 'desc')->get();
        return view('admin.category.list', compact('categories'));
    }

    public function create()
    {
        $parent_category = Category::where('is_parent', 1)->orderBy('name', 'ASC')->get();

        return view('admin.category.create', compact('parent_category'));
    }

    public function store(Request $request)
    {

        // dd($request->all());

        $request->validate([
            'name'      => 'string|required',
            'summary'   => 'string|required',
            'description' => 'string|required',
            'is_parent' => 'required|in:1,0',
            'parent_id' => 'nullable',
            'image'     => 'nullable'
        ]);
        // dd($request->all());


        $categoryImage = null;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $categoryImage = uniqid('category_' . strtotime(date('Ymdhsis')), true) . '_' . rand(1, 1000) . $request->file('image')->getClientOriginalName();
            $file->storeAs('/uploads/category', $categoryImage);
        }

        $categories = Category::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'parent_id' => $request->parent_id,
            'is_parent' => $request->is_parent,
            'description' => $request->description,
            'summary' => $request->summary,
            'image' => $request->$categoryImage,
            'status' => $request->status,
        ]);
        // dd($categories);

        // if(Category::create()){
        //     return redirect()->route('category.list');
        // }else{
        //     return redirect()->back();
        // }
        Toastr()->success('Category Added Successfully!');
        return redirect()->route('category.list');
    }

    public function edit($id)
    {
        $category = Category::find($id);
        $parent_category = Category::where('is_parent', 1)->orderBy('name', 'ASC')->get();
        return view('admin.category.edit', compact('category', 'parent_category'));
    }

    public function update(Request $request, $id)
    {
        $category = Category::find($id);

        $request->validate([
            'name'      => 'string|required',
            'summary'   => 'string|required',
            'description' => 'string|required',
            'is_parent' => 'required|in:1,0',
            'parent_id' => 'nullable',
            'image'     => 'nullable'
        ]);

        $categoryImage = null;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $categoryImage = uniqid('category_' . strtotime(date('Ymdhsis')), true) . '_' . rand(1, 1000) . $request->file('image')->getClientOriginalName();
            $file->storeAs('/uploads/category', $categoryImage);
        }

        $categories = Category::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'parent_id' => $request->parent_id,
            'is_parent' => $request->is_parent,
            'description' => $request->description,
            'summary' => $request->summary,
            'image' => $request->$categoryImage,
            'status' => $request->status,
        ]);
        Toastr()->success('Category Updated Successfully!');
        return redirect()->route('category.list');
    }

    public function view($id)
    {
        $category = Category::with('parentCategory')->orderBy('id', 'desc')->find($id);
        return view('admin.category.view', compact('category'));

        return redirect()->back();
    }

    public function delete($id)
    {
        $delete = Category::find($id);
        if($delete) {
            $delete->delete();
            Toastr()->success('Category Deleted Successfully!');
            return redirect()->back();
        } else {
            return redirect()->route('category.list');
        }

    }
    
}
