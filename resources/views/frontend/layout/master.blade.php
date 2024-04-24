<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">  
	<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1" />    
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<!-- Favicon -->
	<link rel="shortcut icon" href="{{ asset('frontend/images/favicon.ico') }}">
        @yield('seo')
	<!-- 1140px Grid styles for IE -->
	<!--[if lte IE 9]><link rel="stylesheet" href="lib/css/ie.css" type="text/css" media="screen" /><![endif]-->

    <!-- CSS concatenated and minified via ant build script-->
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/font-awesome.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/owl.theme.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/bxslider.css') }}">


	<!-- register css -->
	@if(Route::currentRouteName() == 'front.get.register' || Route::currentRouteName() == 'front.get.login')
		<link rel="stylesheet" href="{{ asset('frontend/css/custom.css') }}">
		<link rel="stylesheet" href="{{ asset('frontend/css/login.css') }}">
		<link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css') }}">
	@endif

	<!-- news css -->
	@if(Route::currentRouteName() == 'front.news' || Route::currentRouteName() == 'front.news.detail' || Route::currentRouteName() == 'front.committee' || Route::currentRouteName() == 'front.venue')
		<link rel="stylesheet" href="{{ asset('frontend/css/custom.css') }}">
		<link rel="stylesheet" href="{{ asset('frontend/css/ace-gridcard.css') }}">
		<link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css') }}">
	@endif

    <link href='http://fonts.googleapis.com/css?family=PT+Sans:400,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic' rel='stylesheet' type='text/css'>
    <!-- end CSS-->
    
    <script src="{{ asset('frontend/js/jquery-1.11.1.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery-migrate-1.2.1.js') }}"></script>
    
</head>

<body>
    <!--begin container -->
    <div id="container">
      	@if(Route::currentRouteName() == 'front.home')
      		@yield('content')

			<!--begin footer -->
			@include('frontend.layout.footer')
			<!--end footer -->
      	@else
			<div id="intro">
        		@include('frontend.layout.header')
        		@yield('content')
				@if (Route::currentRouteName() == 'front.get.register' || Route::currentRouteName() == 'front.get.login')

				@else
					<!--begin footer -->
					@include('frontend.layout.footer')
					<!--end footer -->
				@endif
      		</div>	
      	@endif
    </div>
    <!--! end of #container -->
    
    <!-- scripts concatenated and minified via ant build script-->
    <script src="{{ asset('frontend/js/modernizr-2.6.1.min.js') }}"></script>
    <script src="{{ asset('frontend/js/conditional.js') }}"></script>
    <script src="{{ asset('frontend/js/plugins.js') }}"></script>
    <script src="{{ asset('frontend/js/script.js') }}"></script>

	<!-- news & register js -->
	@if(Route::currentRouteName() == 'front.news' || Route::currentRouteName() == 'front.news.detail' || Route::currentRouteName() == 'front.get.register' ||  Route::currentRouteName() == 'front.committee' || Route::currentRouteName() == 'front.get.login')
		<script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
		<script src="{{ asset('frontend/js/login.js') }}"></script>
	@endif
    
    <!-- begin jquery.sticky script-->
    <script type="text/javascript" src="{{ asset('frontend/js/jquery.sticky.js') }}"></script>
		<script>
        $(window).load(function(){
          $("#header_wrapper").sticky({ topSpacing: 0 });
        });
    </script>
    <!-- end jquery.sticky script-->
  
    <!-- begin menu scrollTo script-->
    <script src="{{ asset('frontend/js/jquery.scrollTo-min.js') }}"></script>
    <script type="text/javascript">
		(function($){
			$(document).ready(function() {	
			/* This code is executed after the DOM has been completely loaded */
				
				$("#nav li a").click(function(e){
		
					var full_url = this.href;
					var parts = full_url.split("#");
					var trgt = parts[1];
					var target_offset = $("#"+trgt).offset();
					var target_top = target_offset.top;
					
					$('html,body').animate({scrollTop:target_top -70}, 1000);
						return false;
					
				});
				function closeSuccess(){
                    $('.success-overlay').addClass('hidden');
                }
                $(".ok-button").click(function(){
                    closeSuccess()
                })		
			});
		})(jQuery);
    </script>
	<!-- end menu scrollTo script-->
    
    <!-- begin menu color script-->
    <script src="{{ asset('frontend/js/jquery.nav.js') }}"></script>
	<script>
	$(document).ready(function() {
		$('#nav').onePageNav({
		filter: ':not(.external)',
		scrollThreshold: 0.25
		});
	});
	</script>
    <!-- end menu color script-->
    
    <!--begin shrink header script -->
    <script>
	$(function(){
	 var shrinkHeader = 70;
	  $(window).scroll(function() {
		var scroll = getCurrentScroll();
		  if ( scroll >= shrinkHeader ) {
			   $('#header_wrapper').addClass('shrink');
			}
			else {
				$('#header_wrapper').removeClass('shrink');
			}
	  });
	function getCurrentScroll() {
		return window.pageYOffset;
		}
	});
	</script>
    <!--end shrink header script -->
    
    <!--begin fitvids script -->
    <script src="{{ asset('frontend/js/jquery.fitvids.js') }}"></script>
	<script>
		// Basic FitVids Test
		$("#container").fitVids();
		// Custom selector and No-Double-Wrapping Prevention Test
		$("#container").fitVids({ customSelector: "iframe[src^='http://socialcam.com']"});
    </script>
    <!--end fitvids script -->
    
    <!-- begin owl.carousel script-->
    <script src="{{ asset('frontend/js/owl.carousel.js') }}"></script>
    <script>
    $(document).ready(function($) {
      $("#owl-example").owlCarousel();
      $("#owl-latest").owlCarousel({
        items : 3,
        itemsDesktop : [1199, 3],
        itemsDesktopSmall : [1025, 2],
        itemsTablet : [768, 2],
        itemsTabletSmall : false,
        itemsMobile : [479, 1],
      });
    });
    $("body").data("page", "frontpage");
    </script>
    <!-- end owl.carousel script-->
    
    <!-- begin bxslider script-->
    <script src="{{ asset('frontend/js/jquery.bxslider.min.js') }}"></script>
    <script>
	$('.bxslider').bxSlider({
	  buildPager: function(slideIndex){
		switch(slideIndex){
		  case 0:
			return '<i class="fa fa-file-image-o carousel_icons"></i>';
		  case 1:
			return '<i class="fa fa-microphone carousel_icons"></i>';
		  case 2:
			return '<i class="fa fa-life-ring carousel_icons"></i>';;
		  case 3:
			return '<i class="fa fa-graduation-cap carousel_icons"></i>';
		}
	  }
	});
    </script>
    <!-- end bxslider script-->
    
    <!-- begin countdown script-->
    <script>
		$(document).ready(function(){
			$("#countdown").countdown({
				date: "27 November 2024 12:00:00",
				format: "on"
			},
			
			function() {
				// callback function
			});
		});
	</script>
    <!-- end countdown script-->
    
</body>
</html>