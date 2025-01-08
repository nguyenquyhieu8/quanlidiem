@extends('admin.block.layout')
@section('style')
    <style>
        .button {
            border: none;
        }

        .action {
            display: flex;
            gap: 10px;
        }
    </style>
@endsection
@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Quản lý thông báo </h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{{ route('quantri.admin') }}">Trang chủ</a>
                </li>
                <li class="active">
                    <strong>Quản lí thông báo</strong>
                </li>
            </ol>
        </div>
        <div class="col-lg-2">

        </div>
    </div>
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-content mb-2">
                        <a href="{{ route('noti.create') }}">
                            <button type="button" class="btn btn-primary mb-3">Thêm thông báo</button>
                        </a>

                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Tiêu đề</th>
                                        <th>Nội dung</th>
                                        <th>Ngày phát hành</th>
                                        <th>Ngày hết hạn</th>
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
                                                @if ($notification->image)
                                                    <img src="{{ asset('storage') }}/{{ $notification->image }}"
                                                        alt="Hình ảnh" width="50">
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
                                                <form action="{{ route('noti.destroy', $notification->id) }}"
                                                    method="POST" style="display:inline;">
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
                </div>
            </div>
        </div>
    </div>
@endsection
