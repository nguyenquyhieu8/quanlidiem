<?php

namespace App\Http\Controllers\admin;


use App\Models\Major;
use App\Models\Province;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProvinceController extends Controller
{
    public function index()
    {
        $Province = Province::paginate(20);
        return view('admin.Province.index', compact('Province'));
    }


    public function create()
    {
        return view('admin.Province.create', compact('subjectBlocks'));
    }

    public function edit($id)
    {
        $major = Province::findOrFail($id);
        return view('admin.majors.edit', compact('major', 'subjectBlocks'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'major_name' => 'required|string|max:255',
            'major_code' => 'required|string|unique:majors,major_code|max:50',
            'subject_block_id' => 'required|exists:subject_blocks,id',
        ]);

        Province::create($request->all());
        return redirect()->route('quantri.Province.index')->with('success', 'Major created successfully.');
    }

    public function update(Request $request, Major $major)
    {
        $request->validate([
            'major_name' => 'required|string|max:255',
            'major_code' => 'required|string|unique:majors,major_code,' . $major->id . '|max:50',
            'subject_block_id' => 'required|exists:subject_blocks,id',
        ]);

        $major->update($request->all());
        return redirect()->route('quantri.Province.index')->with('success', 'Major updated successfully.');
    }

    public function destroy(Request $request, $id)
    {
        $majors = Province::find($id);
        if (!$majors) {
            return redirect()->back()->with("error", "Không tồn tại người dùng");

        }
        $majors->delete();
        return redirect()->route("quantri.Province.index")->with("success", "Xóa nhóm người dùng thành công");

    }
}
