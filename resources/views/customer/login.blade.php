@extends('customer.layout.master2')

@section('title', 'Login')

@section('main')
    <!-- Content -->
    <div class="app__container">
        <div class="grid wide">
            <div class="row app__content">
                <div class="col l-6 l-o-3 m-8 m-o-2 c-10 c-o-1">
                    <form action="" method="POST" class="auth-form">
                        @csrf
                        <div class="auth-form__header">
                            <h3 class="auth-form__heading">Login</h3>
                            <div class="auth-form__aside">
                                New member? <a href="{{ url('customer/register') }}" class="switch-link">Sign Up</a>
                            </div>
                        </div>

                        <div class="auth-form__form">
                            <div class="auth-form__group">
                                <input type="email" name="customerEmail" class="auth-form__input" placeholder="Email">
                                <i class="fa-solid fa-envelope"></i>
                            </div>
                            @if ($errors->has('customerEmail'))
                                <span class="text-danger">{{ $errors->first('customerEmail') }}</span>
                            @elseif (Session::has('fail'))
                                <span class="text-danger">{{ Session::get('fail') }}</span>
                            @endif
                            <div class="auth-form__group">
                                <input type="password" name="customerPass" class="auth-form__input" placeholder="Password">
                                <i class="fa-solid fa-lock"></i>
                            </div>
                            @if ($errors->has('customerPass'))
                                <span class="text-danger">{{ $errors->first('customerPass') }}</span>
                            @elseif (Session::has('failPass'))
                                <span class="text-danger">{{ Session::get('failPass') }}</span>
                            @endif
                        </div>

                        <div class="auth-form__controls">
                            <button type="submit" class="btn btn--primary">Login</button>
                            <a href="{{ url('customer/index') }}" class="btn btn--normal auth-form__controls-back">Back</a>
                        </div>

                        <!-- <div class="separate">
                                                                    <div class="cross"></div>
                                                                    <span class="or">OR</span>
                                                                    <div class="cross"></div>
                                                                </div>

                                                                <div class="auth-form__socials">
                                                                    <button class="btn btn--normal">
                                                                        <div class="social-icon">
                                                                            <div class="social-icon__facebook"></div>
                                                                        </div>
                                                                        <span>Facebook</span>
                                                                    </button>
                                                                    <button class="btn btn--normal">
                                                                        <div class="social-icon">
                                                                            <div class="social-icon__google"></div>
                                                                        </div>
                                                                        <span>Google</span>
                                                                    </button>
                                                                </div> -->
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
