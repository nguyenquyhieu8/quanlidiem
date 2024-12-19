<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CutoffScore;
use App\Models\Major;
use App\Models\SubjectBlock;
use App\Models\SchoolYear;

class CutoffScoresController extends Controller
{
    public function index()
    {
        // Hiển thị danh sách điểm chuẩn
        $cutoffScores = CutoffScore::with(['major', 'subjectBlock', 'schoolYear'])->orderBy('created_at', 'desc')->paginate(20);
        return view('admin.cutoff_scores.index', compact('cutoffScores'));
    }

    public function yearIndex()
    {
        // Hiển thị danh sách năm học có điểm chuẩn
        $schoolYears = SchoolYear::has('cutoffScores')->get();
        return view('admin.cutoff_scores.years', compact('schoolYears'));
    }
    public function editByYear($yearId)
    {
        // Lấy thông tin năm học
        $schoolYear = SchoolYear::findOrFail($yearId);

        // Lấy danh sách điểm chuẩn cho năm học đã chọn, tổ chức thành mảng liên kết để dễ dàng truy xuất
        $cutoffScores = CutoffScore::where('school_year_id', $yearId)
            ->get()
            ->keyBy(function ($item) {
                return $item->major_id . '-' . $item->subject_block_id;
            });

        // Lấy tất cả các ngành và khối thi để hiển thị trong form
        $majors = Major::all();
        $subjectBlocks = SubjectBlock::all();

        return view('admin.cutoff_scores.edit', compact('schoolYear', 'cutoffScores', 'majors', 'subjectBlocks'));
    }

    public function updateByYear(Request $request, $yearId)
    {
        $request->validate([
            'scores' => 'required|array',
        ]);

        foreach ($request->scores as $majorId => $blocks) {
            foreach ($blocks as $blockId => $score) {
                if ($score !== null) {
                    // Tìm bản ghi hoặc tạo mới nếu chưa tồn tại
                    CutoffScore::updateOrCreate(
                        [
                            'school_year_id' => $yearId,
                            'major_id' => $majorId,
                            'subject_block_id' => $blockId,
                        ],
                        ['score' => $score]
                    );
                }
            }
        }

        return redirect()->route('quantri.cutoff_scores.years')->with('success', 'Điểm chuẩn đã được cập nhật thành công.');
    }

    public function showByYear($yearId)
    {
        // Lấy danh sách điểm chuẩn của năm học được chọn
        $cutoffScores = CutoffScore::with(['major', 'subjectBlock', 'schoolYear'])
            ->where('school_year_id', $yearId)
            ->orderBy('created_at', 'desc')
            ->paginate(20);

        $schoolYear = SchoolYear::findOrFail($yearId);

        return view('admin.cutoff_scores.index', compact('cutoffScores', 'schoolYear'));
    }

    public function create()
    {
        // Hiển thị form tạo điểm chuẩn
        $majors = Major::all();
        $subjectBlocks = SubjectBlock::all();
        $schoolYears = SchoolYear::all();
        return view('admin.cutoff_scores.create', compact('majors', 'subjectBlocks', 'schoolYears'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'school_year_id' => 'required|exists:school_years,id',
            'scores' => 'required|array',
        ]);

        // Lấy ID của năm học mà người dùng đã chọn
        $schoolYearId = $request->school_year_id;

        // Duyệt qua từng ngành và khối thi trong mảng scores
        foreach ($request->scores as $majorId => $blocks) {
            foreach ($blocks as $blockId => $score) {
                if ($score !== null) {
                    // Kiểm tra xem điểm chuẩn đã tồn tại cho năm học, ngành và khối này hay chưa
                    $existingCutoffScore = CutoffScore::where('school_year_id', $schoolYearId)
                        ->where('major_id', $majorId)
                        ->where('subject_block_id', $blockId)
                        ->first();

                    // Nếu đã tồn tại, bỏ qua hoặc thông báo lỗi
                    if ($existingCutoffScore) {
                        continue;
                    }

                    // Nếu chưa tồn tại, tạo bản ghi mới cho điểm chuẩn
                    CutoffScore::create([
                        'school_year_id' => $schoolYearId,
                        'major_id' => $majorId,
                        'subject_block_id' => $blockId,
                        'score' => $score,
                    ]);
                }
            }
        }

        return redirect()->route('quantri.cutoff_scores.years')->with('success', 'Điểm chuẩn được thêm thành công.');
    }

    public function edit($id)
    {
        // Hiển thị form chỉnh sửa điểm chuẩn
        $cutoffScore = CutoffScore::findOrFail($id);
        $majors = Major::all();
        $subjectBlocks = SubjectBlock::all();
        $schoolYears = SchoolYear::all();
        return view('admin.cutoff_scores.edit', compact('cutoffScore', 'majors', 'subjectBlocks', 'schoolYears'));
    }

    public function update(Request $request, $id)
    {
        // Tìm điểm chuẩn theo ID
        $cutoffScore = CutoffScore::findOrFail($id);

        // Validate dữ liệu
        $request->validate([
            'major_id' => 'required|exists:majors,id',
            'subject_block_id' => 'required|exists:subject_blocks,id',
            'school_year_id' => 'required|exists:school_years,id',
            'score' => 'required|numeric|min:0|max:30',
        ]);

        // Cập nhật điểm chuẩn
        $cutoffScore->update($request->all());
        return redirect()->route('quantri.cutoff_scores.years')->with('success', 'Điểm chuẩn được cập nhật thành công.');
    }

    public function destroy($id)
    {
        $schoolYear = SchoolYear::findOrFail($id);

        // Kiểm tra và xóa các điểm chuẩn liên quan nếu cần thiết
        $schoolYear->cutoffScores()->delete();

        // Xóa năm học
        $schoolYear->delete();

        return redirect()->route('quantri.cutoff_scores.years')->with('success', 'Năm học đã được xóa thành công.');
    }

}
