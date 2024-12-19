<?php

namespace App\Http\Controllers\Admin;

use App\Models\Major;
use App\Models\Province;
use App\Models\Applicant;
use App\Models\SchoolYear;
use App\Models\CutoffScore;
use Illuminate\Support\Str;
use App\Models\SubjectBlock;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ApplicantController extends Controller
{
    public function SearchResult()
    {
        $schoolYears = SchoolYear::all();
        $majors = Major::all();
        $subjectBlocks = SubjectBlock::all();
        $province = Province::all();
        return view("admin.applicants.search", compact("schoolYears", "majors", "subjectBlocks", "province"));
    }
    public function getSearchResult(Request $request)
    {
        // Validate input
        $request->validate([
            'search' => 'required|string',
        ]);

        // Tìm ứng viên dựa trên mã code
        $applicant = Applicant::with(['major', 'subjectBlock', 'schoolYear'])
            ->where('code', $request->search)
            ->first();
        $cutoffScore = CutoffScore::where('major_id', $applicant->major_id)
            ->where('subject_block_id', $applicant->subject_block_id)
            ->where('school_year_id', $applicant->school_year_id)
            ->first();

        $isPass = $cutoffScore && $applicant->score >= $cutoffScore->score;
        // Gửi kết quả tới view
        return view('admin.applicants.search', [
            'applicant' => $applicant,
            'cutoffScore' => $cutoffScore,
            'isPass' => $isPass,
        ]);
    }


    public function index()
    {
        // Lấy danh sách thí sinh và phân trang
        $applicants = Applicant::with(['schoolYear', 'major', 'subjectBlock'])->paginate(20);
        return view('admin.applicants.index', compact('applicants'));
    }

    public function create()
    {
        // Lấy danh sách năm học, ngành và khối để hiển thị trong form
        $schoolYears = SchoolYear::all();
        $majors = Major::all();
        $subjectBlocks = SubjectBlock::all();
        $province = Province::all();

        return view('admin.applicants.create', compact('schoolYears', 'majors', 'subjectBlocks', 'province'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'dob' => 'required|date',
            'email' => 'required|email|unique:applicants,email',
            'phone' => 'required|string|unique:applicants,phone',
            'school_year_id' => 'required|exists:school_years,id',
            'major_id' => 'required|exists:majors,id',
            'subject_block_id' => 'required|exists:subject_blocks,id',
            'score' => 'required|numeric|min:0|max:30',
        ]);
        $randomCode = Str::random(7);
        // Tạo mới thí sinh
        Applicant::create(array_merge($request->all(), ['code' => $randomCode]));

        return redirect()->route('applicants.index')->with('success', 'Thí sinh đã được thêm thành công.');
    }

    public function edit($id)
    {
        // Lấy thông tin thí sinh cần chỉnh sửa
        $applicant = Applicant::findOrFail($id);
        $schoolYears = SchoolYear::all();
        $majors = Major::all();
        $subjectBlocks = SubjectBlock::all();
        $province = Province::all();


        return view('admin.applicants.edit', compact('applicant', 'schoolYears', 'majors', 'subjectBlocks', 'province'));
    }

    public function update(Request $request, $id)
    {
        $applicant = Applicant::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'dob' => 'required|date',
            'email' => 'required|email|unique:applicants,email,' . $applicant->id,
            'phone' => 'required|string|unique:applicants,phone,' . $applicant->id,
            'school_year_id' => 'required|exists:school_years,id',
            'major_id' => 'required|exists:majors,id',
            'subject_block_id' => 'required|exists:subject_blocks,id',
            'score' => 'required|numeric|min:0|max:30',
        ]);

        // Cập nhật thông tin thí sinh
        $applicant->update($request->all());

        return redirect()->route('applicants.index')->with('success', 'Thí sinh đã được cập nhật thành công.');
    }

    public function destroy($id)
    {
        $applicant = Applicant::findOrFail($id);
        $applicant->delete();

        return redirect()->route('applicants.index')->with('success', 'Thí sinh đã được xóa thành công.');
    }

    public function withCutoffScores()
    {
        // Lấy danh sách các thí sinh có điểm >= điểm chuẩn
        $applicants = Applicant::with(['major', 'subjectBlock', 'schoolYear'])
            ->whereHas('major', function ($query) {
                $query->whereHas('cutoffScores', function ($query) {
                    $query->whereColumn('applicants.major_id', 'cutoff_scores.major_id')
                        ->whereColumn('applicants.subject_block_id', 'cutoff_scores.subject_block_id')
                        ->whereColumn('applicants.school_year_id', 'cutoff_scores.school_year_id')
                        ->whereRaw('applicants.score >= cutoff_scores.score');
                });
            })
            ->paginate(20);

        return view('admin.applicants.CutoffScores', compact('applicants'));
    }

}
