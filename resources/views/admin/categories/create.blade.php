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
            <h2>Thêm danh mục</h2>             
            <ol class="breadcrumb">                 
                <li>                     
                    <a href="{{ route('quantri.admin') }}">Trang chủ</a>                 
                </li>                 
                <li class="active">                     
                    <strong>Thêm danh mục</strong>                 
                </li>             
            </ol>         
        </div>     
    </div>     
    <div class="wrapper wrapper-content animated fadeInRight">         
        <div class="row">             
            <div class="col-lg-12">                 
                <div class="ibox float-e-margins">                     
                    <div class="ibox-content">                         
                        <form method="post" action="{{ route('quantri.categories.store') }}" class="form-horizontal">                             
                            @csrf
                             
                            <div class="form-group">                                 
                                <label class="col-sm-2 control-label">Tên danh mục</label>                                 
                                <div class="col-sm-10">                                     
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}">                                     
                                    @error('name')                                         
                                        <p class="alert">{{ $message }}</p>                                     
                                    @enderror                                 
                                </div>                             
                            </div>                             
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">                                 
                                <div class="col-sm-4 col-sm-offset-2">                                     
                                    <button class="btn btn-primary" type="submit">Lưu lại</button>                                     
                                    <a class="btn btn-light" href="{{ route('quantri.user.index') }}">Quay lại</a>                                 
                                </div>                             
                            </div>                         
                        </form>                     
                    </div>                 
                </div>             
            </div>         
        </div>     
    </div> 
@endsection
