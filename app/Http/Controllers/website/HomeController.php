<?php

namespace App\Http\Controllers\website;

use App\Models\Category;
use App\Models\Comment;
use App\Models\NewsArticle;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::with("posts")->paginate(5);
        $rssFeedUrl = "https://vnexpress.net/rss/giao-duc.rss";
        $rssContent = simplexml_load_file($rssFeedUrl);

        // Chuyển đổi nội dung RSS thành mảng để sử dụng trong view
        $rssArticles = [];
        foreach ($rssContent->channel->item as $item) {
            $rssArticles[] = [
                'title' => (string) $item->title,
                'link' => (string) $item->link,
                'description' => (string) $item->description,
                'published_at' => (string) $item->pubDate,
                'image' => (string) $item->enclosure['url'] ?? '',
                'slug' => isset($item->slug) ? (string) $item->slug : '',
            ];
        }
        return view("website.index", compact("categories", "rssArticles"));
    }

    public function postsDetail($slug)
    {
        $postslide = Post::where("slug", $slug)->firstOrFail();
        $relatedPosts = Post::where('category_id', $postslide->category_id)
            ->where('slug', '!=', $slug)
            ->take(3)
            ->get();

        // Tải nội dung RSS
        $rssFeedUrl = "https://vnexpress.net/rss/thoi-su.rss";
        $rssContent = simplexml_load_file($rssFeedUrl);

        // Chuyển đổi nội dung RSS thành mảng để sử dụng trong view
        $rssArticles = [];
        foreach ($rssContent->channel->item as $item) {
            $rssArticles[] = [
                'title' => (string) $item->title,
                'link' => (string) $item->link,
                'description' => (string) $item->description,
                'published_at' => (string) $item->pubDate,
                'image' => (string) $item->enclosure['url'] ?? '',
                'slug' => isset($item->slug) ? (string) $item->slug : '',
            ];
        }

        // Trả dữ liệu ra view
        return view("website.posts.detail", compact("postslide", "relatedPosts", "rssArticles"));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function introduce(Request $request)
    {
        $introduct = Post::where("title", "giới thiệu")->first();

        $rssFeedUrl = "https://giaoducthoidai.vn/rss/tuyen-sinh-du-hoc-26.rss";
        $rssContent = simplexml_load_file($rssFeedUrl);

        // Chuyển đổi nội dung RSS thành mảng để sử dụng trong view
        $rssArticles = [];
        foreach ($rssContent->channel->item as $item) {
            // Lấy hình ảnh từ thẻ <image> hoặc <description>
            $image = (string) $item->image ?? '';
            if (empty($image)) {
                preg_match('/<img src="([^"]+)"/', (string) $item->description, $matches);
                $image = $matches[1] ?? '';
            }

            // Làm sạch mô tả
            $description = strip_tags((string) $item->description, '<p><br>');

            $rssArticles[] = [
                'title' => (string) $item->title,
                'link' => (string) $item->link,
                'description' => $description,
                'published_at' => (string) $item->pubDate,
                'image' => $image,
            ];
        }

        return view("website.posts.detail", compact("rssArticles", "introduct"));
    }
    public function registerForm()
    {
        return view('website.register.register');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
