<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('categories')->get();
        return view('admin.products.index', compact('products'));
    }


    public function show(string $id)
    {
        $product = Product::with('categories')->findOrFail($id);
        return view('user.product', compact('product'));
    }

    public function store(Request $request)
    {
        // Generate slug from the product name
        $request['slug'] = Str::slug($request->name, '-');

        // Validate the request data
        $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:products',
            'price' => 'required|numeric',
            'category_id' => 'required', // Ensure multiple categories can be selected
            'category_id.*' => 'exists:categories,id', // Ensure each category exists
            'imagePhoto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Handle the product image
        $imageName = time() . '.' . request()->imagePhoto->getClientOriginalExtension();
        request()->imagePhoto->move(public_path('images/products'), $imageName);
        $request->merge(['image' => $imageName]);

        // Create the product
        $product = Product::create($request->all());

        // Attach the selected categories to the product
        $product->categories()->attach($request->category_id); // Attach categories here

        // Get all categories to pass to the view
        $allCategories = Category::all();

        // Return view with success message
        return view('admin.products.create', compact("allCategories"))
            ->with('success', 'Product created successfully');
    }

    public function create()
    {
        $allCategories = Category::all();
        return view('admin.products.create', compact('allCategories'));
    }

    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);
        if (file_exists(asset('images/products/' . $product->image . '.jpg'))) {
            File::delete(public_path('images/products/' . $product->image . '.jpg'));
        }

        if (Product::destroy($id)) {

            return redirect()->route('products.index')->with('success', 'Product has been deleted');
        } else {
            return redirect()->route('products.index')->with('error', 'Something went wrong');
        }
    }

}
