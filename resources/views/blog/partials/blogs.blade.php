@forelse ($blogs as $blog)
<div class="col-lg-4 col-md-6">
    <div class="oks-blogs-item">
        <div class="oks-contr-image">
            <a href="get/blog/details/{{ $blog->id }}">
                <img src="{{ Storage::url($blog->image) }}">
            </a>
        </div>
        <div class="oks-blog-content">
            <a href="get/blog/details/{{ $blog->id }}">
                <h3>{{ \Illuminate\Support\Str::limit($blog->title, 16) }}</h3>

            </a>
          
            <p>
                {!! Str::limit(strip_tags($blog->description), 130) !!}
            </p>

            <a href="get/blog/details/{{ $blog->id }}">Read More <i class="fa-solid fa-arrow-right"></i></a>
        </div>
    </div>
</div>
@empty
<h3 class="text-center">No items found.</h3>
@endforelse