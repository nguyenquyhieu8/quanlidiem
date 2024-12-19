<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">noti Registrations</h3>
            <ul class="breadcrumbs mb-3">
                <li class="nav-home">
                    <a href="#">
                        <i class="icon-home"></i>
                    </a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li>noti Registrations</li>
            </ul>
        </div>

        <!-- Search Form -->
        <div class="row mb-4">
            <div class="col">
                <form action="{{ route('noti.index') }}" method="GET">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control"
                            placeholder="Tìm kiếm theo lý do, địa điểm, tên người dùng, v.v."
                            value="{{ request('search') }}">
                        <button type="submit" class="btn btn-primary">Tìm kiếm</button>
                        <a href="{{ route('noti.create') }}" class="btn btn-success">Tạo mới</a>
                    </div>
                </form>
            </div>
        </div>

        <!-- Data Table -->
        <div class="card">
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Tiêu đề</th>
                            <th>Nội dung</th>
                            <th>Ngày phát hành</th>
                            <th>Ngày hết hạn</th>
                            <th>Người dùng</th>
                            <th>Hình ảnh</th>
                            <th>Video</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($noti as $notification)
                            <tr>
                                <td>{{ $notification->id }}</td>
                                <td>{{ $notification->title }}</td>
                                <td>{{ $notification->content }}</td>
                                <td>{{ $notification->publish_date }}</td>
                                <td>{{ $notification->expiry_date }}</td>
                                <td>
                                    @if ($notification->type == 0)
                                        <span class="badge bg-secondary">Chỉ hiển thị cho người dùng</span>
                                    @elseif ($notification->type == 1)
                                        <span class="badge bg-success">Hiển thị công khai</span>
                                    @endif
                                </td>
                                <td>{{ $notification->user ? $notification->user->name : 'Không có' }}</td>
                                <td>
                                    @if ($notification->image)
                                        <img src="{{ asset('storage') }}/{{ $notification->image }}" alt="Hình ảnh"
                                            width="50">
                                    @else
                                        Không có
                                    @endif
                                </td>
                                <td>
                                    @if ($notification->video)
                                        <a href="{{ asset('storage') }}/{{ $notification->video }}"
                                            target="_blank">Xem Video</a>
                                    @else
                                        Không có
                                    @endif
                                </td>
                                <td>
                                    <!-- Edit Button -->
                                    <a href="{{ route('noti.edit', $notification->id) }}"
                                        class="btn btn-warning btn-sm">Sửa</a>

                                    <!-- Delete Button -->
                                    <form action="{{ route('noti.destroy', $notification->id) }}" method="POST"
                                        style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Xóa</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Pagination -->
        <div class="mt-4">
            {{ $noti->links() }}
        </div>
    </div>
</div>
@section('scripts')
    <script>
        $(document).ready(function() {
            // Khi nút "Đã phê duyệt" được nhấn
            $('#approve-btn').on('click', function() {
                var registrationId = $(this).data('id');
                var status = $(this).data('status');

                // Gửi yêu cầu AJAX
                $.ajax({
                    url: '/admin/noti/update-status', // Địa chỉ route của bạn
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}', // Thêm CSRF token cho bảo mật
                        registration_id: registrationId,
                        status: status
                    },
                    success: function(response) {
                        // Xử lý thành công, ví dụ thông báo người dùng
                        alert('Cập nhật trạng thái thành công!');
                        // Bạn có thể tự động cập nhật lại dữ liệu hoặc đóng modal tùy theo yêu cầu
                        window.location
                            .reload(); // Reload lại trang hoặc bạn có thể dùng jQuery để cập nhật giao diện
                    },
                    error: function(xhr, status, error) {
                        // Xử lý lỗi
                        alert('Đã có lỗi xảy ra, vui lòng thử lại!');
                    }
                });
            });

            // Khi nút "Bị từ chối" được nhấn
            $('#reject-btn').on('click', function() {
                var registrationId = $(this).data('id');
                var status = $(this).data('status');

                // Gửi yêu cầu AJAX
                $.ajax({
                    url: '/admin/noti/update-status',
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        registration_id: registrationId,
                        status: status
                    },
                    success: function(response) {
                        // Xử lý thành công

                        window.location
                            .reload();
                        $.notify({
                            message: "Cập nhật trạng thái thành công!"
                        }, {
                            type: 'success',
                            allow_dismiss: true,
                            delay: 5000,
                            placement: {
                                from: "top",
                                align: "right"
                            }
                        });
                    },
                    error: function(xhr, status, error) {
                        // Xử lý lỗi
                        alert('Đã có lỗi xảy ra, vui lòng thử lại!');
                    }
                });
            });
        });
    </script>
@endsection
