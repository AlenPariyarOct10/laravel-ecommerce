<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    public function create()
    {
        $allCategories = Category::all();
        return view('admin.products.create', compact('allCategories'));
    }

    public function store(Request $request)
    {
        $request['slug'] = Str::slug($request->name, '-');
        $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:products',
            'price' => 'required',
            'category_id' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);



        $imageName = time().'.'.request()->image->getClientOriginalExtension();
        request()->image->move(public_path('images/products'), $imageName);
        $request->merge(['image' => $imageName]);

        $allCategories = Category::all();

        if(Product::create($request->all()))
        {

            return view('admin.products.create', compact("allCategories"))->with('success', 'Product created successfully');
        }else{
            return view('admin.products.create', compact("allCategories"))->with('error', 'Failed to create product');
        }
    }
}
