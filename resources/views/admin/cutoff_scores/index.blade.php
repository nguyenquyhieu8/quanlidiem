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
    <div class="row wrapper border-bottom white-bg page-heading"  style="background-color: white;padding:50px">
        <div class="col-lg-10">
            <h2>Quản lí điểm chuẩn - {{ $schoolYear->name }}</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{{ route('quantri.admin') }}">Trang chủ</a>
                </li>
                <li>
                    <a href="{{ route('quantri.cutoff_scores.years') }}">Danh sách Năm học</a>
                </li>
                <li class="active">
                    <strong>{{ $schoolYear->name }}</strong>
                </li>
            </ol>
        </div>
    </div>
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-content mb-2">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover dataTables-example">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Tên ngành</th>
                                        <th>Mã ngành</th>
                                        <th>Khối</th>
                                        <th>Điểm chuẩn</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($cutoffScores as $key => $item)
                                        <tr class="gradeX">
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $item->major->major_name }}</td>
                                            <td>{{ $item->major->major_code }}</td>
                                            <td>{{ $item->subjectBlock->block_name }}</td>
                                            <td>{{ $item->score ?? 'Chưa có điểm chuẩn' }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5" class="text-center">Không có dữ liệu điểm chuẩn cho năm này
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            {{ $cutoffScores->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
