@extends('admin.block.layout')


@section('content')
    <div class="container">
        <h2>Edit Major</h2>
        <form action="{{ route('quantri.majors.update', $major->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="major_name">Major Name</label>
                <input type="text" name="major_name" id="major_name" class="form-control"
                    value="{{ old('major_name', $major->major_name) }}" required>
                @error('major_name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="major_code">Major Code</label>
                <input type="text" name="major_code" id="major_code" class="form-control"
                    value="{{ old('major_code', $major->major_code) }}" required>
                @error('major_code')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="subject_block_id">Subject Block</label>
                <select name="subject_block_id" id="subject_block_id" class="form-control" required>
                    <option value="">Select a Subject Block</option>
                    @foreach ($subjectBlocks as $block)
                        <option value="{{ $block->id }}"
                            {{ old('subject_block_id', $major->subject_block_id) == $block->id ? 'selected' : '' }}>
                            {{ $block->block_name }}
                        </option>
                    @endforeach
                </select>
                @error('subject_block_id')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
