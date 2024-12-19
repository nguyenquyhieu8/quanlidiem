@extends('admin.block.layout')

@section('style')
    <style>
        .alert {
            color: red;
        }
    </style>
@endsection

@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Thêm người dùng</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{{ route('quantri.admin') }}">Trang chủ</a>
                </li>
                <li class="active">
                    <strong>Thêm người dùng</strong>
                </li>
            </ol>
        </div>
    </div>
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-content">
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
@endsection
