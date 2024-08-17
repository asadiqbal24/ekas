<!doctype html>

<html>
    <style>
        .oks-signup-form-sect{
            height: 60vh !important;
            display: flex;
            align-items: center;
        }
    </style>
<title>Ekas | Login</title>
@include('auth.partials._styles')
<div class="oks-signup-ani-wrap">
    <div class="oks-signup-animation">
        @include('auth.partials._header')
        <section class="oks-signup-form-sect">
            <div class="oks-signup-form-wrap">
                <div class="oks-loginform-wrap">
                    <div class="card-header">{{ __('Reset Password') }}</div>
                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf
                        <div class="form-group">
                            <label for="">Email</label>
                            <div class="login-input">
                                <input id="email" type="email" name="email" value="{{ old('email') }}" required
                                    autocomplete="email" autofocus>
                                <i class="fa-solid fa-user"></i>
                                @error('email')
                                    <span class="text-danger">
                                        <small>{{ $message }}</small>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div style="display: flex;justify-content: center !important">
                            <button type="submit" class="first-form-button">Send Link</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
        <!-- footer -->
        @include('layouts.footer')
    </div>
    @include('layouts.sections.cloud-animation')
</div>
<script type="text/javascript" src="js/scripts.js"></script>
</body>
</html>
