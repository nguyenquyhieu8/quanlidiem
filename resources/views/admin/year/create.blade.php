@extends('admin.block.layout')

@section('style')
    <style>
        .alert {
            color: red;
        }
    </style>
@endsection

@section('content')
    <div class="container mt-5"  style="background-color: white;padding:50px">
        <h2>tạo năm họck</h2>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('quantri.years.store') }}" method="POST">
            @csrf

            {{-- Block Name --}}
            <div class="form-group">
                <label for="name">Năm học</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                    value="{{ old('name') }}" required>
                @error('name')
                    <div class="alert">{{ $message }}</div>
                @enderror
            </div>

            {{-- Description --}}
            <div class="form-group mt-3">
                <label for="start_year">Năm bắt đầu</label>
                <textarea class="form-control @error('start_year') is-invalid @enderror" id="start_year" name="start_year"
                    rows="4">{{ old('start_year') }}</textarea>
                @error('start_year')
                    <div class="alert">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group mt-3">
                <label for="end_year">end_year</label>
                <textarea class="form-control @error('end_year') is-invalid @enderror" id="end_year" name="end_year" rows="4">{{ old('end_year') }}</textarea>
                @error('end_year')
                    <div class="alert">{{ $message }}</div>
                @enderror
            </div>

            {{-- Submit Button --}}
            <button type="submit" class="btn btn-primary mt-3">Create Block</button>
        </form>
    </div>
@endsection
