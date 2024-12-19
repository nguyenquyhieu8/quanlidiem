@extends('website.components.layout')

@section('content')
    <section class="hero bg-light py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <!-- Header -->
                    <div class="text-center mb-5">
                        <h3 class="fw-bold mb-3 text-primary">Đăng Ký Tạm Vắng</h3>
                        <p class="text-muted">Vui lòng nhập đầy đủ thông tin để đăng ký tạm vắng</p>
                    </div>

                    <!-- Form -->
                    <div class="card shadow-lg border-0 rounded">
                        <div class="card-body p-4">
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

                            <form action="{{ route('website.absence.store') }}" method="POST">
                                @csrf
                                <div class="row g-4">
                                    <!-- Ngày đăng ký -->
                                    <div class="col-md-6">
                                        <label for="registration_date" class="form-label">Ngày đăng ký</label>
                                        <input type="date" id="registration_date" name="registration_date"
                                            class="form-control rounded-pill" required>
                                    </div>

                                    <!-- Điểm đến -->
                                    <div class="col-md-6">
                                        <label for="destination" class="form-label">Điểm đến</label>
                                        <input type="text" id="destination" name="destination"
                                            class="form-control rounded-pill" required>
                                    </div>

                                    <!-- Lý do -->
                                    <div class="col-md-6">
                                        <label for="reason" class="form-label">Lý do</label>
                                        <input type="text" id="reason" name="reason"
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

                                    <!-- Ngày khởi hành -->
                                    <div class="col-md-6">
                                        <label for="departure_date" class="form-label">Ngày khởi hành</label>
                                        <input type="date" id="departure_date" name="departure_date"
                                            class="form-control rounded-pill" required>
                                    </div>

                                    <!-- Ngày trở về -->
                                    <div class="col-md-6">
                                        <label for="return_date" class="form-label">Ngày trở về</label>
                                        <input type="date" id="return_date" name="return_date"
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
        .hero {
            background: linear-gradient(to right, #f8f9fa, #e9ecef);
            border-top: 2px solid #e0e0e0;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: #0d6efd;
            box-shadow: 0 0 0 0.2rem rgba(13, 110, 253, 0.25);
        }

        h3 {
            font-size: 1.75rem;
        }
    </style>
@endsection
