@extends('admin.block.layout')

@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Data Tables</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{{ route('quantri.admin') }}">Trang chủ</a>
                </li>
                <li class="active">
                    <strong>Tạo Ngày điểm rèn luyện</strong>
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
                    <div class="ibox-content">
                        <form method="post" action="{{ route('quantri.create.review') }}" class="form-horizontal">
                            @csrf
                            <div class="form-group"><label class="col-sm-2 control-label">Khoa</label>

                                <div class="col-sm-10">
                                    <select class="form-control m-b" name="factory">
                                        @foreach ($factory as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group"><label class="col-sm-2 control-label">Kì học</label>
                                <div class="col-sm-10">
                                    <select class="form-control m-b" name="instiutes_id">
                                        @foreach ($years as $item)
                                            <option value="{{ $item->id }}">{{ $item->years }}_{{ $item->semesters }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Ngày bắt đầu</label>
                                <div class="col-sm-10">
                                    <input type="date" class="form-control @error('date_start') is-invalid @enderror"
                                        name="date_start">
                                    @error('date_start')
                                        <p class="alert ">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Ngày kết thúc</label>
                                <div class="col-sm-10">
                                    <input type="date" class="form-control @error('date_end') is-invalid @enderror"
                                        name="date_end">
                                    @error('date_end')
                                        <p class="alert ">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <div class="col-sm-4 col-sm-offset-2">
                                    <button class="btn btn-primary" type="submit">Lưu lại</button>
                                    <a class="btn btn-light" href="{{ route('quantri.institutes.index') }}">Quay lại</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
