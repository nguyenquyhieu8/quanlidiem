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
        <h2>Edit Block</h2>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('quantri.years.update', $SchoolYear->id) }}" method="POST">
            @csrf
            @method('PUT')

            {{-- Block Name --}}
            <div class="form-group">
                <label for="name">name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                    value="{{ old('name', $SchoolYear->name) }}" required>
                @error('name')
                    <div class="alert">{{ $message }}</div>
                @enderror
            </div>

            {{-- Description --}}
            <div class="form-group mt-3">
                <label for="start_year">start year</label>
                <textarea class="form-control @error('start_year') is-invalid @enderror" id="start_year" name="start_year"
                    rows="4">{{ old('start_year', $SchoolYear->start_year) }}</textarea>
                @error('start_year')
                    <div class="alert">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group mt-3">
                <label for="end year">end_year</label>
                <textarea class="form-control @error('end_year') is-invalid @enderror" id="end_year" name="end_year" rows="4">{{ old('end_year', $SchoolYear->end_year) }}</textarea>
                @error('end_year')
                    <div class="alert">{{ $message }}</div>
                @enderror
            </div>

            {{-- Submit Button --}}
            <button type="submit" class="btn btn-primary mt-3">Update Block</button>
        </form>
    </div>
@endsection
