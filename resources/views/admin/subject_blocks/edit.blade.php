@extends('admin.block.layout')

@section('style')
    <style>
        .alert {
            color: red;
        }
    </style>
@endsection

@section('content')
    <div class="container mt-5">
        <h2>Edit Block</h2>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('quantri.subject_blocks.update', $subject_blocks_id->id) }}" method="POST">
            @csrf
            @method('PUT')

            {{-- Block Name --}}
            <div class="form-group">
                <label for="block_name">Block Name</label>
                <input type="text" class="form-control @error('block_name') is-invalid @enderror" id="block_name"
                    name="block_name" value="{{ old('block_name', $subject_blocks_id->block_name) }}" required>
                @error('block_name')
                    <div class="alert">{{ $message }}</div>
                @enderror
            </div>

            {{-- Description --}}
            <div class="form-group mt-3">
                <label for="description">Description</label>
                <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description"
                    rows="4">{{ old('description', $subject_blocks_id->description) }}</textarea>
                @error('description')
                    <div class="alert">{{ $message }}</div>
                @enderror
            </div>

            {{-- Submit Button --}}
            <button type="submit" class="btn btn-primary mt-3">Update Block</button>
        </form>
    </div>
@endsection
