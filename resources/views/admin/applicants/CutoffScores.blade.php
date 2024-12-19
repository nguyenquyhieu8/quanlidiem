@extends('admin.block.layout')

@section('content')
    <div class="container">
        <h2>Danh sách Thí sinh Tuyển sinh</h2>
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
