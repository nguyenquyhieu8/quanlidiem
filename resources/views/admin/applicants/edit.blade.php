@extends('admin.block.layout')

@section('content')
    <div class="container"  style="background-color: white;padding:50px">
        <h2>Cập nhật Thông Tin Thí Sinh</h2>

        <form action="{{ route('quantri.applicants.update', $applicant->id) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Tên Thí Sinh -->
            <div class="form-group">
                <label for="name">Tên Thí Sinh</label>
                <input type="text" name="name" id="name" class="form-control"
                    value="{{ old('name', $applicant->name) }}" required>
                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Ngày Sinh -->
            <div class="form-group">
                <label for="dob">Ngày Sinh</label>
                <input type="date" name="dob" id="dob" class="form-control"
                    value="{{ old('dob', $applicant->dob) }}" required>
                @error('dob')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Email -->
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control"
                    value="{{ old('email', $applicant->email) }}" required>
                @error('email')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Điện Thoại -->
            <div class="form-group">
                <label for="phone">Điện Thoại</label>
                <input type="text" name="phone" id="phone" class="form-control"
                    value="{{ old('phone', $applicant->phone) }}" required>
                @error('phone')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Năm Học -->
            <div class="form-group">
                <label for="school_year_id">Năm Học</label>
                <select name="school_year_id" id="school_year_id" class="form-control" required>
                    <option value="">Chọn Năm Học</option>
                    @foreach ($schoolYears as $year)
                        <option value="{{ $year->id }}"
                            {{ old('school_year_id', $applicant->school_year_id) == $year->id ? 'selected' : '' }}>
                            {{ $year->name }}
                        </option>
                    @endforeach
                </select>
                @error('school_year_id')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="province_id">Khu vực</label>
                <select name="province_id" id="province_id" class="form-control" required>
                    <option value="">Chọn Khu Vực</option>
                    @foreach ($province as $province_id)
                        <option value="{{ $province_id->code }}"
                            {{ $applicant->province_id == $province_id->code ? 'selected' : '' }}>
                            {{ $province_id->full_name }}
                        </option>
                    @endforeach
                </select>
                @error('province_id')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <!-- Ngành Học -->
            <div class="form-group">
                <label for="major_id">Ngành Học</label>
                <select name="major_id" id="major_id" class="form-control" required>
                    <option value="">Chọn Ngành</option>
                    @foreach ($majors as $major)
                        <option value="{{ $major->id }}"
                            {{ old('major_id', $applicant->major_id) == $major->id ? 'selected' : '' }}>
                            {{ $major->major_name }}
                        </option>
                    @endforeach
                </select>
                @error('major_id')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Khối Thi -->
            <div class="form-group">
                <label for="subject_block_id">Khối Thi</label>
                <select name="subject_block_id" id="subject_block_id" class="form-control" required>
                    <option value="">Chọn Khối Thi</option>
                    @foreach ($subjectBlocks as $block)
                        <option value="{{ $block->id }}"
                            {{ old('subject_block_id', $applicant->subject_block_id) == $block->id ? 'selected' : '' }}>
                            {{ $block->block_name }}
                        </option>
                    @endforeach
                </select>
                @error('subject_block_id')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Điểm -->
            <div class="form-group">
                <label for="score">Điểm</label>
                <input type="number" name="score" id="score" class="form-control" step="0.01" min="0"
                    max="30" value="{{ old('score', $applicant->score) }}" required>
                @error('score')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Nút Submit -->
            <button type="submit" class="btn btn-primary">Cập nhật Thí Sinh</button>
        </form>
    </div>
@endsection
