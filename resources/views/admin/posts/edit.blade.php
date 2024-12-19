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
            <h2>Chỉnh sửa người dùng</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{{ route('quantri.admin') }}">Trang chủ</a>
                </li>
                <li class="active">
                    <strong>Chỉnh sửa người dùng</strong>
                </li>
            </ol>
        </div>
    </div>
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-content">
                        <form method="post" action="{{ route('quantri.posts.update', $post->id) }}" class="form-horizontal"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT') <!-- Sử dụng method PUT để cập nhật -->

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Tiêu đề bài viết</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control @error('title') is-invalid @enderror"
                                        name="title" value="{{ old('title', $post->title) }}">
                                    @error('title')
                                        <p class="alert">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Nội dung</label>
                                <div class="col-sm-10">
                                    <textarea id="content" class="form-control @error('content') is-invalid @enderror" name="content" rows="6">{{ old('content', $post->content ?? '') }}</textarea>
                                    @error('content')
                                        <p class="alert">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="hr-line-dashed"></div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Danh mục</label>
                                <div class="col-sm-10">
                                    <select class="form-control @error('category_id') is-invalid @enderror"
                                        name="category_id">
                                        <option value="">Chọn danh mục</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}"
                                                {{ old('category_id', $post->category_id) == $category->id ? 'selected' : '' }}>
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                        <p class="alert">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Hình ảnh</label>
                                <div class="col-sm-10">
                                    @if ($post->image)
                                        <p>Ảnh hiện tại:</p>
                                        <img src="{{ asset('storage/' . $post->image) }}" alt="Ảnh bài viết"
                                            style="width: 100px; height: auto;">
                                    @endif
                                    <input type="file" class="form-control @error('image') is-invalid @enderror"
                                        name="image">
                                    @error('image')
                                        <p class="alert">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Trạng thái</label>
                                <div class="col-sm-10">
                                    <select class="form-control @error('is_published') is-invalid @enderror"
                                        name="is_published">
                                        <option value="1"
                                            {{ old('is_published', $post->is_published) == 1 ? 'selected' : '' }}>Xuất bản
                                        </option>
                                        <option value="0"
                                            {{ old('is_published', $post->is_published) == 0 ? 'selected' : '' }}>Nháp
                                        </option>
                                    </select>
                                    @error('is_published')
                                        <p class="alert">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>

                            <div class="form-group">
                                <div class="col-sm-4 col-sm-offset-2">
                                    <button class="btn btn-primary" type="submit">Cập nhật bài viết</button>
                                    <a class="btn btn-light" href="{{ route('quantri.posts.index') }}">Quay lại</a>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
