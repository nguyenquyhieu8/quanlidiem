@extends('website.components.layout')
@section('content')
    <section class="hero bg-light py-5">
        <div class="container">
            <!-- Tiêu đề -->
            <div class="text-center mb-5">
                <h3 class="fw-bold text-primary">Đăng Ký Công Dân</h3>
                <p class="text-muted">Vui lòng nhập đầy đủ thông tin để hoàn tất thủ tục đăng ký công dân</p>
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
                            <form action="{{ route('website.citizens.store') }}" method="POST">
                                @csrf
                                <div class="row g-4">
                                    <!-- Họ và Tên -->
                                    <div class="col-md-6">
                                        <label for="full_name" class="form-label">Họ và Tên</label>
                                        <input type="text" name="full_name" class="form-control rounded-pill"
                                            id="full_name" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="relation" class="form-label">Quan hệ</label>
                                        <input type="text" name="relation" class="form-control" id="relation" required>
                                    </div>
                                    <!-- CCCD -->
                                    <div class="col-md-6">
                                        <label for="cccd" class="form-label">CCCD</label>
                                        <input type="text" name="cccd" class="form-control rounded-pill"
                                            id="cccd" required>
                                    </div>

                                    <!-- Địa chỉ và Ngày sinh -->
                                    <div class="col-md-6">
                                        <label for="address" class="form-label">Địa chỉ</label>
                                        <input type="text" name="address" class="form-control rounded-pill"
                                            id="address" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="birth_date" class="form-label">Ngày sinh</label>
                                        <input type="date" name="birth_date" class="form-control rounded-pill"
                                            id="birth_date" required>
                                    </div>

                                    <!-- Giới tính và Nơi cư trú -->
                                    <div class="col-md-6">
                                        <label for="gender" class="form-label">Giới tính</label>
                                        <select name="gender" class="form-select rounded-pill" id="gender" required>
                                            <option value="A">Nam</option>
                                            <option value="N">Nữ</option>
                                            <option value="K">Khác</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="residence" class="form-label">Nơi cư trú</label>
                                        <input type="text" name="residence" class="form-control rounded-pill"
                                            id="residence" required>
                                    </div>

                                    <!-- Nơi sinh và Quốc tịch -->
                                    <div class="col-md-6">
                                        <label for="birth_place" class="form-label">Nơi sinh</label>
                                        <input type="text" name="birth_place" class="form-control rounded-pill"
                                            id="birth_place" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="nationality" class="form-label">Quốc tịch</label>
                                        <input type="text" name="nationality" class="form-control rounded-pill"
                                            id="nationality" required>
                                    </div>

                                    <!-- Dân tộc và Nghề nghiệp -->
                                    <div class="col-md-6">
                                        <label for="ethnicity" class="form-label">Dân tộc</label>
                                        <input type="text" name="ethnicity" class="form-control rounded-pill"
                                            id="ethnicity" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="occupation" class="form-label">Nghề nghiệp</label>
                                        <input type="text" name="occupation" class="form-control rounded-pill"
                                            id="occupation" required>
                                    </div>

                                    <!-- Dropdown Mã đăng ký sinh -->
                                    <div class="col-md-12">
                                        <label for="birth_registration_id" class="form-label">Mã Đăng Ký Sinh</label>
                                        <select name="birth_registration_id" class="form-select rounded-pill"
                                            id="birth_registration_id" required>
                                            <option value="" disabled selected>Chọn Mã Đăng Ký Sinh</option>
                                            @php
                                                use App\Models\BirthRegistration; // Adjust the namespace as necessary
                                            @endphp
                                            @foreach (BirthRegistration::all() as $registration)
                                                <option value="{{ $registration->id }}">
                                                    {{ $registration->full_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <!-- Ghi chú -->
                                    <div class="col-md-12">
                                        <label for="notes" class="form-label">Ghi chú</label>
                                        <textarea name="notes" class="form-control rounded" id="notes" rows="3"></textarea>
                                    </div>
                                </div>

                                <!-- Submit -->
                                <div class="text-center mt-4">
                                    <button type="submit" class="btn btn-primary px-5 py-2 rounded-pill shadow-sm" style="color:white;">
                                        <i class="fas fa-paper-plane me-2"></i> Đăng Ký
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
        .form-control:focus,
        .form-select:focus {
            border-color: #0d6efd;
            box-shadow: 0 0 0 0.2rem rgba(13, 110, 253, 0.25);
        }

        .btn-primary {
            background-color: #0d6efd;
            border: none;
        }

        h3 {
            font-size: 1.75rem;
        }
    </style>
@endsection
