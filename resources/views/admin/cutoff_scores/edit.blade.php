@extends('admin.block.layout')

@section('content')
    <div class="container"  style="background-color: white;padding:50px">
        <h2>Cập nhật Điểm chuẩn - {{ $schoolYear->name }}</h2>

        <form action="{{ route('quantri.cutoff_scores.updateByYear', $schoolYear->id) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Bảng nhập điểm chuẩn cho các ngành và khối -->
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
                                    @php
                                        // Tạo khóa cho mảng liên kết để lấy điểm chuẩn
                                        $key = $major->id . '-' . $block->id;
                                        $score = $cutoffScores[$key]->score ?? null;
                                    @endphp
                                    <td>
                                        <input type="number" name="scores[{{ $major->id }}][{{ $block->id }}]"
                                            class="form-control" step="0.01" min="0" max="30"
                                            value="{{ $score }}">
                                    </td>
                                @endforeach
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <button type="submit" class="btn btn-primary">Cập nhật</button>
        </form>
    </div>
@endsection
