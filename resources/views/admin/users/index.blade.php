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
            <h2>Data Tables</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{{ route('quantri.admin') }}">Trang chủ</a>
                </li>
                <li class="active">
                    <strong>Quản lí người dùng</strong>
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
                        <a href="{{ route('quantri.user.create') }}">
                            <button type="button" class="btn btn-primary mb-3">Thêm nhóm</button>
                        </a>

                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover dataTables-example">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Tên người dùng</th>
                                        <th>Email</th>
                                        <th>Địa chỉ</th>
                                        <th>Chức vụ</th>
                                        <th>Quyền</th>
                                        <th>Tình trạng</th>
                                        <th>Chức năng</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($users->count() > 0)
                                        @foreach ($users as $key => $item)
                                            <tr class="gradeX">
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $item->name }}</td>
                                                <td>{{ $item->email }}</td>
                                                <td>{{ $item->address }}</td>
                                                <td>{{ $item->position }}</td>
                                                <td>{{ $item->role_id }}</td>
                                                <td>{{ $item->is_active }}</td>

                                                <td>
                                                    <div class="d-flex align-items-center list-action action">
                                                        <a class="badge badge-info mr-2" data-toggle="tooltip"
                                                            data-placement="top" title="" data-original-title="View"
                                                            href="{{ route('quantri.user.edit', $item->id) }}"><i
                                                                class="fa fa-pencil" aria-hidden="true"></i></a>
                                                        <a href="">
                                                            <form action="{{ route('quantri.user.destroy', $item->id) }}"
                                                                method="post" style="display: inline;">
                                                                @csrf
                                                                @method('DELETE')
                                                                <!-- Sử dụng method DELETE để Laravel nhận diện yêu cầu xóa -->

                                                                <button class="badge bg-warning mr-2 button"
                                                                    data-toggle="tooltip" data-placement="top"
                                                                    title="Xóa"
                                                                    onclick="return confirm('Bạn có chắc muốn xóa bài viết này không?')"
                                                                    type="submit">
                                                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                                                </button>
                                                            </form>

                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif

                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
