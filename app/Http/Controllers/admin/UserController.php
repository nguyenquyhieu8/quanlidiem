<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::where("id", '!=', Auth::user()->id)->paginate(20);
        return view('admin.users.index', compact('users'));
    }

    public function create(User $user)
    {
        return view("admin.users.create");
    }

    public function store(Request $request)
    {
        // Xác thực dữ liệu
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'address' => 'nullable|string|max:255',
            'position' => 'nullable|string|max:255',
            'role_id' => 'required|integer|in:1,2',
            'is_active' => 'required|boolean',
        ], [
            'name.required' => 'Tên là trường bắt buộc.',
            'name.string' => 'Tên phải là một chuỗi ký tự.',
            'name.max' => 'Tên không được vượt quá :max ký tự.',

            'email.required' => 'Email là trường bắt buộc.',
            'email.email' => 'Email không đúng định dạng.',
            'email.unique' => 'Email đã tồn tại trong hệ thống.',

            'password.required' => 'Mật khẩu là trường bắt buộc.',
            'password.string' => 'Mật khẩu phải là một chuỗi ký tự.',
            'password.min' => 'Mật khẩu phải có ít nhất :min ký tự.',

            'address.string' => 'Địa chỉ phải là một chuỗi ký tự.',
            'address.max' => 'Địa chỉ không được vượt quá :max ký tự.',

            'position.string' => 'Chức vụ phải là một chuỗi ký tự.',
            'position.max' => 'Chức vụ không được vượt quá :max ký tự.',

            'role_id.required' => 'Vai trò là trường bắt buộc.',
            'role_id.integer' => 'Vai trò phải là một số nguyên.',
            'role_id.in' => 'Vai trò không hợp lệ.',

            'is_active.required' => 'Trạng thái kích hoạt là trường bắt buộc.',
            'is_active.boolean' => 'Trạng thái kích hoạt phải là đúng hoặc sai (boolean).',
        ]);

        User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'address' => $request->input('address'),
            'position' => $request->input('position'),
            'role_id' => $request->input('role_id'),
            'is_active' => $request->input('is_active'),
        ]);

        return redirect()->route('quantri.user.index')->with('success', 'Người dùng đã được tạo thành công!');
    }
    public function edit(User $user)
    {
        $user = User::find($user->id);
        return view("admin.users.edit", compact("user"));
    }

    public function update(Request $request, $id)
    {
        // Lấy thông tin người dùng dựa trên $id
        $user = User::findOrFail($id);

        // Xác thực dữ liệu
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:6',
            'address' => 'nullable|string|max:255',
            'position' => 'nullable|string|max:255',
            'role_id' => 'required|integer|in:1,2',
            'is_active' => 'required|boolean',
        ], [
            'name.required' => 'Tên là trường bắt buộc.',
            'name.string' => 'Tên phải là một chuỗi ký tự.',
            'name.max' => 'Tên không được vượt quá :max ký tự.',

            'email.required' => 'Email là trường bắt buộc.',
            'email.email' => 'Email không đúng định dạng.',
            'email.unique' => 'Email đã tồn tại trong hệ thống.',

            'password.string' => 'Mật khẩu phải là một chuỗi ký tự.',
            'password.min' => 'Mật khẩu phải có ít nhất :min ký tự.',
            'password.confirmed' => 'Mật khẩu xác nhận không khớp.',

            'address.string' => 'Địa chỉ phải là một chuỗi ký tự.',
            'address.max' => 'Địa chỉ không được vượt quá :max ký tự.',

            'position.string' => 'Chức vụ phải là một chuỗi ký tự.',
            'position.max' => 'Chức vụ không được vượt quá :max ký tự.',

            'role_id.required' => 'Vai trò là trường bắt buộc.',
            'role_id.integer' => 'Vai trò phải là một số nguyên.',
            'role_id.in' => 'Vai trò không hợp lệ.',

            'is_active.required' => 'Trạng thái kích hoạt là trường bắt buộc.',
            'is_active.boolean' => 'Trạng thái kích hoạt phải là đúng hoặc sai (boolean).',
        ]);

        // Cập nhật thông tin người dùng
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->address = $request->input('address');
        $user->position = $request->input('position');
        $user->role_id = $request->input('role_id');
        $user->is_active = $request->input('is_active');

        // Kiểm tra nếu có mật khẩu mới
        if ($request->filled('password')) {
            $user->password = Hash::make($request->input('password'));
        }

        // Lưu thay đổi vào cơ sở dữ liệu
        $user->save();

        // Chuyển hướng về trang danh sách người dùng với thông báo thành công
        return redirect()->route('quantri.user.index')->with('success', 'Thông tin người dùng đã được cập nhật thành công!');
    }

    public function destroy(Request $request, User $user)
    {
        $user = User::find($user->id);
        if (!$user) {
            return redirect()->back()->with("error", "Không tồn tại người dùng");

        }
        $user->delete();
        return redirect()->route("quantri.user.index")->with("success", "Xóa nhóm người dùng thành công");

    }
}
