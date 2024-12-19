<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $validated['slug'] = Str::slug($validated['name']); // Tạo slug từ tên

        Category::create($validated);
        return redirect()->route('quantri.categories.index');
    }

    public function edit(Category $category)
    {
        $category = Category::findOrFail($category->id);
        return view('admin.categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $validated['slug'] = Str::slug($validated['name']); // Tạo slug từ tên

        $category->update($validated);
        return redirect()->route('quantri.categories.index');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('quantri.categories.index');
    }
}
