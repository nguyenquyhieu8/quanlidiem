@extends('admin.block.layout')

@section('content')
    <div class="container" style="background-color: white;padding:30px">
        <h2>Tạo mới ngành học</h2>
        <form action="{{ route('quantri.majors.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="major_name">Tên ngành học</label>
                <input type="text" name="major_name" id="major_name" class="form-control" value="{{ old('major_name') }}"
                    required>
                @error('major_name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="major_code">Mã ngành học</label>
                <input type="text" name="major_code" id="major_code" class="form-control" value="{{ old('major_code') }}"
                    required>
                @error('major_code')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="subject_block_id">Khối</label>
                <select name="subject_block_id" id="subject_block_id" class="form-control" required>
                    <option value="">Lựa chọn khối</option>
                    @foreach ($subjectBlocks as $block)
                        <option value="{{ $block->id }}" {{ old('subject_block_id') == $block->id ? 'selected' : '' }}>
                            {{ $block->block_name }}
                        </option>
                    @endforeach
                </select>
                @error('subject_block_id')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
@endsection
