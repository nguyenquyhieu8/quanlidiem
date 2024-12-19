@extends('website.components.layout')
@section('content')
    <section class="hero bg-light py-5">
        <div class="container">
            <!-- Tiêu đề -->
            <div class="text-center mb-5">
                <h3 class="fw-bold text-primary">Đăng Ký Tạm Vắng</h3>
                <p class="text-muted">Vui lòng nhập đầy đủ thông tin để hoàn tất thủ tục đăng ký tạm vắng</p>
            </div>


            <!-- Form -->
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="card shadow-lg border-0 rounded">
                        <div class="card-body p-4">
                            <!-- Thông báo -->
                            @if (session('success'))
                                <div class="alert alert-success">{{ session('success') }}</div>
                            @endif

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <!-- Form Input -->
                            <form action="{{ route('website.temp-residence.store') }}" method="POST">
                                @csrf
                                <div class="row">

                                    <div class="col-md-6 mb-3">
                                        <label for="full_name" class="form-label">Họ và tên</label>
                                        <input type="text" id="full_name" name="full_name" class="form-control" required>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="cccd" class="form-label">Số CCCD</label>
                                        <input type="text" id="cccd" name="cccd" class="form-control" required>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="address" class="form-label">Địa chỉ</label>
                                        <input type="text" id="address" name="address" class="form-control" required>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="birth_date" class="form-label">Ngày sinh</label>
                                        <input type="date" id="birth_date" name="birth_date" class="form-control"
                                            required>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" id="email" name="email" class="form-control"
                                            placeholder="optional">
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="gender" class="form-label">Giới tính</label>
                                        <select id="gender" name="gender" class="form-select">
                                            <option value="A">Chưa xác định</option>
                                            <option value="N">Nam</option>
                                            <option value="N">Nữ</option>
                                        </select>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="phone" class="form-label">Số điện thoại</label>
                                        <input type="text" id="phone" name="phone" class="form-control" required>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="current_residence" class="form-label">Nơi cư trú hiện tại</label>
                                        <input type="text" id="current_residence" name="current_residence"
                                            class="form-control" required>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="birth_place" class="form-label">Nơi sinh</label>
                                        <input type="text" id="birth_place" name="birth_place" class="form-control"
                                            required>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="temp_residence_place" class="form-label">Nơi tạm trú</label>
                                        <input type="text" id="temp_residence_place" name="temp_residence_place"
                                            class="form-control" required>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="nationality" class="form-label">Quốc tịch</label>
                                        <input type="text" id="nationality" name="nationality" class="form-control"
                                            required>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="ethnicity" class="form-label">Dân tộc</label>
                                        <input type="text" id="ethnicity" name="ethnicity" class="form-control"
                                            required>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="occupation" class="form-label">Nghề nghiệp</label>
                                        <input type="text" id="occupation" name="occupation" class="form-control"
                                            required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="permanent_residence" class="form-label">Nơi cư trú thường trú</label>
                                        <input type="text" id="permanent_residence" name="permanent_residence"
                                            class="form-control" required>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="notes" class="form-label">Ghi chú</label>
                                        <textarea id="notes" name="notes" class="form-control"></textarea>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary" style="color:white;">Tạo mới</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Custom CSS -->
    <style>
        .form-control:focus,
        .form-select:focus {
            border-color: #0d6efd;
            box-shadow: 0 0 0 0.2rem rgba(13, 110, 253, 0.25);
        }

        .btn-primary {
            background-color: #0d6efd;
            border: none;
            transition: background-color 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #0b5ed7;
        }

        h3 {
            font-size: 1.75rem;
        }
    </style>
@endsection
