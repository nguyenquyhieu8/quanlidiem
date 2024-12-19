@extends('admin.block.layout')

@section('style')
    <style>
        .container {
            max-width: 600px;
            margin-top: 30px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #0056b3;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }
    </style>
@endsection

@section('content')
    <div class="container">
        <h2 class="text-center text-uppercase">Gửi phản hồi</h2>
        <form action="{{ route('contact.send', ['code' => $applicant->code]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Họ và tên</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $applicant->name }}"
                    readonly>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ $applicant->email }}"
                    readonly>
            </div>
            <div class="form-group">
                <label for="message">Nội dung liên hệ</label>
                <textarea class="form-control" id="message" name="message" rows="4" placeholder="Nhập nội dung liên hệ"
                    required></textarea>
            </div>
            <div class="form-group">
                <label for="file">Tải tệp đính kèm</label>
                <input type="file" class="form-control" id="file" name="file"
                    accept=".jpg,.jpeg,.png,.pdf,.doc,.docx">
            </div>
            <button type="submit" class="btn btn-primary">Gửi liên hệ</button>
        </form>

    </div>
@endsection
