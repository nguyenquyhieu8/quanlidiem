<!DOCTYPE html>
<html lang="en">

@include('website.components.head')

<body>

    <!-- Spinner Start -->
    <div id="spinner"
        class="show w-100 vh-100 bg-white position-fixed translate-middle top-50 start-50  d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary" role="status"></div>
    </div>
    <!-- Spinner End -->


    <!-- Navbar start -->
    @include('website.components.nav')
    <!-- Navbar End -->


    <!-- Modal Search Start -->
    @include('website.components.modal-search')
    <!-- Modal Search End -->


    {{-- <!-- Features Start -->
    @include('website.components.feature')
    <!-- Features End --> --}}

    @yield('content')

    <div class="chat-box">
        <div class="chat-box-header">
            ChatBot
            <span class="chat-box-toggle"><i class="far fa-window-close"></i></span>
        </div>
        <div class="chat-box-body">
            <div class="chat-box-overlay">
            </div>
            <div class="chat-logs">

            </div><!--chat-log -->
        </div>
        <div class="chat-input">
            <form>
                <input type="text" id="chat-input" placeholder="Send a message..." />
                <button type="button" class="chat-submit" id="chat-submit"><i class="fas fa-paper-plane"></i></button>
            </form>
        </div>
    </div>
    <!-- Footer Start -->
    <div class="container-fluid bg-dark footer py-5">
        <div class="container py-5">
            <div class="pb-4 mb-4" style="border-bottom: 1px solid rgba(255, 255, 255, 0.08);">
                <div class="row g-4">
                    <div class="col-lg-3">
                        <a href="#" class="d-flex flex-column flex-wrap">
                            <p class="text-white mb-0 display-6">Newsers</p>
                            <small class="text-light" style="letter-spacing: 11px; line-height: 0;">Newspaper</small>
                        </a>
                    </div>
                    <div class="col-lg-9">
                        <div class="d-flex position-relative rounded-pill overflow-hidden">
                            <input class="form-control border-0 w-100 py-3 rounded-pill" type="email"
                                placeholder="example@gmail.com">
                            <button type="submit"
                                class="btn btn-primary border-0 py-3 px-5 rounded-pill text-white position-absolute"
                                style="top: 0; right: 0;">Subscribe Now</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row g-5">
                <div class="col-lg-6 col-xl-3">
                    <div class="footer-item-1">
                        <h4 class="mb-4 text-white">Get In Touch</h4>
                        <p class="text-secondary line-h">Address: <span class="text-white">123 Streat, New
                                York</span></p>
                        <p class="text-secondary line-h">Email: <span class="text-white">Example@gmail.com</span>
                        </p>
                        <p class="text-secondary line-h">Phone: <span class="text-white">+0123 4567 8910</span></p>
                        <div class="d-flex line-h">
                            <a class="btn btn-light me-2 btn-md-square rounded-circle" href=""><i
                                    class="fab fa-twitter text-dark"></i></a>
                            <a class="btn btn-light me-2 btn-md-square rounded-circle" href=""><i
                                    class="fab fa-facebook-f text-dark"></i></a>
                            <a class="btn btn-light me-2 btn-md-square rounded-circle" href=""><i
                                    class="fab fa-youtube text-dark"></i></a>
                            <a class="btn btn-light btn-md-square rounded-circle" href=""><i
                                    class="fab fa-linkedin-in text-dark"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-xl-3">
                    <div class="footer-item-2">
                        <div class="d-flex flex-column mb-4">
                            <h4 class="mb-4 text-white">Recent Posts</h4>
                            <a href="#">
                                <div class="d-flex align-items-center">
                                    <div class="rounded-circle border border-2 border-primary overflow-hidden">
                                        <img src="{{ asset('website') }}/img/footer-1.jpg"
                                            class="img-zoomin img-fluid rounded-circle w-100" alt="">
                                    </div>
                                    <div class="d-flex flex-column ps-4">
                                        <p class="text-uppercase text-white mb-3">Life Style</p>
                                        <a href="#" class="h6 text-white">
                                            Get the best speak market, news.
                                        </a>
                                        <small class="text-white d-block"><i class="fas fa-calendar-alt me-1"></i>
                                            Dec 9, 2024</small>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="d-flex flex-column">
                            <a href="#">
                                <div class="d-flex align-items-center">
                                    <div class="rounded-circle border border-2 border-primary overflow-hidden">
                                        <img src="{{ asset('website') }}/img/footer-2.jpg"
                                            class="img-zoominimg-fluid rounded-circle w-100" alt="">
                                    </div>
                                    <div class="d-flex flex-column ps-4">
                                        <p class="text-uppercase text-white mb-3">Sports</p>
                                        <a href="#" class="h6 text-white">
                                            Get the best speak market, news.
                                        </a>
                                        <small class="text-white d-block"><i class="fas fa-calendar-alt me-1"></i>
                                            Dec 9, 2024</small>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-xl-3">
                    <div class="d-flex flex-column text-start footer-item-3">
                        <h4 class="mb-4 text-white">Categories</h4>
                        <a class="btn-link text-white" href=""><i class="fas fa-angle-right text-white me-2"></i>
                            Sports</a>
                        <a class="btn-link text-white" href=""><i class="fas fa-angle-right text-white me-2"></i>
                            Magazine</a>
                        <a class="btn-link text-white" href=""><i
                                class="fas fa-angle-right text-white me-2"></i>
                            Lifestyle</a>
                        <a class="btn-link text-white" href=""><i
                                class="fas fa-angle-right text-white me-2"></i>
                            Politician</a>
                        <a class="btn-link text-white" href=""><i
                                class="fas fa-angle-right text-white me-2"></i>
                            Technology</a>
                        <a class="btn-link text-white" href=""><i
                                class="fas fa-angle-right text-white me-2"></i>
                            Intertainment</a>
                    </div>
                </div>
                <div class="col-lg-6 col-xl-3">
                    <div class="footer-item-4">
                        <h4 class="mb-4 text-white">Our Gallary</h4>
                        <div class="row g-2">
                            <div class="col-4">
                                <div class="rounded overflow-hidden">
                                    <img src="{{ asset('website') }}/img/footer-1.jpg"
                                        class="img-zoomin img-fluid rounded w-100" alt="">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="rounded overflow-hidden">
                                    <img src="{{ asset('website') }}/img/footer-2.jpg"
                                        class="img-zoomin img-fluid rounded w-100" alt="">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="rounded overflow-hidden">
                                    <img src="{{ asset('website') }}/img/footer-3.jpg"
                                        class="img-zoomin img-fluid rounded w-100" alt="">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="rounded overflow-hidden">
                                    <img src="{{ asset('website') }}/img/footer-4.jpg"
                                        class="img-zoomin img-fluid rounded w-100" alt="">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="rounded overflow-hidden">
                                    <img src="{{ asset('website') }}/img/footer-5.jpg"
                                        class="img-zoomin img-fluid rounded w-100" alt="">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="rounded overflow-hidden">
                                    <img src="{{ asset('website') }}/img/footer-6.jpg"
                                        class="img-zoomin img-fluid rounded w-100" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->



    <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('website') }}/lib/easing/easing.min.js"></script>
    <script src="{{ asset('website') }}/lib/waypoints/waypoints.min.js"></script>
    <script src="{{ asset('website') }}/lib/owlcarousel/owl.carousel.min.js"></script>
    @yield('scripts');
    <!-- Template Javascript -->
    <script src="{{ asset('website') }}/js/main.js"></script>
    <script>
        const notifications = @json($notifications ?? []);
        let currentIndex = 0;


        function showNotification() {
            // Ensure the element exists before proceeding
            const notificationDiv = document.getElementById('notification-' + currentIndex);


            if (!notificationDiv) {
                console.log('Notification element not found');
                return; // Exit if element is not found
            }

            notificationDiv.classList.add('notification-visible');
            notificationDiv.style.opacity = 1; // Ensure the element is fully visible initially

            console.log(notificationDiv); // For debugging

            // Đặt thời gian để mờ đi và chuyển sang thông báo tiếp theo
            setTimeout(() => {
                // Mờ đi thông báo hiện tại
                notificationDiv.style.opacity = 0;

                // Sau khi mờ đi, ẩn thông báo để không chiếm không gian
                setTimeout(() => {
                    notificationDiv.style.display = 'none';

                    // Tăng chỉ số và quay lại đầu nếu đến cuối
                    currentIndex = (currentIndex + 1) % notifications.length;

                    // Hiện thông báo tiếp theo
                    showNotification();
                }, 1000); // Thời gian mờ đi (1s)
            }, 5000); // Hiện thông báo trong 5 giây
        }
        showNotification();
        // // Bắt đầu hiển thị thông báo đầu tiên
        // showNotification();

        $(function() {
            var INDEX = 0;

            // Mảng các nội dung chào mừng
            var welcomeMessages = [
                "Chào mừng bạn đến với hệ thống chat! Bạn muốn làm gì hôm nay?",
                "Xin chào! Bạn cần giúp đỡ gì không?",
                "Chào bạn! Hãy chọn một tùy chọn để bắt đầu."
            ];

            // Mảng các tùy chọn cho người dùng chọn
            var buttonOptions = [{
                    name: 'Trợ giúp',
                    value: 'help'
                },
              
                {
                    name: 'Liên hệ chúng tôi',
                    value: 'contact'
                },
                {
                    name: 'Đăng ký biểu mẫu',
                    value: 'register'
                }
            ];

            // Mảng các câu trả lời tương ứng
            var responseMessages = {
            help: [
                "Chúng tôi luôn sẵn sàng hỗ trợ bạn về vấn đề tuyển sinh! Hãy mô tả thắc mắc của bạn.",
                "Bạn cần trợ giúp về quy trình tuyển sinh? Hãy cung cấp thông tin chi tiết nhé!",
                "Chào bạn! Vui lòng cho chúng tôi biết bạn gặp phải khó khăn ở bước nào trong quá trình đăng ký tuyển sinh."
            ],
            product: [
                // Phần này không còn sử dụng nữa, vì không liên quan đến tuyển sinh
            ],
            contact: [
                "Bạn có thể liên hệ với chúng tôi qua hotline: 1800-123-456 để được tư vấn tuyển sinh.",
                "Vui lòng gửi email đến admissions@university.com để nhận thông tin tuyển sinh chi tiết.",
                "Chúng tôi luôn sẵn sàng giải đáp mọi thắc mắc của bạn qua trang liên hệ trên website tuyển sinh chính thức."
            ],
            register: [
                "Chào bạn! Nếu bạn đang quan tâm đến việc tuyển sinh, vui lòng chọn một trong các tùy chọn dưới đây để biết thêm thông tin:",
                "<a href='/gioi-thieu' target='_blank'>Gioi thieu Thông tin tuyển sinh năm 2025</a>",
                "<a href='/dang-ki' target='_blank'>Đăng kí tuyển sinh</a>",
                "<a href='/contact' target='_blank'>Liên hệ với chúng tôi</a>",
                // "<a href='/admission-requirements' target='_blank'>Yêu cầu và thủ tục đăng ký tuyển sinh</a>",
                "Nếu bạn cần hỗ trợ về việc hoàn thiện hồ sơ tuyển sinh, đừng ngần ngại liên hệ với chúng tôi!"
            ]
        };


            // Khi nhấn vào chat-circle
            $("#chat-circle").click(function() {
                $("#chat-circle").toggle('scale');
                $(".chat-box").toggle('scale');

                // Gửi tin nhắn chào mừng
                var randomMessage = welcomeMessages[Math.floor(Math.random() * welcomeMessages.length)];
                generate_message(randomMessage, 'user');

                // Hiển thị các nút lựa chọn
                setTimeout(function() {
                    generate_button_message("Vui lòng chọn một trong các tùy chọn dưới đây:",
                        buttonOptions);
                }, 1000);
            });

            // Hàm tạo tin nhắn
            function generate_message(msg, type) {
                INDEX++;
                var str = `<div id='cm-msg-${INDEX}' class="chat-msg ${type}">
                  <span class="msg-avatar"></span>
                  <div class="cm-msg-text">${msg}</div>
               </div>`;
                $(".chat-logs").append(str);
                $("#cm-msg-" + INDEX).hide().fadeIn(300);
                $(".chat-logs").stop().animate({
                    scrollTop: $(".chat-logs")[0].scrollHeight
                }, 1000);
            }

            // Hàm tạo tin nhắn với nút lựa chọn
            function generate_button_message(msg, buttons) {
                INDEX++;
                var btn_obj = buttons.map(function(button) {
                    return `<li class="button">
                    <a href="javascript:;" class="btn btn-primary chat-btn" chat-value="${button.value}">${button.name}</a>
                </li>`;
                }).join('');
                var str = `<div id='cm-msg-${INDEX}' class="chat-msg user">
                  <span class="msg-avatar"></span>
                  <div class="cm-msg-text">${msg}</div>
                  <div class="cm-msg-button">
                      <ul>${btn_obj}</ul>
                  </div>
               </div>`;
                $(".chat-logs").append(str);
                $("#cm-msg-" + INDEX).hide().fadeIn(300);
                $(".chat-logs").stop().animate({
                    scrollTop: $(".chat-logs")[0].scrollHeight
                }, 1000);
                $("#chat-input").attr("disabled", false);
            }

            // Xử lý khi nhấn vào nút tùy chọn
            $(document).delegate(".chat-btn", "click", function() {
                var value = $(this).attr("chat-value");
                var name = $(this).html();
                $("#chat-input").attr("disabled", false);
                generate_message(name, 'self');

                // Hiển thị toàn bộ câu trả lời tương ứng
                show_response(value);
            });

            // Xử lý khi người dùng nhập nội dung vào chat-input
            $("#chat-input").keypress(function(e) {
                if (e.which == 13) { // Phím Enter
                    e.preventDefault(); // Ngăn chặn hành động mặc định (reload trang)
                    var input = $("#chat-input").val().trim().toLowerCase();
                    $("#chat-input").val('');
                    if (input === "") return;

                    generate_message(input, 'self');

                    // Kiểm tra xem input có khớp với buttonOptions không
                    var matchedOption = buttonOptions.find(function(option) {
                        return option.name.toLowerCase() === input;
                    });

                    if (matchedOption) {
                        show_response(matchedOption.value);
                    } else {
                        setTimeout(function() {
                            generate_message("Vui lòng chọn lại một trong các tùy chọn sau: <br>" +
                                buttonOptions.map(o => `- ${o.name}`).join('<br>'), 'user');
                            // Hiển thị lại các nút lựa chọn sau khi yêu cầu người dùng chọn lại
                            generate_button_message(
                                "Vui lòng chọn một trong các tùy chọn dưới đây:", buttonOptions);
                        }, 500);
                    }
                }
            });

            // Hiển thị phản hồi dựa trên giá trị
            function show_response(value) {
                if (responseMessages[value]) {
                    responseMessages[value].forEach(function(message) {
                        setTimeout(function() {
                            generate_message(message, 'user');
                        }, 500);
                    });
                }
            }

            // Hiển thị chat box
            $(".chat-box-toggle").click(function() {
                $("#chat-circle").toggle('scale');
                $(".chat-box").toggle('scale');
            });

            // Ngăn việc submit khi nhấn vào nút submit (icon)
            $("#chat-submit").click(function(e) {
                e.preventDefault(); // Ngăn chặn hành động mặc định (reload trang)

                var input = $("#chat-input").val().trim().toLowerCase();
                $("#chat-input").val('');
                if (input === "") return;

                generate_message(input, 'self');

                // Kiểm tra xem input có khớp với buttonOptions không
                var matchedOption = buttonOptions.find(function(option) {
                    return option.name.toLowerCase() === input;
                });

                if (matchedOption) {
                    show_response(matchedOption.value);
                } else {
                    setTimeout(function() {
                        generate_message("Vui lòng chọn lại một trong các tùy chọn sau: <br>" +
                            buttonOptions.map(o => `- ${o.name}`).join('<br>'), 'user');
                        // Hiển thị lại các nút lựa chọn sau khi yêu cầu người dùng chọn lại
                        generate_button_message("Vui lòng chọn một trong các tùy chọn dưới đây:",
                            buttonOptions);
                    }, 500);
                }
            });
        });
    </script>
</body>

</html>
