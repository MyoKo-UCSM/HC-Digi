@extends('frontend.layout.master')
@section('seo')
    <title>CityU ACE | Register</title>
    <meta property="og:title" content="Register" />
    <meta name="description" content="Register">
    <meta property="og:description" content="Register" />
    <meta property="og:url" content="{{ route('front.get.register') }}" />
    <meta property="og:locale" content="en">
    <meta property="og:image" content="">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:image:alt" content="">

    <link hrefLang="en" href="{{ url('/member-register') }}" rel="alternate" />
    <link hrefLang="x-default" href="{{ url('/member-register') }}" rel="alternate" />

    <link rel="canonical" href="{{ url('/member-register') }}">
@endsection
@section('content')
    <div class="aceconference-account-container">
        <div class="account-formcontainer">
            <h2 class="text-center fw-bold m-0">Register</h2>
            {{-- <p class="text-center mt-2">
                Have an account? <a href="#" class="fw-bold">Login Now</a>
            </p> --}}
            {{-- @if(session('message'))
                <p class="text-mainpink m-0">{{ session('message') }}</p>
            @endif --}}
            <form action="{{ route('front.post.register') }}" class="account-form" method="POST">
                @csrf
                <div class="row pb-4">
                    <div class="col-12 col-lg-6">
                        <label class="form-label" for="name">Name <span class="text-mainpink">*</span></label>
                        <input type="text" name="name" class="w-100" id="name" value="{{ old('name') }}" placeholder="Eg. John Smith">
                        @error('name')
                            <p class="text-mainpink error-text m-0">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="col-12 col-lg-6">
                        <label class="form-label" for="title">Title <span class="text-mainpink">*</span></label>
                        <input type="text" name="title" class="w-100" value="{{ old('title') }}" id="title" placeholder="Eg. Prof./Dr.">
                        @error('title')
                            <p class="text-mainpink error-text m-0">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="row pb-4">
                    <div class="col-12 col-lg-6">
                        <label class="form-label" for="email">Email Address <span class="text-mainpink">*</span></label>
                        <input type="email" name="email" value="{{ old('email') }}" class="w-100" id="email" placeholder="Eg. examplemail@abc.com">
                        @error('email')
                            <p class="text-mainpink error-text m-0">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="col-12 col-lg-6">
                        <label class="form-label" for="contact-number">Contact Number <span class="text-mainpink">*</span></label>
                        <input type="number" name="contact_number" value="{{ old('contact_number') }}" class="w-100" id="contact-number" placeholder="Eg. 1234 5678">
                        @error('contact_number')
                            <p class="text-mainpink error-text m-0">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="pb-4">
                    <label class="form-label" for="institution">Institution <span class="text-mainpink">*</span></label>
                    <input type="text" class="w-100" name="institution" value="{{ old('institution') }}" id="institution" placeholder="Eg. City University of Hong Kong">
                    @error('institution')
                        <p class="text-mainpink error-text m-0">{{ $message }}</p>
                    @enderror
                </div>

                <div class="pb-4 inputpassword-container">
                    <label class="form-label" for="password">Password</label>
                    <div class="position-relative">
                        <input type="password" name="password" class="w-100" id="password">
                        <img src="{{ asset('frontend/images/login/carbon_view-off.svg') }}" alt="eye icon" class="position-absolute">
                        @error('password')
                            <p class="text-mainpink error-text m-0">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="pb-4 inputpassword-container">
                    <label class="form-label" for="re-enterpassword">Re-enter Password</label>
                    <div class="position-relative">
                        <input type="password" name="password_confirmation" class="w-100" id="re-enterpassword">
                        <img src="{{ asset('frontend/images/login/carbon_view-off.svg') }}" alt="eye icon" class="position-absolute">
                        @error('password')
                            <p class="text-mainpink error-text m-0">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="text-center pt-4">
                    <button type="submit" class="button-pink text-uppercase text-center fw-bold">Register</button>
                </div>
            </form>
        </div>
    </div>
    <div class="success-overlay @if(session('message')) '' @else hidden @endif">
        <div class="success-card">
            <img src="{{ asset('frontend/images/thankyou.svg') }}" class="image" alt="thank you" />
            <h3 class="title">
                Thanks for register!
            </h3>
            <p class="desc">Congratulations! You've successfully registered with us.</p>
            <p class="desc">Please check your email inbox for a confirmation message. If you don't see it in your inbox, please check your spam folder.</p>
            <button class="ok-button">OK</button>
        </div>
    </div>
@endsection