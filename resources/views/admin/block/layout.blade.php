<!DOCTYPE html>
<html>
@include('admin.Component.head')
<body>
    <div id="wrapper">
        @include('admin.Component.nav')
        <div id="page-wrapper" class="gray-bg dashbard-1">
            @include('admin.Component.headerTop')
            @yield('content')
        </div>
    </div>
    @include('admin.Component.script')
</body>
</html>
