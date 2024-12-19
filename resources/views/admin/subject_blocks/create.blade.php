@extends('admin.block.layout')

@section('style')
    <style>
        .alert {
            color: red;
        }
    </style>
@endsection

@section('content')
    <div class="container mt-5 " style="background-color: white;padding:40px">
        <h2>Tạo mới</h2>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('quantri.subject_blocks.store') }}" method="POST">
            @csrf

            {{-- Block Name --}}
            <div class="form-group">
                <label for="block_name">Tên khối</label>
                <input type="text" class="form-control @error('block_name') is-invalid @enderror" id="block_name"
                    name="block_name" value="{{ old('block_name') }}" required>
                @error('block_name')
                    <div class="alert">{{ $message }}</div>
                @enderror
            </div>

            {{-- Description --}}
            <div class="form-group mt-3">
                <label for="description">mô tả</label>
                <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description"
                    rows="4">{{ old('description') }}</textarea>
                @error('description')
                    <div class="alert">{{ $message }}</div>
                @enderror
            </div>

            {{-- Submit Button --}}
            <button type="submit" class="btn btn-primary mt-3">Create Block</button>
        </form>
    </div>
@endsection
