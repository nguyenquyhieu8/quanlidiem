<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with('category')->get();
        return view('admin.posts.index', compact('posts'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.posts.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|max:2048',
            'category_id' => 'required|exists:categories,id',
        ]);

        $validated['slug'] = Str::slug($validated['title']); // Tạo slug từ title
        $validated['is_published'] = $request->has('is_published'); // Lấy giá trị is_published

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('posts', 'public'); // Lưu ảnh vào thư mục public/posts
        }

        Post::create($validated);
        return redirect()->route('quantri.posts.index')->with("success", "tạo bài viết mới thành công");
    }

    public function edit(Post $post)
    {
        $categories = Category::all();
        return view('admin.posts.edit', compact('post', 'categories'));
    }

    public function update(Request $request, Post $post)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|max:2048',
            'category_id' => 'required|exists:categories,id',
        ]);

        $validated['slug'] = Str::slug($validated['title']); // Tạo slug từ title
        $validated['is_published'] = $request->has('is_published'); // Lấy giá trị is_published

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('posts', 'public'); // Lưu ảnh mới
        }

        $post->update($validated);
        return redirect()->route('quantri.posts.index')->with("success", "Cập nhật bài viết mới thành công");;
    }

    public function destroy(Post $post)
    {
        if ($post->image) {
            \Storage::disk('public')->delete($post->image); // Xóa ảnh khỏi thư mục lưu trữ
        }

        $post->delete();
        return redirect()->route('quantri.posts.index')->with("success", "Xóa bài viết mới thành công");;
    }
}
