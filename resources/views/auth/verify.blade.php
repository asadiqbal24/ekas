@extends('layouts.app')

@section('content')
    
    <div class="oks-signup-ani-wrap">
        <div class="oks-signup-animation">
            <section class="oks-signup-form-sect">
                <div class="oks-signup-form-wrap">
                    <div class="oks-loginform-wrap">
                        <h4 class="card-header">{{ __('Verify Your Email Address') }}</h4><br>
                        <div class="card-body text-dark">
                            @if (session('resent'))
                                <div class="alert alert-success" role="alert">
                                    {{ __('A fresh verification link has been sent to your email address.') }}
                                </div>
                            @endif

                            {{ __('Before proceeding, please check your email for a verification link.') }}
                            {{ __('If you did not receive the email') }},
                            <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                                @csrf
                                <button type="submit"
                                    class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
                            </form>
                        </div>
                    </div>
                </div>
            </section>
            <!-- footer -->
            @include('layouts.footer')
        </div>
        @include('layouts.sections.cloud-animation')
    </div>
@endsection
