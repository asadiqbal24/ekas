<!doctype html>

<html>

<head>
    <title>{{ App\Services\SettingService::getSetting('site_title') }} |
        {{ App\Services\SettingService::getSetting('tagline') }}</title>
    <style>
        .oks-blog-content h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            font-size: 20px !important;
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
                        <h1>{{$categoryName->blogcategory}}</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>
<input type="hidden" value="{{$id}}" id="blog_cat_id">
    <!-- Listing Blog -->
    <section class="oks-listing-blog">
        <div class="container">
            <div class="row" id="blog-list">
                @include('blog.partials.blogs', ['blogs' => $blogs])
            </div>
            @if ($blogs->hasMorePages())
                <div class="text-center mt-5">
                    <button class="btn btn-warning" id="load-more-blogs" data-page="2">Load More</button>
                </div>
            @endif
        </div>
    </section>

    @include('layouts.sections.subscribe')
    <!-- footer -->
    @include('layouts.footer')
    <script type="text/javascript" src="js/scripts.js"></script>
    <script>
         $(document).on('click', '#load-more-blogs', function(e) {
            e.preventDefault();
            var page = $(this).data('page');
            var category_id = $('#blog_cat_id').val()
            $.ajax({
                url: '{{ route('load.more.cat.blogs') }}',
                type: 'GET',
                data: {
                    page: page,
                    category_id: category_id,
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
    <link rel="stylesheet" href="toast/styles.css">
    <script src="toast/toast-plugin.js"></script>
    @if (session('success'))
        <script>
            $.toast({
                title: "Success!",
                message: {!! json_encode(session('success')) !!},
                type: "success",
                duration: 5000
            });
        </script>
    @endif

</body>

</html>
