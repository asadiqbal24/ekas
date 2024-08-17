<!doctype html>
<html>
    <title>{{App\Services\SettingService::getSetting('site_title')}} | {{App\Services\SettingService::getSetting('tagline')}}</title>
@include('auth.partials._styles')


<div class="oks-signup-ani-wrap">
    <div class="oks-signup-animation">

        @include('auth.partials._header')

        <section class="oks-signup-form-sect" style="height: 100vh ; display: flex;align-items: center">
            <div class="oks-signup-form-wrap">
                <div class="oks-loginform-wrap">
                    <h3>WELCOME</h3>
                    <form action="{{ route('login') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="">Email</label>
                            <div class="login-input">
                                <input type="email" name="email" id="" value="{{ old('email') }}"
                                    required>
                                <i class="fa-solid fa-user"></i>
                                @error('email')
                                    <span class="text-danger">
                                        <small>{{ $message }}</small>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group" >
                            <label for="">Password</label>
                            <div class="login-input password-div">
                                <input type="password" name="password" id="" value="{{ old('password') }}"
                                    required class="show-password">
                                <i class="fa-solid fa-lock"></i>
                                <div class="show-pass-eye-btn-div">
                                    <i class="fa-solid fa-eye show-pass-eye-btn" style="cursor: pointer"></i>
                                </div>
                            </div>
                            @error('password')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="sign-up-button-login">
                            <button type="submit" class="first-form-button">Log in</button>
                        </div>

                        <div class="login-third-from-text">
                            <span>Don't have an account ?</span>
                            <a href="register">Sign Up</a>
                        </div>
                        {{-- @if (Route::has('password.request'))
                            <a class="btn btn-link text-dark" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif --}}
                    </form>
                </div>
            </div>
        </section>
        @include('auth.partials._footer')
    </div>
    @include('layouts.sections.cloud-animation')
</div>
<script type="text/javascript" src="js/scripts.js"></script>
</body>
<script>
    $(document).on('click', '.show-pass-eye-btn', function() {
        if ($('.show-password').attr('type') === 'password') {
            $('.show-password').attr('type', 'text');
            $(this).removeClass('fa-eye').addClass('fa-eye-slash');
        } else {
            $('.show-password').attr('type', 'password');
            $(this).removeClass('fa-eye-slash').addClass('fa-eye');
        }
    });
</script>

</html>
