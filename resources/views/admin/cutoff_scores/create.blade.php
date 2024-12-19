@extends('admin.block.layout')

@section('content')
    <div class="container"  style="background-color: white;padding:50px">
        <h2>Thêm Điểm Chuẩn</h2>
        @if (session('existing_records'))
            <div class="alert alert-warning">
                <p>Các điểm chuẩn sau đã tồn tại và không được thêm:</p>
                <ul>
                    @foreach (session('existing_records') as $record)
                        <li>{{ $record }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('quantri.cutoff_scores.store') }}" method="POST">
            @csrf

            <!-- Chọn năm học -->
            <div class="form-group">
                <label for="school_year_id">Năm học</label>
                <select name="school_year_id" id="school_year_id" class="form-control" required>
                    <option value="">Chọn năm học</option>
                    @foreach ($schoolYears as $year)
                        <option value="{{ $year->id }}" {{ old('school_year_id') == $year->id ? 'selected' : '' }}>
                            {{ $year->name }}
                        </option>
                    @endforeach
                </select>
                @error('school_year_id')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Bảng các ngành và khối thi -->
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Ngành</th>
                            @foreach ($subjectBlocks as $block)
                                <th>{{ $block->block_name }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($majors as $major)
                            <tr>
                                <td>{{ $major->major_name }}</td>
                                @foreach ($subjectBlocks as $block)
                                    <td>
                                        <input type="number" name="scores[{{ $major->id }}][{{ $block->id }}]"
                                            class="form-control" step="0.01" min="0" max="30"
                                            placeholder="Nhập điểm" value="{{ old("scores.{$major->id}.{$block->id}") }}">
                                    </td>
                                @endforeach
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Nút thêm mới -->
            <button type="submit" class="btn btn-primary">Thêm Điểm Chuẩn</button>
        </form>
    </div>
@endsection
