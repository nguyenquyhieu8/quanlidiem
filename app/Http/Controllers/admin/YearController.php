<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\SchoolYear;
use Illuminate\Http\Request;

class YearController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $years = SchoolYear::paginate(10);
        return view("admin.year.index", compact("years"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.year.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'start_year' => 'required|integer|digits:4|between:1900,' . date("Y"),
            'end_year' => 'required|integer|digits:4|between:1900,' . date("Y"),
        ]);
        SchoolYear::create($request->all());
        return redirect()->route('quantri.years.index')->with('success', 'Years created successfully.');
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
        $SchoolYear = SchoolYear::find($id);
        return view("admin.year.edit", compact("SchoolYear"));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'start_year' => 'required|integer|digits:4|between:1900,' . date("Y"),
            'end_year' => 'required|integer|digits:4|between:1900,' . date("Y"),
        ]);

        $SchoolYear = SchoolYear::find($id);
        $SchoolYear->update([
            'name' => $request->name,
            'start_year' => $request->start_year,
            'end_year' => $request->end_year,
        ]);
        // Chuyển hướng về trang danh sách người dùng với thông báo thành công
        return redirect()->route('quantri.years.index')->with('success', 'NĂM HỌC CẬP NHẠT THÀNH CÔNG');
    }

    public function destroy(Request $request, $id)
    {
        $subject_blocks = SchoolYear::find($id);
        if (!$subject_blocks) {
            return redirect()->back()->with("error", "Không tồn tại NĂM HỌC");

        }
        $subject_blocks->delete();
        return redirect()->route("quantri.years.index")->with("success", "Xóa năm học thnahf công");

    }
}
