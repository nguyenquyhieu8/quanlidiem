<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Applicant;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function showForm($code)
    {
        $applicant = Applicant::where('code', $code)->first();

        if (!$applicant) {
            return redirect()->back()->with('error', 'Không tìm thấy thông tin ứng viên!');
        }

        return view('form', compact('applicant'));
    }
    public function send(Request $request, $code)
    {
        // Validate dữ liệu
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
            'file' => 'nullable|file|mimes:jpg,jpeg,png,pdf,doc,docx|max:2048', // Giới hạn file tối đa 2MB
        ]);

        // Tìm applicant dựa trên mã code từ URL
        $applicant = Applicant::where('code', $code)->first();

        if (!$applicant) {
            return redirect()->back()->with('error', 'Không tìm thấy thông tin ứng viên!');
        }

        // Xử lý file tải lên
        $filePath = null;
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filePath = $file->store('uploads/contacts', 'public'); // Lưu file vào thư mục storage/app/public/uploads/contacts
        }

        // Lưu dữ liệu vào bảng contacts
        Contact::create([
            'applicant_id' => $applicant->id,
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,
            'file_path' => $filePath, // Đường dẫn file
        ]);

        return redirect()->back()->with('success', 'Liên hệ đã được gửi thành công!');
    }



}
