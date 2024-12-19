<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Citizen;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\AbsenceRegistration;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class InfomationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Notification::with('user'); // Eager load citizen relationship

        if ($request->has('search')) {
            $searchTerm = $request->search;

            // Tìm kiếm theo lý do, địa điểm hoặc thông tin người dùng
            $query->where(function ($q) use ($searchTerm) {
                $q->where('reason', 'like', '%' . $searchTerm . '%')
                    ->orWhere('destination', 'like', '%' . $searchTerm . '%')
                    ->orWhereHas('user', function ($q) use ($searchTerm) {
                        $q->where('name', 'like', '%' . $searchTerm . '%') // Tìm theo tên
                            ->orWhere('email', 'like', '%' . $searchTerm . '%') // Tìm theo email
                            ->orWhere('phone', 'like', '%' . $searchTerm . '%'); // Tìm theo số điện thoại
                    });
            });
        }

        $noti = $query->paginate(10); // Paginate results
        return view('backend.info.index', compact('noti'));
    }
    public function create()
    {
        $users = User::all();

        // Return the create view with the users and citizens
        return view('backend.info.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Xác thực dữ liệu đầu vào
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'publish_date' => 'required|date',
            'expiry_date' => 'required|date|after_or_equal:publish_date',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Tối đa 2MB
            'video' => 'nullable|mimetypes:video/mp4,video/x-msvideo,video/x-matroska|max:20000', // Tối đa 20MB
        ]);

        // Khởi tạo một đối tượng Notification mới
        $notification = new Notification();
        $notification->title = $request->title;
        $notification->content = $request->content;
        $notification->publish_date = $request->publish_date;
        $notification->expiry_date = $request->expiry_date;
        $notification->user_id = $request->user_id;
        $notification->type = $request->user_id == "" ? 1 : 0;

        // Xử lý tệp hình ảnh
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public'); // Lưu vào thư mục public/images
            $notification->image = $imagePath;
        }

        // Xử lý tệp video
        if ($request->hasFile('video')) {
            $videoPath = $request->file('video')->store('videos', 'public'); // Lưu vào thư mục public/videos
            $notification->video = $videoPath;
        }

        // Lưu thông báo vào cơ sở dữ liệu
        $notification->save();

        // Chuyển hướng về trang thông báo với thông báo thành công
        return redirect()->route('noti.index')->with('success', 'Thông báo đã được gửi thành công!');
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
    public function edit($id)
    {
        $notification = Notification::findOrFail($id); // Lấy thông báo theo ID
        $users = User::all(); // Lấy danh sách người dùng

        return view('backend.info.edit', compact('notification', 'users')); // Trả về view kèm thông báo và danh sách người dùng
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'publish_date' => 'required|date',
            'expiry_date' => 'required|date|after_or_equal:publish_date',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Tối đa 2MB
            'video' => 'nullable|mimetypes:video/mp4,video/x-msvideo,video/x-matroska|max:20000', // Tối đa 20MB
        ]);

        $notification = Notification::findOrFail($id); // Lấy thông báo theo ID

        $notification->title = $request->title;
        $notification->content = $request->content;
        $notification->publish_date = $request->publish_date;
        $notification->expiry_date = $request->expiry_date;
        $notification->user_id = $request->user_id;
        $notification->type = $request->user_id == "" ? 1 : 0;

        // Xử lý hình ảnh
        if ($request->hasFile('image')) {
            // Xóa hình ảnh cũ nếu có
            if ($notification->image) {
                Storage::delete('public/storage/' . $notification->image);
            }
            $notification->image = $request->file('image')->store('images', 'public'); // Lưu hình ảnh mới
        }

        // Xử lý video
        if ($request->hasFile('video')) {
            // Xóa video cũ nếu có
            if ($notification->video) {
                Storage::delete('public/storage/' . $notification->video);
            }
            $notification->video = $request->file('video')->store('videos', 'public'); // Lưu video mới
        }

        $notification->save(); // Lưu thông báo đã cập nhật

        return redirect()->route('noti.index')->with('success', 'Thông báo đã được cập nhật thành công!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Tìm thông báo theo ID
        $notification = Notification::findOrFail($id);

        // Xóa hình ảnh nếu có
        if ($notification->image) {
            Storage::delete('public/' . $notification->image);
        }

        // Xóa video nếu có
        if ($notification->video) {
            Storage::delete('public/' . $notification->video);
        }

        // Xóa thông báo
        $notification->delete();

        // Chuyển hướng về trang danh sách thông báo với thông báo thành công
        return redirect()->route('noti.index')->with('success', 'Thông báo đã được xóa thành công!');
    }
}
