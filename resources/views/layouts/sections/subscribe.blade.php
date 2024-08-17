<section class="oks-subscribe-section" id="subscribe_section">
    <div class="container">
        <div class="row justify-content-between align-items-center">
            <div class="col-sm-5">
                <div class="oks-subscripe-content">
                    <h2>Subscribe Now</h2>
                    <p>Don't miss out on the latest European education opportunities. Subscribe to our newsletter and
                        stay informed.</p>
                </div>
            </div>
            <div class="col-sm-5 col-md-6">
                <form action="subscribe" method="post">
                    @csrf
                    <div class="oks-subscripe-bar">
                        <input type="email" name="email">
                        @error('email')
                            <strong class="text-white">{{ $message }}</strong>
                        @enderror
                        <input type="submit" class="oks-submit">
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

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
