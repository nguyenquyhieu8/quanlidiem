<script src="{{ asset('backend') }}/js/bootstrap.min.js"></script>
<script src="{{ asset('backend') }}/js/jquery-3.1.1.min.js"></script>
<script src="{{ asset('backend') }}/js/plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="{{ asset('backend') }}/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
<script src="{{ asset('backend') }}/js/plugins/flot/jquery.flot.js"></script>
<script src="{{ asset('backend') }}/js/plugins/flot/jquery.flot.tooltip.min.js"></script>
<script src="{{ asset('backend') }}/js/plugins/flot/jquery.flot.spline.js"></script>
<script src="{{ asset('backend') }}/js/plugins/flot/jquery.flot.resize.js"></script>
<script src="{{ asset('backend') }}/js/plugins/flot/jquery.flot.pie.js"></script>
<script src="{{ asset('backend') }}/js/plugins/peity/jquery.peity.min.js"></script>
<script src="{{ asset('backend') }}/js/demo/peity-demo.js"></script>
<script src="{{ asset('backend') }}/js/inspinia.js"></script>
<script src="{{ asset('backend') }}/js/plugins/pace/pace.min.js"></script>
<script src="{{ asset('backend') }}/js/plugins/jquery-ui/jquery-ui.min.js"></script>
<script src="{{ asset('backend') }}/js/plugins/gritter/jquery.gritter.min.js"></script>
<script src="{{ asset('backend') }}/js/plugins/sparkline/jquery.sparkline.min.js"></script>
<script src="{{ asset('backend') }}/js/demo/sparkline-demo.js"></script>
<script src="{{ asset('backend') }}/js/plugins/chartJs/Chart.min.js"></script>
<script src="{{ asset('backend') }}/js/plugins/toastr/toastr.min.js"></script>
@yield('script')
<script>
    CKEDITOR.replace('content', {
        // Các cấu hình bổ sung nếu cần:
        filebrowserBrowseUrl: '/browser/browse.php',
        filebrowserUploadUrl: '/uploader/upload.php',
        height: 300,
    });
</script>
