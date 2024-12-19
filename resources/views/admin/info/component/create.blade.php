@extends('backend.components.layout')

@section('title')
    Thêm thông báo
@endsection

@section('content')
    <div class="container">
        <div class="page-inner">
            <div class="page-header">
                <h3 class="fw-bold mb-3">Tables</h3>
                <ul class="breadcrumbs mb-3">
                    <li class="nav-home">
                        <a href="#">
                            <i class="icon-home"></i>
                        </a>
                    </li>
                    <li class="separator">
                        <i class="icon-arrow-right"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Tables</a>
                    </li>
                    <li class="separator">
                        <i class="icon-arrow-right"></i>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('noti.index') }}">Đăng kí thông báo</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Thêm Đăng Ký Khai Sinh</div>
                        </div>
                        <div class="card-body">
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

                            <form action="{{ route('noti.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="title" class="form-label">Tiêu đề</label>
                                        <input type="text" id="title" name="title" class="form-control" required>
                                    </div>
                            
                                    <div class="col-md-6 mb-3">
                                        <label for="content" class="form-label">Nội dung</label>
                                        <textarea id="content" name="content" class="form-control" rows="3" required></textarea>
                                    </div>
                            
                                    <div class="col-md-6 mb-3">
                                        <label for="publish_date" class="form-label">Ngày phát hành</label>
                                        <input type="date" id="publish_date" name="publish_date" class="form-control" required>
                                    </div>
                            
                                    <div class="col-md-6 mb-3">
                                        <label for="expiry_date" class="form-label">Ngày hết hạn</label>
                                        <input type="date" id="expiry_date" name="expiry_date" class="form-control" required>
                                    </div>
                            
                                    <div class="col-md-6 mb-3">
                                        <label for="image" class="form-label">Hình ảnh</label>
                                        <input type="file" id="image" name="image" class="form-control" accept="image/*">
                                    </div>
                            
                                    <div class="col-md-6 mb-3">
                                        <label for="video" class="form-label">Video</label>
                                        <input type="file" id="video" name="video" class="form-control" accept="video/*">
                                    </div>
                            
                                    <div class="col-md-6 mb-3">
                                        <label for="user_id" class="form-label">Người dùng</label>
                                        <select id="user_id" name="user_id" class="form-select">
                                            <option value="" selected>Không chọn người dùng</option> <!-- Cập nhật để cho phép không chọn -->
                                            @foreach ($users as $user)
                                                <option value="{{ $user->id }}">{{ $user->name }} ({{ $user->email }})</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            
                                <button type="submit" class="btn btn-primary">Gửi Thông Báo</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
