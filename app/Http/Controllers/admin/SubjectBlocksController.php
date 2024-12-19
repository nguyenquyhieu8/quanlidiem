<?php

namespace App\Http\Controllers\admin;

use App\Models\SubjectBlock;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubjectBlocksController extends Controller
{
    public function index()
    {
        $subject_blocks = SubjectBlock::paginate(20);
        return view('admin.subject_blocks.index', compact('subject_blocks'));
    }

    public function create(SubjectBlock $subject_blocks)
    {
        return view("admin.subject_blocks.create");
    }

    public function store(Request $request)
    {
        // Xác thực dữ liệu
        $request->validate([
            'block_name' => 'required|unique:subject_blocks,block_name|max:255',
            'description' => 'nullable|string',
        ]);

        SubjectBlock::create([
            'block_name' => $request->block_name,
            'description' => $request->description,
        ]);

        return redirect()->route('quantri.subject_blocks.index')->with('success', 'Người dùng đã được tạo thành công!');
    }
    public function edit($id)
    {
        $subject_blocks_id = SubjectBlock::find($id);
        return view("admin.subject_blocks.edit", compact("subject_blocks_id"));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'block_name' => 'required|unique:subject_blocks,block_name,' . $id . '|max:255',
            'description' => 'nullable|string',
        ]);

        $subjectBlock = SubjectBlock::findOrFail($id);
        $subjectBlock->update([
            'block_name' => $request->block_name,
            'description' => $request->description,
        ]);
        // Chuyển hướng về trang danh sách người dùng với thông báo thành công
        return redirect()->route('quantri.subject_blocks.index')->with('success', 'Thông tin người dùng đã được cập nhật thành công!');
    }

    public function destroy(Request $request, $id)
    {
        $subject_blocks = SubjectBlock::find($id);
        if (!$subject_blocks) {
            return redirect()->back()->with("error", "Không tồn tại người dùng");

        }
        $subject_blocks->delete();
        return redirect()->route("quantri.subject_blocks.index")->with("success", "Xóa nhóm người dùng thành công");

    }
}
