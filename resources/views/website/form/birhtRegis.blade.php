@extends('website.components.layout')
@section('content')
    <section class="hero bg-light py-5">
        <div class="container">
            <!-- Tiêu đề -->
            <div class="text-center mb-5">
                <h3 class="fw-bold text-primary">Đăng Ký Khai Sinh</h3>
                <p class="text-muted">Vui lòng nhập đầy đủ thông tin để hoàn tất thủ tục</p>
            </div>

            <!-- Form -->
            <div class="row justify-content-center">
                <div class="col-lg-10">
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
                            <form action="{{ route('website.birth-registrations.store') }}" method="POST">
                                @csrf
                                <div class="row g-4">
                                    <!-- Họ và tên -->
                                    <div class="col-md-6">
                                        <label for="full_name" class="form-label">Họ và tên</label>
                                        <input type="text" id="full_name" name="full_name" class="form-control rounded-pill"
                                            required>
                                    </div>
                                    <!-- Ngày sinh -->
                                    <div class="col-md-6">
                                        <label for="birth_date" class="form-label">Ngày sinh</label>
                                        <input type="date" id="birth_date" name="birth_date" class="form-control rounded-pill"
                                            required>
                                    </div>
                                    <!-- Giới tính -->
                                    <div class="col-md-6">
                                        <label for="gender" class="form-label">Giới tính</label>
                                        <select id="gender" name="gender" class="form-select rounded-pill" required>
                                            <option value="A">Chưa xác định</option>
                                            <option value="M">Nam</option>
                                            <option value="F">Nữ</option>
                                        </select>
                                    </div>
                                    <!-- Dân tộc -->
                                    <div class="col-md-6">
                                        <label for="ethnicity" class="form-label">Dân tộc</label>
                                        <input type="text" id="ethnicity" name="ethnicity" class="form-control rounded-pill"
                                            required>
                                    </div>
                                    <!-- Quốc tịch -->
                                    <div class="col-md-6">
                                        <label for="nationality" class="form-label">Quốc tịch</label>
                                        <input type="text" id="nationality" name="nationality" class="form-control rounded-pill"
                                            required>
                                    </div>
                                    <!-- Nơi sinh -->
                                    <div class="col-md-6">
                                        <label for="birth_place" class="form-label">Nơi sinh</label>
                                        <input type="text" id="birth_place" name="birth_place" class="form-control rounded-pill"
                                            required>
                                    </div>
                                    <!-- Quê quán -->
                                    <div class="col-md-6">
                                        <label for="hometown" class="form-label">Quê quán</label>
                                        <input type="text" id="hometown" name="hometown" class="form-control rounded-pill"
                                            required>
                                    </div>
                                    <!-- Nơi cư trú -->
                                    <div class="col-md-6">
                                        <label for="residence" class="form-label">Nơi cư trú</label>
                                        <input type="text" id="residence" name="residence" class="form-control rounded-pill"
                                            required>
                                    </div>
                                    <!-- Cha và CCCD -->
                                    <div class="col-md-6">
                                        <label for="father_name" class="form-label">Họ tên cha</label>
                                        <input type="text" id="father_name" name="father_name" class="form-control rounded-pill"
                                            required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="father_cccd" class="form-label">Số CCCD cha</label>
                                        <input type="text" id="father_cccd" name="father_cccd"
                                            class="form-control rounded-pill" required>
                                    </div>
                                    <!-- Mẹ và CCCD -->
                                    <div class="col-md-6">
                                        <label for="mother_name" class="form-label">Họ tên mẹ</label>
                                        <input type="text" id="mother_name" name="mother_name" class="form-control rounded-pill"
                                            required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="mother_cccd" class="form-label">Số CCCD mẹ</label>
                                        <input type="text" id="mother_cccd" name="mother_cccd"
                                            class="form-control rounded-pill" required>
                                    </div>
                                    <!-- Mối quan hệ -->
                                    <div class="col-md-12">
                                        <label for="relation" class="form-label">Mối quan hệ</label>
                                        <input type="text" id="relation" name="relation" class="form-control rounded-pill"
                                            required>
                                    </div>
                                </div>
                                <!-- Submit -->
                                <div class="text-center mt-4">
                                    <button type="submit" class="btn btn-primary px-4 py-2 rounded-pill shadow-sm" style="color:white;">
                                        <i class="fas fa-paper-plane me-2"></i> Đăng ký
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Custom CSS -->
    <style>
        .hero {
            background: linear-gradient(to right, #f8f9fa, #e9ecef);
        }

        .form-control:focus,
        .form-select:focus {
            border-color: #0d6efd;
            box-shadow: 0 0 0 0.2rem rgba(13, 110, 253, 0.25);
        }

        .btn-primary {
            background-color: #0d6efd;
            border: none;
        }
    </style>
@endsection
