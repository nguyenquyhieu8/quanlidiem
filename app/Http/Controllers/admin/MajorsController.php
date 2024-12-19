<?php

namespace App\Http\Controllers\admin;


use App\Models\Major;
use App\Models\SubjectBlock;
use Illuminate\Http\Request;
use App\Models\subject_blocks;
use App\Http\Controllers\Controller;

class MajorsController extends Controller
{
    public function index()
    {
        $majors = Major::paginate(20);
        return view('admin.majors.index', compact('majors'));
    }


    public function create()
    {
        $subjectBlocks = SubjectBlock::all();
        return view('admin.majors.create', compact('subjectBlocks'));
    }

    public function edit($id)
    {
        $subjectBlocks = SubjectBlock::all();
        $major = Major::findOrFail($id);
        return view('admin.majors.edit', compact('major', 'subjectBlocks'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'major_name' => 'required|string|max:255',
            'major_code' => 'required|string|unique:majors,major_code|max:50',
            'subject_block_id' => 'required|exists:subject_blocks,id',
        ]);

        Major::create($request->all());
        return redirect()->route('quantri.majors.index')->with('success', 'Major created successfully.');
    }

    public function update(Request $request, Major $major)
    {
        $request->validate([
            'major_name' => 'required|string|max:255',
            'major_code' => 'required|string|unique:majors,major_code,' . $major->id . '|max:50',
            'subject_block_id' => 'required|exists:subject_blocks,id',
        ]);

        $major->update($request->all());
        return redirect()->route('quantri.majors.index')->with('success', 'Major updated successfully.');
    }

    public function destroy(Request $request, $id)
    {
        $majors = Major::find($id);
        if (!$majors) {
            return redirect()->back()->with("error", "Không tồn tại người dùng");

        }
        $majors->delete();
        return redirect()->route("quantri.majors.index")->with("success", "Xóa nhóm người dùng thành công");

    }
}
