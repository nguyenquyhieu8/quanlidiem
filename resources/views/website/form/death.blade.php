@extends('website.components.layout')
@section('content')
    <section class="hero bg-light py-5">
        <div class="container">
            <!-- Tiêu đề -->
            <div class="text-center mb-5">
                <h3 class="fw-bold text-primary">Đăng Ký Khai Tử</h3>
                <p class="text-muted">Vui lòng nhập đầy đủ thông tin để hoàn tất thủ tục khai tử</p>
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
                            <form action="{{ route('website.death.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row g-4">
                                    <!-- Ngày khai tử -->
                                    <div class="col-md-6">
                                        <label for="death_date" class="form-label">Ngày khai tử</label>
                                        <input type="date" id="death_date" name="death_date"
                                            class="form-control rounded-pill" required>
                                    </div>

                                    <!-- Ngày báo cáo -->
                                    <div class="col-md-6">
                                        <label for="report_date" class="form-label">Ngày báo cáo</label>
                                        <input type="date" id="report_date" name="report_date"
                                            class="form-control rounded-pill" required>
                                    </div>

                                    <!-- Nơi khai tử -->
                                    <div class="col-md-6">
                                        <label for="death_place" class="form-label">Nơi khai tử</label>
                                        <input type="text" id="death_place" name="death_place"
                                            class="form-control rounded-pill" required>
                                    </div>

                                    <!-- Lý do -->
                                    <div class="col-md-6">
                                        <label for="cause" class="form-label">Lý do</label>
                                        <input type="text" id="cause" name="cause"
                                            class="form-control rounded-pill" required>
                                    </div>

                                    <!-- Công dân -->
                                    <div class="col-md-6">
                                        <label for="citizen_id" class="form-label">Công dân</label>
                                        <select id="citizen_id" name="citizen_id" class="form-select rounded-pill" required>
                                            <option value="" disabled selected>Chọn công dân</option>
                                            @foreach ($citizens as $citizen)
                                                <option value="{{ $citizen->id }}">{{ $citizen->full_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <!-- Chứng tử -->
                                    <div class="col-md-6">
                                        <label for="death_certification" class="form-label">Chứng tử</label>
                                        <input type="file" id="death_certification" name="death_certification"
                                            class="form-control rounded-pill" required>
                                    </div>
                                </div>

                                <!-- Submit -->
                                <div class="text-center mt-4">
                                    <button type="submit" class="btn btn-primary px-4 py-2 rounded-pill shadow-sm" style="color:white;">
                                        <i class="fas fa-paper-plane me-2"></i> Tạo mới
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
