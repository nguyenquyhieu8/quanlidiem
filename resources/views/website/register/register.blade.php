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
        <form action="/submit" method="POST">
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
                    <!-- Step 1 Content -->
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
                        <div class="d-flex justify-content-end">
                            <button type="button" class="btn btn-info next">Continue <i
                                    class="fas fa-angle-right"></i></button>
                        </div>
                    </div>

                    <!-- Step 2 Content -->
                    <div class="tab-pane fade" id="step2" role="tabpanel" aria-labelledby="step2-tab">
                        <h3>Step 2: Academic Information</h3>
                        <div class="form-group">
                            <label for="school_code">School Code</label>
                            <input type="text" id="school_code" name="school_code" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="major_code">Major Code</label>
                            <input type="text" id="major_code" name="major_code" class="form-control">
                        </div>
                        <div class="d-flex justify-content-between">
                            <button type="button" class="btn btn-secondary previous"><i class="fas fa-angle-left"></i>
                                Back</button>
                            <button type="button" class="btn btn-info next">Continue <i
                                    class="fas fa-angle-right"></i></button>
                        </div>
                    </div>

                    <!-- Step 3 Content -->
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
