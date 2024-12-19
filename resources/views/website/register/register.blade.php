@extends('website.components.layout');
@section('title')
    Chào mừng bạn đến với dăng kí tuyển sinh đại học
@endsection
@section('style')
    <style>
        .wizard,
        .wizard .nav-tabs,
        .wizard .nav-tabs .nav-item {
            position: relative;
        }

        .wizard .nav-tabs:after {
            content: "";
            width: 80%;
            border-bottom: solid 2px #ccc;
            position: absolute;
            margin-left: auto;
            margin-right: auto;
            top: 38%;
            z-index: -1;
        }

        .wizard .nav-tabs .nav-item .nav-link {
            width: 70px;
            height: 70px;
            margin-bottom: 6%;
            background: white;
            border: 2px solid #ccc;
            color: #ccc;
            z-index: 10;
        }

        .wizard .nav-tabs .nav-item .nav-link:hover {
            color: #333;
            border: 2px solid #333;
        }

        .wizard .nav-tabs .nav-item .nav-link.active {
            background: #fff;
            border: 2px solid #0dcaf0;
            color: #0dcaf0;
        }

        .wizard .nav-tabs .nav-item .nav-link:after {
            content: " ";
            position: absolute;
            left: 50%;
            transform: translate(-50%);
            opacity: 0;
            margin: 0 auto;
            bottom: 0px;
            border: 5px solid transparent;
            border-bottom-color: #0dcaf0;
            transition: 0.1s ease-in-out;
        }

        .nav-tabs .nav-item .nav-link.active:after {
            content: " ";
            position: absolute;
            left: 50%;
            transform: translate(-50%);
            opacity: 1;
            margin: 0 auto;
            bottom: 0px;
            border: 10px solid transparent;
            border-bottom-color: #0dcaf0;
        }

        .wizard .nav-tabs .nav-item .nav-link svg {
            font-size: 25px;
        }

        /* General Wizard Style */
        .wizard {
            background-color: #f9f9f9;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .nav-tabs {
            border-bottom: none;
            margin-bottom: 30px;
            height: 80px;
        }

        .nav-tabs .nav-item {
            position: relative;
            width: 50px;
            height: 50px;
        }

        .nav-tabs .nav-link {
            width: 50px;
            height: 50px;
            border: 2px solid #00bcd4;
            border-radius: 50%;
            background-color: #fff;
            color: #00bcd4;
            font-size: 18px;
            font-weight: bold;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: 0.3s ease;
        }

        .nav-tabs .nav-link.active {
            background-color: #00bcd4;
            color: #fff;
            border-color: #00bcd4;
            box-shadow: 0 0 10px rgba(0, 188, 212, 0.5);
        }

        .nav-tabs .nav-link:hover {
            background-color: #00bcd4;
            color: #fff;
        }

        .tab-pane {
            margin-top: 20px;
        }

        h3 {
            color: #333;
            font-weight: bold;
            margin-bottom: 20px;
            font-size: 1.5rem;
        }

        .form-group label {
            font-size: 14px;
            font-weight: bold;
            color: #555;
            margin-bottom: 5px;
        }

        .form-control {
            border-radius: 5px;
            border: 1px solid #ddd;
            padding: 10px;
            font-size: 14px;
        }

        .form-control:focus {
            border-color: #00bcd4;
            box-shadow: 0 0 5px rgba(0, 188, 212, 0.5);
        }

        .btn {
            border-radius: 5px;
            font-size: 14px;
            padding: 10px 20px;
            font-weight: bold;
            transition: 0.3s ease;
        }

        .btn-info {
            background-color: #00bcd4;
            border-color: #00bcd4;
            color: #fff;
        }

        .btn-info:hover {
            background-color: #019cad;
            border-color: #019cad;
        }

        .btn-secondary {
            background-color: #ddd;
            border-color: #ccc;
            color: #555;
        }

        .btn-secondary:hover {
            background-color: #bbb;
            border-color: #aaa;
        }

        .next i,
        .previous i {
            margin-left: 5px;
            margin-right: 5px;
        }

        .d-flex {
            margin-top: 20px;
        }
    </style>
@endsection
@section('content')
    <div class="container">
        <div class="text-center mb-5">
            <h3 class="fw-bold mt-3 mb-3 text-primary">Đăng Ký Tuyển Sinh</h3>
            <p class="text-muted">Vui lòng điền đầy đủ và chính xác thông tin cá nhân để hoàn tất đăng ký.
                Thông tin của bạn sẽ được bảo mật theo chính sách bảo mật dữ liệu.</p>
            <p class="text-muted">Hãy đảm bảo cung cấp thông tin liên lạc chính xác để chúng tôi có thể hỗ trợ bạn khi cần
                thiết.</p>
        </div>
        <form action="{{ route('trangchu.registerFormPost') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="wizard my-5">
                <ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">
                    <!-- Step 1 -->
                    <li class="nav-item flex-fill" role="presentation">
                        <a class="nav-link active rounded-circle mx-auto d-flex align-items-center justify-content-center"
                            id="step1-tab" data-bs-toggle="tab" href="#step1" role="tab" aria-controls="step1"
                            aria-selected="true">
                            <i class="fas fa-user"></i>
                        </a>
                    </li>
                    <!-- Step 2 -->
                    <li class="nav-item flex-fill" role="presentation">
                        <a class="nav-link rounded-circle mx-auto d-flex align-items-center justify-content-center"
                            id="step2-tab" data-bs-toggle="tab" href="#step2" role="tab" aria-controls="step2"
                            aria-selected="false">
                            <i class="fas fa-school"></i>
                        </a>
                    </li>
                    <!-- Step 3 -->
                    <li class="nav-item flex-fill" role="presentation">
                        <a class="nav-link rounded-circle mx-auto d-flex align-items-center justify-content-center"
                            id="step3-tab" data-bs-toggle="tab" href="#step3" role="tab" aria-controls="step3"
                            aria-selected="false">
                            <i class="fas fa-check-circle"></i>
                        </a>
                    </li>
                </ul>

                <div class="tab-content" id="myTabContent">
                    <!-- Step 1: Personal Information -->
                    <div class="tab-pane fade show active" id="step1" role="tabpanel" aria-labelledby="step1-tab">
                        <h3>Step 1: Personal Information</h3>
                        <div class="form-group">
                            <label for="full_name">Full Name</label>
                            <input type="text" id="full_name" name="full_name" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="date_of_birth">Date of Birth</label>
                            <input type="date" id="date_of_birth" name="date_of_birth" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="gender">Gender</label>
                            <select id="gender" name="gender" class="form-control" required>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                                <option value="other">Other</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="phone_number">Phone Number</label>
                            <input type="text" id="phone_number" name="phone_number" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" id="address" name="address" class="form-control">
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="button" class="btn btn-info next">Continue <i
                                    class="fas fa-angle-right"></i></button>
                        </div>
                    </div>

                    <!-- Step 2: Academic Information -->
                    <div class="tab-pane fade" id="step2" role="tabpanel" aria-labelledby="step2-tab">
                        <h3>Step 2: Academic Information</h3>
                        <div class="form-group">
                            <label for="school_code">School Code</label>
                            <input type="text" id="school_code" name="school_code" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="major_id">Major</label>
                            <select id="major_id" name="major_id" class="form-control" required>
                                @foreach ($majors as $major)
                                    <option value="{{ $major->id }}">{{ $major->major_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="school_year_id">School Year</label>
                            <select id="school_year_id" name="school_year_id" class="form-control" required>
                                @foreach ($schoolYears as $schoolYear)
                                    <option value="{{ $schoolYear->id }}">{{ $schoolYear->school_year_range }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="subject_block_id">Subject Block</label>
                            <select id="subject_block_id" name="subject_block_id" class="form-control" required>
                                @foreach ($subjectBlocks as $block)
                                    <option value="{{ $block->id }}">{{ $block->block_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="admission_score">Điểm xét tuyển</label>
                            <input type="text" id="admission_score" name="admission_score" class="form-control">
                        </div>
                        <div class="d-flex justify-content-between">
                            <button type="button" class="btn btn-secondary previous"><i class="fas fa-angle-left"></i>
                                Back</button>
                            <button type="button" class="btn btn-info next">Continue <i
                                    class="fas fa-angle-right"></i></button>
                        </div>
                    </div>

                    <!-- Step 3: Confirmation -->
                    <div class="tab-pane fade" id="step3" role="tabpanel" aria-labelledby="step3-tab">
                        <h3>Step 3: Confirmation</h3>
                        <p>Review your details and submit your application.</p>

                        <div class="d-flex justify-content-between">
                            <button type="button" class="btn btn-secondary previous"><i class="fas fa-angle-left"></i>
                                Back</button>
                            <button type="submit" class="btn btn-success">Submit <i
                                    class="fas fa-check-circle"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

    </div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            //Enable Tooltips
            var tooltipTriggerList = [].slice.call(
                document.querySelectorAll('[data-bs-toggle="tooltip"]')
            );
            var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl);
            });

            //Advance Tabs
            $(".next").click(function() {
                const nextTabLinkEl = $(".nav-tabs .active")
                    .closest("li")
                    .next("li")
                    .find("a")[0];
                const nextTab = new bootstrap.Tab(nextTabLinkEl);
                nextTab.show();
            });

            $(".previous").click(function() {
                const prevTabLinkEl = $(".nav-tabs .active")
                    .closest("li")
                    .prev("li")
                    .find("a")[0];
                const prevTab = new bootstrap.Tab(prevTabLinkEl);
                prevTab.show();
            });
        });
    </script>
@endsection
