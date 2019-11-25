@extends('layouts.app')

@section('content')
<section class="container-main">
        <div class="flex-container">
            <div class="flex-item">
                <div class="content-holder bg-white holder-md">
                    <figure>
                        <img class="mx-auto d-block" src="{{ asset('images/logo.png') }}" alt="eTax Logo" width="70">
                    </figure>
                    <h4 class="font-orange text-center">{{ __('Verify Your Email Address') }}</h4>

                    <div class="alert alert-success">
                        @if (session('resent'))
                            <div role="alert">
                                {{ __('A fresh verification link has been sent to your email address.') }}
                            </div>
                        @endif

                        {{ __('Before proceeding, please check your email for a verification link.') }}
                        {{ __('If you did not receive the email') }}, <a href="{{ route('verification.resend') }}">{{ __('click here to request another') }}</a>.
                    </div>
                    <a href="{{ route('logout') }}" class="btn btn-primary" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Create another Account</a>

                     <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
            </div>
        </div>
    </div>
</section>
@endsection
