@extends('admin.block.layout')
@php
    $search = request('search');
@endphp

@section('style')
    <style>
        .modal {
            max-height: 80%;
        }

        .modal-header {
            height: 15% !important;
        }

        .modal-body {
            height: 70%;
            overflow: auto;
        }

        .modal-footer {
            height: 15%;
        }

        .container {
            margin-top: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table th,
        table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        table th {
            background-color: #007bff;
            text-transform: uppercase;
        }

        .status-pass {
            color: green;
            font-weight: bold;
        }

        .status-fail {
            color: red;
            font-weight: bold;
        }

        .no-result {
            color: red;
            text-align: center;
            font-weight: bold;
        }
    </style>
@endsection

@section('content')
    <div class="container">
        <!-- Form tìm kiếm -->
        <h2 class="text-center text-uppercase">Tìm kiếm thông tin nguyện vọng</h2>
        <form action="{{ route('applicants.getSearchResult') }}" method="GET">
            @csrf
            <div class="form-group">
                <label for="search">Nhập mã số sinh viên</label>
                <input type="text" name="search" id="search" class="form-control" placeholder="Nhập mã số sinh viên"
                    value="{{ $search ?? '' }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Tìm kiếm</button>
        </form>

        <!-- Hiển thị kết quả -->
        @if (session('error'))
            <p class="no-result">{{ session('error') }}</p>
        @elseif (isset($applicant))
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Mã số</th>
                        <th>Họ tên</th>
                        <th>Ngành</th>
                        <th>Khối</th>
                        <th>Năm học</th>
                        <th>Điểm</th>
                        <th>Điểm chuẩn</th>
                        <th>Trạng thái</th>
                        @if ($isPass)
                            <th>Liên hệ</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $applicant->code }}</td>
                        <td>{{ $applicant->name }}</td>
                        <td>{{ $applicant->major->name }}</td>
                        <td>{{ $applicant->subjectBlock->name }}</td>
                        <td>{{ $applicant->schoolYear->year }}</td>
                        <td>{{ $applicant->score }}</td>
                        <td>{{ $cutoffScore->score ?? 0 }}</td>
                        <td>
                            @if ($isPass)
                                <span class="status-pass">Đỗ</span>
                            @else
                                <span class="status-fail">Không đỗ</span>
                            @endif
                        </td>
                        <td>
                            @if ($isPass)
                                <!-- Chuyển hướng đến form liên hệ -->
                                <a href="{{ route('contact.form', ['code' => $applicant->code]) }}"
                                    class="btn btn-primary">Gửi liên hệ</a>
                            @endif
                        </td>

                    </tr>
                </tbody>
            </table>
        @endif
    </div>
@endsection

@section('scripts')
    <!-- Thêm JavaScript của Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@endsection
