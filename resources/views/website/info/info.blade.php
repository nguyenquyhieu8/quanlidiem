@extends('website.components.layout')
@section('title')
    Chào mừng bạn đến với
@endsection

@section('content')
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="row g-4">
                <!-- Tab Dọc -->
                <div class="col-lg-3">
                    <div class="list-group">
                        <!-- Tab Item -->
                        <a href="#tab1"
                            class="list-group-item list-group-item-action active py-3 px-4 mb-2 shadow-sm rounded"
                            data-bs-toggle="list" role="tab">
                            <i class="bi bi-house-door-fill me-2"></i>Thông tin tài khoản
                        </a>
                        <a href="#tab2" class="list-group-item list-group-item-action py-3 px-4 mb-2 shadow-sm rounded"
                            data-bs-toggle="list" role="tab">
                            <i class="bi bi-gear-fill me-2"></i>Thông tin người thân
                        </a>
                        <a href="#tab3" class="list-group-item list-group-item-action py-3 px-4 mb-2 shadow-sm rounded"
                            data-bs-toggle="list" role="tab">
                            <i class="bi bi-info-circle-fill me-2"></i>Đổi mật khẩu
                        </a>
                        <a href="#tab4" class="list-group-item list-group-item-action py-3 px-4 mb-2 shadow-sm rounded"
                            data-bs-toggle="list" role="tab">
                            <i class="bi bi-bell-fill me-2"></i>Thông báo
                        </a>
                    </div>
                </div>

                <!-- Nội dung của tab -->
                <div class="col-lg-9">
                    <div class="tab-content">
                        <!-- Tab 1 - Thông tin tài khoản -->
                        <div class="tab-pane fade show active" id="tab1" role="tabpanel">
                            <form action="{{ route('profile.update', $user->id) }}" method="POST">
                                @csrf

                                <div class="mb-3">
                                    <label for="name" class="form-label">Tên</label>
                                    <input type="text" id="name" name="name" class="form-control"
                                        value="{{ old('name', $user->name) }}" required>
                                </div>

                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" id="email" name="email" class="form-control"
                                        value="{{ old('email', $user->email) }}" required>
                                </div>

                                <div class="mb-3">
                                    <label for="password" class="form-label">Mật khẩu</label>
                                    <input type="password" id="password" name="password" class="form-control"
                                        placeholder="Để trống nếu không muốn đổi mật khẩu">
                                </div>

                                <div class="mb-3">
                                    <label for="address" class="form-label">Địa chỉ</label>
                                    <input type="text" id="address" name="address" class="form-control"
                                        value="{{ old('address', $user->address) }}" required>
                                </div>

                                <div class="mb-3">
                                    <label for="phone" class="form-label">Số điện thoại</label>
                                    <input type="text" id="phone" name="phone" class="form-control"
                                        value="{{ old('phone', $user->phone) }}" required>
                                </div>

                                <div class="mb-3">
                                    <label for="head_code" class="form-label">Mã vùng</label>
                                    <input type="text" id="head_code" name="head_code" class="form-control"
                                        value="{{ old('head_code', $user->head_code) }}" required>
                                </div>

                                <div class="mb-3">
                                    <label for="members_count" class="form-label">Số thành viên</label>
                                    <input type="text" id="members_count" name="members_count" class="form-control"
                                        value="{{ old('members_count', $user->members_count) }}" required>
                                </div>

                                <button type="submit" class="btn btn-primary">Cập nhật</button>
                            </form>
                        </div>

                        <!-- Tab 2 - Thông tin người thân -->
                        <div class="tab-pane fade" id="tab2" role="tabpanel">
                            <h4 class="mb-3">Thông tin người thân</h4>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Tên người thân</th>
                                        <th>Email</th>
                                        <th>CCCD</th>
                                        <th>Địa chỉ</th>
                                        <th>Giới tính</th>
                                        <th>Ngày đăng ký</th>
                                        <th>Điện thoại</th>
                                        <th>Nơi cư trú</th>
                                        <th>Quốc tịch</th>
                                        <th>Dân tộc</th>
                                        <th>Nghề nghiệp</th>
                                        <th>Ghi chú</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($citizens as $citizen)
                                        <tr>
                                            <td>{{ $citizen->full_name }}</td>
                                            <td>{{ $citizen->email }}</td>
                                            <td>{{ $citizen->cccd }}</td>
                                            <td>{{ $citizen->address }}</td>
                                            <td>{{ $citizen->gender == 'A' ? 'Nam' : 'Nữ' }}</td>
                                            <td>{{ $citizen->created_at->format('d/m/Y') }}</td>
                                            <td>{{ $citizen->phone }}</td>
                                            <td>{{ $citizen->residence }}</td>
                                            <td>{{ $citizen->nationality }}</td>
                                            <td>{{ $citizen->ethnicity }}</td>
                                            <td>{{ $citizen->occupation }}</td>
                                            <td>{{ $citizen->notes }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>



                        <!-- Tab 3 - Đổi mật khẩu -->
                        <div class="tab-pane fade" id="tab3" role="tabpanel">
                            <h4 class="mb-3">Đổi mật khẩu</h4>
                            <form method="POST" action="{{ route('profile.change-password') }}">
                                @csrf
                                <div class="mb-3">
                                    <label for="current_password" class="form-label">Mật khẩu cũ</label>
                                    <input type="password" id="current_password" name="current_password"
                                        class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label for="new_password" class="form-label">Mật khẩu mới</label>
                                    <input type="password" id="new_password" name="new_password" class="form-control"
                                        required>
                                </div>
                                <div class="mb-3">
                                    <label for="new_password_confirmation" class="form-label">Xác nhận mật khẩu
                                        mới</label>
                                    <input type="password" id="new_password_confirmation"
                                        name="new_password_confirmation" class="form-control" required>
                                </div>
                                <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
                            </form>
                        </div>

                        <!-- Tab 4 - Thông báo -->
                        <div class="tab-pane fade" id="tab4" role="tabpanel">
                            <h4 class="mb-3">Thông báo</h4>
                            @forelse($notifications as $notification)
                                <div class="mb-4">
                                    <h5>{{ $notification->title }}</h5>
                                    <p>{{ $notification->content }}</p>
                                    <p><small><strong>Ngày phát hành:</strong>
                                            {{ $notification->publish_date }}</small></p>
                                    @if ($notification->image)
                                        <img src="data:image/jpeg;base64,{{ base64_encode($notification->image) }}"
                                            class="img-fluid" alt="Notification Image">
                                    @endif
                                    @if ($notification->video)
                                        <video controls class="w-100">
                                            <source src="data:video/mp4;base64,{{ base64_encode($notification->video) }}"
                                                type="video/mp4">
                                            Your browser does not support the video tag.
                                        </video>
                                    @endif
                                    <hr>
                                </div>
                            @empty
                                <p>Không có thông báo nào.</p>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection



<!-- Thêm một số phần CSS để làm đẹp -->
@push('styles')
    <style>
        .list-group-item-action {
            transition: all 0.3s ease;
        }

        .list-group-item-action:hover {
            background-color: #f0f0f0;
            border-color: #ddd;
        }

        .list-group-item-action.active {
            background-color: #007bff;
            color: white;
            font-weight: bold;
        }

        .list-group-item-action i {
            font-size: 1.2rem;
        }

        .tab-content {
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .tab-content h4 {
            color: #333;
        }
    </style>
@endpush
