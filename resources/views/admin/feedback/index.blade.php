@extends('admin.block.layout')

@section('style')
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table th,
        table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        table th {
            background-color: #007bff;
            color: white;
        }

        .container {
            margin-top: 20px;
        }
    </style>
@endsection

@section('content')
    <div class="container">
        <h2 class="text-center">Danh sách phản hồi</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Mã số SV</th>
                    <th>Họ tên SV</th>
                    <th>Ngành</th>
                    <th>Điểm</th>
                    <th>Nội dung liên hệ</th>
                    <th>Tệp đính kèm</th>
                    <th>Ngày gửi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($contacts as $contact)
                    <tr>
                        <td>{{ $contact->id }}</td>
                        <td>{{ $contact->applicant->code }}</td>
                        <td>{{ $contact->applicant->name }}</td>
                        <td>{{ $contact->applicant->major->name }}</td>
                        <td>{{ $contact->applicant->score }}</td>
                        <td>{{ $contact->message }}</td>
                        <td>
                            @if ($contact->file_path)
                                <a href="{{ asset('storage/' . $contact->file_path) }}" target="_blank">Xem tệp</a>
                            @else
                                Không có tệp
                            @endif
                        </td>
                        <td>{{ $contact->created_at->format('d/m/Y H:i') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
