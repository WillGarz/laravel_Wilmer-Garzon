<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('categories.index', compact('categories'));
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imageName = null;
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images/categories'), $imageName);
        }

        Category::create([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $imageName,
        ]);

        return redirect()->route('categories.index')->with('success', 'Category created successfully.');
    }

    public function show(Category $category)
    {
        return view('categories.show', compact('category'));
    }

    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $category = Category::findOrFail($id);

        if ($request->hasFile('image')) {
            // Elimina la imagen anterior si existe
            if ($category->image) {
                if (file_exists(public_path('images/categories/' . $category->image))) {
                    unlink(public_path('images/categories/' . $category->image));
                }
            }

            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images/categories'), $imageName);
            $category->image = $imageName;
        }

        $category->name = $request->name;
        $category->description = $request->description;
        $category->save();

        return redirect()->route('categories.index')->with('success', 'Category updated successfully.');
    }

    public function destroy(Category $category)
    {
        if ($category->image) {
            if (file_exists(public_path('images/categories/' . $category->image))) {
                unlink(public_path('images/categories/' . $category->image));
            }
        }

        $category->delete();
        return redirect()->route('categories.index')->with('success', 'Category deleted successfully.');
    }
}
