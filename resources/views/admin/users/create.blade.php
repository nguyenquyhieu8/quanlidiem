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
                        <form method="post" action="{{ route('quantri.user.store') }}" class="form-horizontal">                             
                            @csrf
                             
                            <div class="form-group">                                 
                                <label class="col-sm-2 control-label">Tên người dùng</label>                                 
                                <div class="col-sm-10">                                     
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}">                                     
                                    @error('name')                                         
                                        <p class="alert">{{ $message }}</p>                                     
                                    @enderror                                 
                                </div>                             
                            </div>                             
                            <div class="hr-line-dashed"></div>
                            
                            <div class="form-group">                                 
                                <label class="col-sm-2 control-label">Email</label>                                 
                                <div class="col-sm-10">                                     
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}">                                     
                                    @error('email')                                         
                                        <p class="alert">{{ $message }}</p>                                     
                                    @enderror                                 
                                </div>                             
                            </div>                             
                            <div class="hr-line-dashed"></div>
                            
                            <div class="form-group">                                 
                                <label class="col-sm-2 control-label">Mật khẩu</label>                                 
                                <div class="col-sm-10">                                     
                                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password">                                     
                                    @error('password')                                         
                                        <p class="alert">{{ $message }}</p>                                     
                                    @enderror                                 
                                </div>                             
                            </div>                             
                            <div class="hr-line-dashed"></div>
                            
                            <div class="form-group">                                 
                                <label class="col-sm-2 control-label">Địa chỉ</label>                                 
                                <div class="col-sm-10">                                     
                                    <input type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}">                                     
                                    @error('address')                                         
                                        <p class="alert">{{ $message }}</p>                                     
                                    @enderror                                 
                                </div>                             
                            </div>                             
                            <div class="hr-line-dashed"></div>
                            
                            <div class="form-group">                                 
                                <label class="col-sm-2 control-label">Chức vụ</label>                                 
                                <div class="col-sm-10">                                     
                                    <input type="text" class="form-control @error('position') is-invalid @enderror" name="position" value="{{ old('position') }}">                                     
                                    @error('position')                                         
                                        <p class="alert">{{ $message }}</p>                                     
                                    @enderror                                 
                                </div>                             
                            </div>                             
                            <div class="hr-line-dashed"></div>
                            
                            <div class="form-group">                                 
                                <label class="col-sm-2 control-label">Vai trò</label>                                 
                                <div class="col-sm-10">                                     
                                    <select class="form-control @error('role_id') is-invalid @enderror" name="role_id">                                         
                                        <option value="1" {{ old('role_id') == 1 ? 'selected' : '' }}>Admin</option>                                         
                                        <option value="2" {{ old('role_id') == 2 ? 'selected' : '' }}>Nhân viên</option>                                     
                                    </select>                                     
                                    @error('role_id')                                         
                                        <p class="alert">{{ $message }}</p>                                     
                                    @enderror                                 
                                </div>                             
                            </div>                             
                            <div class="hr-line-dashed"></div>
                            
                            <div class="form-group">                                 
                                <label class="col-sm-2 control-label">Kích hoạt</label>                                 
                                <div class="col-sm-10">                                     
                                    <select class="form-control @error('is_active') is-invalid @enderror" name="is_active">                                         
                                        <option value="1" {{ old('is_active') == 1 ? 'selected' : '' }}>Kích hoạt</option>                                         
                                        <option value="0" {{ old('is_active') == 0 ? 'selected' : '' }}>Vô hiệu hóa</option>                                     
                                    </select>                                     
                                    @error('is_active')                                         
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
