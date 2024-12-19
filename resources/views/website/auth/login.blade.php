<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Foodeiblog Template">
    <meta name="keywords" content="Foodeiblog, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Đăng nhập tài khoản</title>
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,600,700,800,900&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Unna:400,700&display=swap" rel="stylesheet">
    <!-- Css Styles -->
    <link rel="stylesheet" href="{{ asset('website_coppy') }}/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="{{ asset('website_coppy') }}/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="{{ asset('website_coppy') }}/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="{{ asset('website_coppy') }}/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="{{ asset('website_coppy') }}/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="{{ asset('website_coppy') }}/css/style.css" type="text/css">
</head>

<body class="fixed-position">
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>
    <!-- Sign In Section Begin -->
    <div class="signin">
        <div class="signin__warp">
            <div class="signin__content">
                <div class="signin__logo">
                    <a href="#"><img src="{{ asset('img') }}/logo1.png" alt="" width="400"
                            height="200"></a>
                </div>
                <p>Người dùng cần phải đăng nhập vào hệ thống trước khi có thể tiến hành đăng ký tài khoản làm hộ khẩu.
                    Điều này giúp đảm bảo rằng thông tin được cung cấp là chính xác và liên kết với người dùng cụ thể.
                </p>
                <div class="signin__form">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab"
                                aria-selected="false">
                                Đăng ký
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab" aria-selected="false">
                                Đăng nhập
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tabs-1" role="tabpanel">
                            <div class="signin__form__text">
                                <p>Đăng ký tài khoản</p>
                                <form action="{{ route('register') }}" method="POST">
                                    @csrf
                                    <div>
                                        <input type="text" name="name" placeholder="Họ và tên*" required>
                                        @error('name')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div>
                                        <input type="text" name="head_code" placeholder="Mã số hộ*" maxlength="10"
                                            required>
                                        @error('head_code')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div>
                                        <input type="email" name="email" placeholder="Email*" required>
                                        @error('email')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div>
                                        <input type="password" name="password" placeholder="Mật khẩu*" required>
                                        @error('password')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div>
                                        <input type="text" name="address" placeholder="Địa chỉ*" required>
                                        @error('address')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div>
                                        <input type="text" name="phone" placeholder="Số điện thoại*" required>
                                        @error('phone')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div>
                                        <input type="number" name="members_count" placeholder="Số lượng thành viên*"
                                            required min="1">
                                        @error('members_count')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <button type="submit" class="site-btn">Đăng ký ngay</button>
                                </form>
                            </div>
                        </div>
                        <div class="tab-pane" id="tabs-2" role="tabpanel">
                            <div class="signin__form__text">
                                <p>Đăng nhập tài khoản</p>
                                <form action="{{ route('login') }}" method="POST">
                                    @csrf
                                    <input type="text" name="login" placeholder="Email hoặc Số điện thoại*"
                                        required>
                                    <input type="password" name="password" placeholder="Mật khẩu*" required>
                                    <button type="submit" class="site-btn">Đăng nhập</button>
                                </form>
                                <!-- Thêm link "Quên mật khẩu?" dưới nút Đăng nhập -->
                                <div class="forgot-password">
                                    <a href="#" data-toggle="modal" data-target="#forgotPasswordModal">Quên mật
                                        khẩu?</a>
                                </div>
                            </div>
                        </div>

                        <!-- Modal Quên mật khẩu -->



                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="forgotPasswordModal" tabindex="-1" role="dialog"
        aria-labelledby="forgotPasswordModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="forgotPasswordModalLabel">Quên mật khẩu?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('password.email') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="email">Nhập email của bạn</label>
                            <input type="email" name="email" class="form-control" id="email"
                                placeholder="Email của bạn" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Gửi yêu cầu đặt lại mật
                            khẩu</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Sign In Section End -->
    <!-- Search End -->
    <!-- Js Plugins -->
    <script src="{{ asset('website_coppy') }}/js/jquery-3.3.1.min.js"></script>
    <script src="{{ asset('website_coppy') }}/js/bootstrap.min.js"></script>
    <script src="{{ asset('website_coppy') }}/js/jquery.slicknav.js"></script>
    <script src="{{ asset('website_coppy') }}/js/owl.carousel.min.js"></script>
    <script src="{{ asset('website_coppy') }}/js/main.js"></script>
</body>

</html>
