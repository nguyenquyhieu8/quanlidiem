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
            <h2>Quản lí chung</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{{ route('quantri.admin') }}">Trang chủ</a>
                </li>
                <li class="active">
                    <strong>Quản lí ngành học</strong>
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
                        <a href="{{ route('quantri.majors.create') }}">
                            <button type="button" class="btn btn-primary mb-3">Thêm nhóm</button>
                        </a>

                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover dataTables-example">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Tên ngành</th>
                                        <th>Mã ngành</th>
                                        <th>Khối</th>
                                        <th>Chức năng</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($majors->count() > 0)
                                        @foreach ($majors as $key => $item)
                                            <tr class="gradeX">
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $item->major_name }}</td>
                                                <td>{{ $item->major_code }}</td>
                                                @php
                                                    $subject_block = DB::table('subject_blocks')
                                                        ->where('id', $item->subject_block_id)
                                                        ->value('block_name');
                                                @endphp
                                                <td>{{ $subject_block }}</td>
                                                <td>
                                                    <div class="d-flex align-items-center list-action action">
                                                        <a class="badge badge-info mr-2" data-toggle="tooltip"
                                                            data-placement="top" title="" data-original-title="View"
                                                            href="{{ route('quantri.majors.edit', $item->id) }}"><i
                                                                class="fa fa-pencil" aria-hidden="true"></i></a>
                                                        <a href="">
                                                            <form action="{{ route('quantri.majors.destroy', $item->id) }}"
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
