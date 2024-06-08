<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'category_id' => 'required|exists:categories,id',
        ]);

        $product = new Product($request->all());

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images/products'), $imageName);
            $product->image = $imageName;
        }

        $product->save();

        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }

    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'category_id' => 'required|exists:categories,id',
        ]);

        $product->fill($request->all());

        if ($request->hasFile('image')) {
            // Elimina la imagen anterior si existe
            if ($product->image) {
                if (file_exists(public_path('images/products/' . $product->image))) {
                    unlink(public_path('images/products/' . $product->image));
                }
            }

            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images/products'), $imageName);
            $product->image = $imageName;
        }

        $product->save();

        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }

    public function destroy(Product $product)
    {
        if ($product->image) {
            if (file_exists(public_path('images/products/' . $product->image))) {
                unlink(public_path('images/products/' . $product->image));
            }
        }

        $product->delete();
        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }
}
