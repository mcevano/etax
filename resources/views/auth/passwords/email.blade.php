@extends('layouts.app')

@section('content')
<section class="container-main">
        <div class="flex-container">
            <div class="flex-item">
                <div class="content-holder bg-white holder-sm">
                    <figure>
                        <img class="mx-auto d-block" src="{{ asset('images/logo.png') }}" alt="eTax Logo" width="70">
                    </figure>
                    <h4 class="font-orange text-center">{{ __('Reset Password') }}</h4>
                    <p>You have to enter the email address you have used to register in eTax.</p>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-group">
                            <label for="email">{{ __('E-Mail Address') }}</label>
                            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-9 offset-md-3">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
</section>

@endsection
