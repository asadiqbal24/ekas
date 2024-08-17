<!doctype html>
<html lang="en">
@stack('title')
@yield('head-scripts')
@include('admin.layouts.head')
<body data-sidebar="dark">
    <div id="layout-wrapper">
        @include('admin.layouts.topobar')
        @include('admin.layouts.leftSidebar')
        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    @include('admin.layouts.footer')
    </div>
    </div>
    <div class="rightbar-overlay"></div>
    <script>
        var editor1 = new RichTextEditor("#div_editor1");
    </script>
    @include('admin.layouts.scripts.script')
    @yield('page-scripts')
    <script>
        $('.admin-logout-btn').on('click', function(){
            $('#adminLogoutForm').submit();
        })
    </script>
</body>


</html>
