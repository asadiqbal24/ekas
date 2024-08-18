<!doctype html>

<html>

<head>
    <link rel="icon" type="image/x-icon" href="{{ Storage::url(App\Services\SettingService::getSetting('favicon')) }}">
    <title>{{ App\Services\SettingService::getSetting('site_title') }} |
        {{ App\Services\SettingService::getSetting('tagline') }}
    </title>
    <style>
        .oks-blog-content h1,
        h4,
        h5,
        h6 {
            font-size: 20px !important;
        }

        .oks-blog-content h3 {
            font-size: 15px;
        }

        .oks-section-heading h2 {
            font-size: 32px;
            line-height: 42px;
            font-weight: 700;
            margin-bottom: 45px;
            text-align: center;
            color: #000;
        }
    </style>
    @if (!Auth::check())
    @include('layouts.styles')
    @else
    @include('user._styles')
    @endif
</head>

<body>
    @include('layouts.header')
    <!-- Banner section -->
    <section class="oks-about-banner" style="background-image: url('image/blogs.jpeg');">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 m-auto">
                    <div class="oks-banner-content">
                        <h1>Blog</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Listing Blog -->
    <section class="oks-listing-blog">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="oks-section-heading">
                        <h2>Latest Blogs</h2>
                    </div>
                </div>
            </div>
            <div class="row" id="blog-list">
                @include('blog.partials.blogs', ['blogs' => $blogs])
            </div>
            @if ($blogs->hasMorePages())
            <div class="text-center mt-5">
                <button class="btn btn-warning" style="background: #ffcc01;     height: 48px;
    border-top-right-radius: 4px;
    border-bottom-right-radius: 4px;
    border-top-left-radius: 0;
    border-bottom-left-radius: 0;
    font-size: 14px;
    line-height: 24px;
    font-weight: 600;
    width: 123px;" id="load-more-blogs" data-page="2">Load More</button>
            </div>
            @endif
        </div>
    </section>

    @include('layouts.sections.subscribe')
    <!-- footer -->
    @include('layouts.footer')
    <script type="text/javascript" src="js/scripts.js"></script>
    <link rel="stylesheet" href="toast/styles.css">
    <script src="toast/toast-plugin.js"></script>
    <script>
        $(document).on('click', '#load-more-blogs', function(e) {
            e.preventDefault();
            var page = $(this).data('page');
            $.ajax({
                url: '{{ route('load.more.blogs') }}',
                type: 'GET',
                data: {
                    page: page
                },
                success: function(data) {
                    $('#blog-list').append(data);
                    $('#load-more-blogs').data('page', page + 1);
                    if (data.trim().length === 0) {
                        $('#load-more-blogs').remove();
                    }
                }
            });
        });
        $(document).on('click', '.auth-btn', function() {
            window.location.href = $(this).attr('href');
        })
        $(document).on('click', '.login-redirect', function() {
            window.location.href = '/login';
        })
        $(document).on('click', '.logout-btn', function() {
            $('#logoutForm').submit();
        })
    </script>
    @if (session('success'))
    <script>
        $.toast({
            title: "Success!",
            message: {
                !!json_encode(session('success')) !!
            },
            type: "success",
            duration: 5000
        });
    </script>
    @endif
</body>

</html>