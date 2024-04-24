@extends('frontend.layout.master')
@section('seo')
@endsection
@section('content')
    <div class="aceconference-account-container login-container">
        <div class="account-formcontainer">
            <h2 class="text-center fw-bold m-0">Login</h2>
            <p class="text-center mt-2">
                Dont’t have an account? <a href="{{ route('front.get.register') }}" class="fw-bold">Register Now</a>
            </p>
            <form action="" class="account-form login-form">
                <div class="position-relative mb-3">
                    <input type="email" class="w-100" id="email">
                    <label for="email" class="position-absolute">Email <span class="text-mainpink">*</span></label>
                    <p class="text-mainpink error-text m-0 d-none">Please enter your email</p>
                </div>

                <div class="position-relative mb-3 inputpassword-container">
                    <input type="password" class="w-100" id="password">
                    <img src="{{ asset('frontend/images/login/carbon_view-off.svg') }}" alt="eye icon" class="position-absolute">
                    <label for="password" class="position-absolute">Pasword <span class="text-mainpink">*</span></label>
                    <p class="text-mainpink error-text m-0 d-none">Please enter your password</p>
                </div>
                <div class="text-center pt-4">
                    <button type="button" class="button-pink text-uppercase text-center fw-bold">Login</button>
                </div>
            </form>
        </div>
    </div>
@endsection