<?php

namespace App\Http\Controllers\website;

use App\Models\Category;
use App\Models\Comment;
use App\Models\NewsArticle;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("website.index");
    }

    public function postsDetail($slug)
    {
        // Lấy bài viết chi tiết
        $postslide = NewsArticle::where("slug", $slug)->firstOrFail();
        $comments = $postslide->comments()->orderBy('created_at', 'desc')->where("publish", 1)->get();
        // Lấy 3 bài viết liên quan
        $relatedPosts = NewsArticle::where('category_id', $postslide->category_id)
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
        return view("website.posts.detail", compact("postslide", "relatedPosts", "rssArticles", "comments"));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function postComment(Request $request)
    {

        // Validate dữ liệu đầu vào
        $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'content' => 'required|string|max:5000',
        ]);

        $comment = new Comment();
        $comment->post_id = $request->post_id;
        $comment->author_name = $request->username;
        $comment->author_email = $request->email;
        $comment->content = $request->content;
        $comment->save();

        // Chuyển hướng hoặc trả thông báo thành công
        return redirect()->back()->with('success', 'Comment has been posted successfully!');
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
