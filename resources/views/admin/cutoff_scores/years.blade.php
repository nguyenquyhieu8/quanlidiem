@extends('admin.block.layout')

@section('content')
    <div class="container"  style="background-color: white;padding:50px">
        <h2>Danh sách Năm học</h2>
        <a href="{{ route('quantri.cutoff_scores.create') }}">
            <button type="button" class="btn btn-primary mb-3">Thêm điểm chuẩn</button>
        </a>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Năm học</th>
                        <th>Chức năng</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($schoolYears as $key => $year)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $year->name }}</td>
                            <td>
                                <a href="{{ route('quantri.cutoff_scores.showByYear', $year->id) }}" class="btn btn-info">
                                    Xem chi tiết
                                </a>
                                <a href="{{ route('quantri.cutoff_scores.editByYear', $year->id) }}" class="btn btn-warning">
                                    Cập nhật điểm
                                </a>
                                <!-- Nút Xóa -->
                                @if (Auth::user()->role_id != 2)
                                    <form action="{{ route('quantri.school_years.destroy', $year->id) }}" method="POST"
                                        style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger"
                                            onclick="return confirm('Bạn có chắc muốn xóa năm học này không?')">
                                            Xóa
                                        </button>
                                    </form>
                                @endif

                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center">Không có dữ liệu năm học</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
