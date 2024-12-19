@extends('admin.block.layout')
@section('style')
    <style>
        .button {
            border: none;
        }
    </style>
@section('content')
    <div class="container">
        <h2>Danh sách Thí sinh Tuyển sinh</h2>
        <a href="{{ route('applicants.create') }}">
            <button type="button" class="btn btn-primary mb-3">Thêm thí sinh</button>
        </a>
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Họ tên</th>
                        <th>Mã số</th>
                        <th>Ngày sinh</th>
                        <th>Email</th>
                        <th>Điện thoại</th>
                        <th>Năm học</th>
                        <th>Ngành</th>
                        <th>Khối</th>
                        <th>Điểm</th>
                        <th>Chức năng</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($applicants as $key => $applicant)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $applicant->name }}</td>
                            <td>{{ $applicant->code }}</td>
                            <td>{{ $applicant->dob }}</td>
                            <td>{{ $applicant->email }}</td>
                            <td>{{ $applicant->phone }}</td>
                            <td>{{ $applicant->schoolYear->name }}</td>
                            <td>{{ $applicant->major->major_name }}</td>
                            <td>{{ $applicant->subjectBlock->block_name }}</td>
                            <td>{{ $applicant->score }}</td>
                            <td>
                                <a href="{{ route('applicants.edit', $applicant->id) }}" class="btn btn-info">Chỉnh sửa</a>
                                <form action="{{ route('applicants.destroy', $applicant->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Bạn có chắc muốn xóa thí sinh này không?')">Xóa</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="10" class="text-center">Không có dữ liệu thí sinh</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            {{ $applicants->links() }}
        </div>
    </div>
@endsection
