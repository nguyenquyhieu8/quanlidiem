<?php

namespace App\Http\Controllers\website;

use App\Models\User;
use App\Models\Notification;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class InfoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (!Auth::check()) {
            return redirect()->route("login")->with('success', "Vui lòng đăng nhập tài khoản");
        }
        $user = auth()->user();
        $citizens = $user->citizens;  // Mối quan hệ hasMany
        $notifications = Notification::where('user_id', $user->id)
            ->where('expiry_date', '>=', now()) // Lọc các thông báo chưa hết hạn
            ->orderBy('publish_date', 'desc')
            ->get();
        return view('website.info.info', compact('user', 'citizens', 'notifications'));
    }
    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required|current_password',
            'new_password' => 'required|confirmed',
        ]);

        // Cập nhật mật khẩu cho người dùng
        $user = auth()->user();
        $user->update([
            'password' => bcrypt($request->new_password),
        ]);

        return back()->with('success', 'Mật khẩu đã được thay đổi!');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable|string',
            'address' => 'required|string',
            'phone' => 'required|string',
        ]);
        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->publish = $request->publish ?? 1;
        $user->head_code = $request->head_code;
        $user->members_count = $request->members_count;

        if ($request->filled('password')) {
            $user->password = bcrypt($request->password);
        }

        $user->address = $request->address;
        $user->phone = $request->phone;
        $user->save();

        return redirect()->back()->with('success', 'User updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
