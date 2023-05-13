@extends('customer.layout.master2')

@section('title', 'Register')

@section('main')
    <!-- Content -->
    <div class="app__container">
        <div class="grid wide">
            <div class="row app__content">
                <div class="col l-6 l-o-3 m-8 m-o-2 c-10 c-o-1">
                    <form action="" method="POST" class="auth-form">
                        @csrf
                        <div class="auth-form__header">
                            <h3 class="auth-form__heading">Sign Up</h3>
                            <div class="auth-form__aside">
                                Have an account? <a href="{{ url('customer/login') }}" class="switch-link">Log In</a>
                            </div>
                        </div>

                        <div class="auth-form__form">
                            <div class="auth-form__group">
                                <input type="text" name="customerPhone" class="auth-form__input"
                                    placeholder="Enter your phone number">
                                <i class="fa-solid fa-phone"></i>
                            </div>
                            @if ($errors->has('customerPhone'))
                                <span class="text-danger">{{ $errors->first('customerPhone') }}</span>
                            @endif
                            <div class="auth-form__group">
                                <input type="email" name="customerEmail" class="auth-form__input"
                                    placeholder="Enter your email">
                                <i class="fa-solid fa-envelope"></i>
                            </div>
                            @if ($errors->has('customerEmail'))
                                <span class="text-danger">{{ $errors->first('customerEmail') }}</span>
                            @endif
                            <div class="auth-form__group">
                                <input type="text" name="customerName" class="auth-form__input"
                                    placeholder="Enter your username">
                                <i class="fa-solid fa-user"></i>
                            </div>
                            @if ($errors->has('customerName'))
                                <span class="text-danger">{{ $errors->first('customerName') }}</span>
                            @endif
                            <div class="auth-form__group">
                                <input type="password" name="customerPass" class="auth-form__input"
                                    placeholder="Enter your password">
                                <i class="fa-solid fa-lock"></i>
                            </div>
                            @if ($errors->has('customerPass'))
                                <span class="text-danger">{{ $errors->first('customerPass') }}</span>
                            @endif
                            <div class="auth-form__group">
                                <input type="password" name="customerPass" class="auth-form__input"
                                    placeholder="Confirm your password">
                                <i class="fa-solid fa-lock"></i>
                            </div>
                            @if ($errors->has('customerPass'))
                                <span class="text-danger">{{ $errors->first('customerPass') }}</span>
                            @endif
                        </div>

                        <div class="auth-form__controls">
                            <button type="submit" class="btn btn--primary">Sign Up</button>
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
