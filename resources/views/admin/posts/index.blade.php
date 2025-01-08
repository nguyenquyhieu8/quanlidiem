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
            <h2>Quản Lí Bài Viết</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{{ route('quantri.admin') }}">Trang chủ</a>
                </li>
                <li class="active">
                    <strong>Quản lí bài viết</strong>
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
                        <a href="{{ route('quantri.posts.create') }}">
                            <button type="button" class="btn btn-primary mb-3">Thêm bài viết</button>
                        </a>

                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover dataTables-example">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Tiêu đề bài viết</th>
                                        <th>Danh mục</th>
                                        <th>Ảnh</th>
                                        <th>Trạng thái</th>
                                        <th>Ngày tạo</th>
                                        <th>Chức năng</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($posts->count() > 0)
                                        @foreach ($posts as $key => $item)
                                            <tr class="gradeX">
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $item->title }}</td>
                                                <td>{{ $item->category->name ?? 'Không có danh mục' }}</td>
                                                <td>
                                                    @if ($item->image)
                                                        <img src="{{ asset('storage/' . $item->image) }}" alt="Ảnh bài viết"
                                                            style="width: 300px; height: 100px;">
                                                    @else
                                                        Không có ảnh
                                                    @endif
                                                </td>
                                                <td>
                                                    {{ $item->is_published ? 'Đã xuất bản' : 'Chưa xuất bản' }}
                                                </td>
                                                <td>{{ $item->created_at->format('d/m/Y') }}</td>
                                                <td>
                                                    <div class="d-flex align-items-center list-action action">
                                                        <a class="badge badge-info mr-2" data-toggle="tooltip"
                                                            data-placement="top" title="Sửa"
                                                            href="{{ route('quantri.posts.edit', $item->id) }}">
                                                            <i class="fa fa-pencil" aria-hidden="true"></i>
                                                        </a>
                                                        <form action="{{ route('quantri.posts.destroy', $item->id) }}"
                                                            method="post" style="display: inline;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="badge bg-warning mr-2 button"
                                                                data-toggle="tooltip" data-placement="top" title="Xóa"
                                                                onclick="return confirm('Bạn có chắc muốn xóa bài viết này không?')"
                                                                type="submit">
                                                                <i class="fa fa-trash" aria-hidden="true"></i>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="7" class="text-center">Không có bài viết nào</td>
                                        </tr>
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
