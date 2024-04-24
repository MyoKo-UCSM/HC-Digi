<!DOCTYPE html>
<html lang="en">
	<head><base href="../../../">
		<title>HC Digitilization</title>
		<meta charset="utf-8" />
		<meta name="description" content="GRG" />
		<meta name="keywords" content="GRG" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta property="og:locale" content="en_US" />
		<meta property="og:type" content="article" />
		<meta property="og:title" content="GRG" />
		<meta property="og:url" content="{{ url('/letadminin') }}" />
		<meta property="og:site_name" content="GRG" />
		<link rel="canonical" href="{{ url('/letadminin') }}" />
		<link rel="shortcut icon" href="{{ asset('backend/images/favicon.png') }}" />
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
		<link href="{{ asset('backend/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('backend/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
	</head>
	<body id="kt_body" class="bg-body">
		<div class="d-flex flex-column flex-root">

		<!--begin::Authentication - Sign-in -->
		<div class="d-flex flex-column flex-lg-row flex-column-fluid">
				<!--begin::Aside-->
				<div class="d-flex flex-column flex-lg-row-auto positon-xl-relative" style="background-color: #FFFFFF;width:50%">
					<!--begin::Wrapper-->
					<div class="d-flex flex-column position-xl-fixed top-0 bottom-0 scroll-y" style="justify-content: center;
					align-items: center;width:50%">
						<img alt="Logo" src="{{ asset('backend/images/GRG-Logo.png') }}" class="" />
					</div>
					<!--end::Wrapper-->
				</div>
				<!--end::Aside-->
				<!--begin::Body-->
				<div class="d-flex flex-column flex-lg-row-fluid py-10" style="background-color: #F8F8F8;">
					<!--begin::Content-->
					<div class="d-flex flex-center flex-column flex-column-fluid">
						<!--begin::Wrapper-->

						<div class="w-lg-500px p-10 p-lg-15 mx-auto">
							<!--begin::Form-->
							<form class="form w-100" action="{{ route('post.login') }}" method="POST">
                            @csrf
							<div class="mb-10">
								<h1 class="text-dark mb-2">Sign In</h1>
							</div>
                            @if(session('error'))
                                <div class="mb-10">
                                    <div class="alert alert-danger">
                                        {{ session('error') }}
                                    </div>
                                </div>
							@endif
							<div class="fv-row mb-10">
								<label class="form-label fs-6 fw-bolder text-dark mb-2">Email</label>
                                <input id="email" type="email" class="form-control form-control-lg form-control-solid @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" style="background-color: #ffffff;" required autocomplete="email" autofocus>

								@error('email')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
								@enderror
							</div>
							<div class="fv-row mb-10">
								<div class="d-flex flex-stack mb-2">
									<label class="form-label fw-bolder text-dark fs-6 mb-2">Password</label>
                                    @if (Route::has('password.request'))
                                        <a class="link-primary fs-6 fw-bolder" href="{{ route('password.request') }}">
                                            Forgot Password?
                                        </a>
									@endif
								</div>
                                <input id="password" type="password" class="form-control form-control-lg form-control-solid @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" style="background-color: #ffffff;">

								@error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
								@enderror
							</div>
                            <div class="fv-row mb-10">
                                <div class="d-flex flex-stack mb-2">
                                    {!! NoCaptcha::renderJs() !!}
                                    {!! NoCaptcha::display() !!}
                                </div>
                                @error('g-recaptcha-response')
                                    <div class="alert alert-danger" role="alert">{{$message}}</div>
                                @enderror
                            </div>
							<div class="text-center">
								<button type="submit" class="btn btn-lg btn-primary w-100 mb-3">
									<span class="indicator-label">Sign In</span>
								</button>
							</div>
						</form>
							<!--end::Form-->
						</div>
						<!--end::Wrapper-->
					</div>
					<!--end::Content-->
				</div>
				<!--end::Body-->
			</div>
			<!--end::Authentication - Sign-in-->

		</div>
	</body>
</html>