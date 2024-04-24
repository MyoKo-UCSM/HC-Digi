@extends('frontend.layout.master')
@section('seo')
    <title>CityU ACE | Home</title>
    <meta property="og:title" content="{{ isset($home) && isset($home->meta_title) ? $home->meta_title : '' }}" />
    <meta name="description" content="{{ isset($home) && isset($home->meta_description) ? $home->meta_description : '' }}">
    <meta property="og:description" content="{{ isset($home) && isset($home->meta_description) ? $home->meta_description : '' }}" />
    <meta property="og:url" content="{{ route('front.home') }}" />
    <meta property="og:locale" content="en">
    {{--<meta property="og:image" content="{{ isset($home) ? asset($home->meta_image) : '' }}">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:image:alt" content="{{ isset($home) ? $home->meta_image_alt : '' }}">
    --}}
    <link hrefLang="en" href="{{ url('/') }}" rel="alternate" />
    <link hrefLang="x-default" href="{{ url('/') }}" rel="alternate" />

    <link rel="canonical" href="{{ url('/') }}">
@endsection
@section('content')
            
        <!--begin intro -->
        <div id="intro" class="home-intro">
            
            @include('frontend.layout.header')
            
            <!--begin home section -->
            <div id="home">
            
                <!--begin home_box -->
                <div class="home_box">
                
                    <h2 class="countdown_title">{{ isset($home) && isset($home->banner_title) ? $home->banner_title : '' }}</h2>
                    {!! isset($home) && isset($home->banner_description) ? $home->banner_description : '' !!}
                                                               
                    <!--begin countdown -->
                    <ul id="countdown">
                        <li>
                            <span class="days">00</span>
                            <p class="timeRefDays">days</p>
                        </li>
                        <li>
                            <span class="hours">00</span>
                            <p class="timeRefHours">hours</p>
                        </li>
                        <li>
                            <span class="minutes">00</span>
                            <p class="timeRefMinutes">minutes</p>
                        </li>
                        <li>
                            <span class="seconds">00</span>
                            <p class="timeRefSeconds">seconds</p>
                        </li>
                    </ul>
                    <!--end countdown -->
                
                </div>
                <!--end home_box -->
    
            </div>
            <!--end home section -->
            
        </div>
        <!--end intro -->
            
        <!--begin event_wrapper -->
        <div id="features" class="event_wrapper">
            
            <!--begin event_box -->
            <div class="event_box container473">
                
                <!--begin row -->
                <div class="row">
                
                    <!--begin twelvecol -->
                    <div class="twelvecol event_box-row">
                            
                        <!--begin threecol -->
                        <div class="threecol hidden">
                            <p class="event_info"><span>Next conference</span><br>Registration Open</p>
                        </div>
                        <!--end threecol -->
                        
                        <!--begin threecol -->
                        <div class="event_box-item">
                        	<span><i class="fa fa-calendar fa-3x"></i></span>
                            <p class="event_info"><span>Date</span><br>  {{ isset($home) && isset($home->date) ? $home->date : '' }}</p>
                        </div>
                        <!--end threecol -->
                        
                        <!--begin threecol -->
                        <div class="event_box-item">
                        	<span><i class="fa fa-map-marker fa-3x"></i></span>
                            <p class="event_info"><span>Location</span><br>{{ isset($home) && isset($home->location) ? $home->location : '' }}</p>
                        </div>
                        <!--end threecol -->
                    </div>
                    <!--end twelvecol -->
                    
                </div>
                <!--end row -->
                
            </div>
            <!--end event_box -->
                
        </div>
        <!--end event_wrapper -->
  
        <!--begin section_box -->
        <div class="services_wrapper hidden">
       
            <!--begin services_item -->
            <div class="services_item">
                <div class="icon_wrapper">
                    <div class="icon_box">
                        <i class="fa fa-file-image-o icon-8x"></i>
                    </div>
                </div>
                <h3>250 Online Courses</h3>
                <p>Eodem modo typi, quisty distren videnturis parumitsum clarits, nisle solemnes fiant etsit magnas.</p>
            </div>
            <!--end services_item -->
            
            <!--begin services_item -->
            <div class="services_item ">
                <div class="icon_wrapper">
                    <div class="icon_box">
                        <i class="fa fa-microphone icon-8x"></i>
                    </div>
                </div>
                <h3>Over 70 Speakers</h3>
                <p>Eodem modo typi, quisty distren videnturis parumitsum clarits, nisle solemnes fiant etsit magnas.</p>
            </div>
            <!--end services_item -->
            
            <!--begin services_item -->
            <div class="services_item ">
                <div class="icon_wrapper">
                    <div class="icon_box">
                        <i class="fa fa-life-ring icon-8x"></i>
                    </div>
                </div>
                <h3>24/7 Support</h3>
                <p>Eodem modo typi, quisty distren videnturis parumitsum clarits, nisle solemnes fiant etsit magnas.</p>
            </div>
            <!--end services_item -->
            
            <!--begin services_item -->
            <div class="services_item last">
                <div class="icon_wrapper">
                    <div class="icon_box">
                        <i class="fa fa-graduation-cap icon-8x"></i>
                    </div>
                </div>
                <h3>Global Internships</h3>
                <p>Eodem modo typi, quisty distren videnturis parumitsum clarits, nisle solemnes fiant etsit magnas.</p>
            </div>
            <!--end services_item -->
        
        </div>
        <!--end section_box -->
    
        <!--begin newsletter_wrapper -->
        <div id="subscribe" class="newsletter_wrapper hidden">
            
            <!--begin newsletter_box -->
            <div class="newsletter_box">
                
                <!--<h3 class="parallax_title">Do you fancy our <span>events</span> so far? Don't miss out &amp;<br>Subscribe <span>today</span> to get the latest promotions!</h3> -->
                {!! isset($home) && isset($home->section_two_content) ? $home->section_two_content : '' !!}
            
                <!--begin newsletter_form_wrapper -->
                <a href="" class="newsletter_box-btn">
                    register now
                </a>
                <!--end newsletter_form_wrapper -->
            
            </div>
            <!--end newsletter_box -->
                
        </div>
        <!--end newsletter_wrapper -->
        
        <!--begin section_wrapper -->
        <div id="overview" class="section_wrapper">
            
            <!--begin section_box -->
            <div class="container375 small_margins">
                <img src="{{ isset($home) && isset($home->section_two_image) ? $home->section_two_image : '' }}" class="threed-image" alt="{{ isset($home) && isset($home->section_two_image_alt) ? $home->section_two_image_alt : '' }}" />
                <!--begin row -->
                <div class="row">
                
                    <!--begin twelvecol -->
                    <div class="twelvecol">
                
                        <!--begin sixcol -->
                        <div class="sixcol">
                        
                            <h4>Welcome by Chairman</h4>
                            <p class="text-justify">
                                {{-- The 5th International Conference on 3D Construction Printing (IC3DCP5) has been scheduled at City University of Hong Kong on 25-27 November, 2024 (Venue to be announced).</br></br>The main objective of the IC3DCP5 is to provide a platform for international and local academic and industry partners to exchange their innovative ideas and knowledges in all aspects under Construction 3D Printing, which include established technologies, modelling, simulation, materials, recycled materials and concrete, geopolymer, fibre reinforcement and composite materials, testing and standards, applications, Building Information Modelling (BIM), design, optimisation, structural and intelligent monitoring, robotics and automation.</br></br>This conference is the 5th one in the series, and the founder of this conference series is Prof Jay Sanjayan. The first one was held at Swinburne University of Technology in Melbourne (Australia) in November 2018, the 2nd one was held at Hebei University of Technology in Tianjin in October 2019 and the 3rd conference was held online in June 2022 and mainly organised by TongJi University, Shanghai. Separately, in May 2021, Southeast University (Nanjing) organised an International Conference on 3D Printing Concrete Materials and Structures which was held online. The last one was the 4th International Conference on 3D Construction Printing (4-IC3DcP) being held on 19-21 July 2023 at Nanyang Technological University (NTU, Singapore). --}}
                                {!! isset($home) && isset($home->welcome_by_chairman) ? $home->welcome_by_chairman : '' !!}
                            </p>
                            
                        </div>
                        <!--end twelvecol -->
                        
                        <!--begin sixcol -->
                        <div class="sixcol last">
                        	
                            <h4>Conference Theme</h4>
                            
                            <!--begin toggle -->
                           
                            <ul id="toggle-view">
                                @if (isset($home) && isset($home->our_themes) && isset($home->our_themes['title']))
                                    @foreach ($home->our_themes['title'] as $key => $title)
                                        <li>
                                        
                                            <h3>{{ $title }}
                                                @if ($loop->first)
                                                    <span>-</span>
                                                @else 
                                                    <span>+</span>
                                                @endif
                                            </h3>
                                            <div @if ($loop->first) style="display: block;" @endif>
                                                {!! isset($home->our_themes['description'][$key]) ? $home->our_themes['description'][$key] : '' !!}
                                            </div>
                                        
                                        </li>
                                    @endforeach
                                @endif
                            </ul>
                            <!--end toggle --> 
                    
                        </div>
                        <!--end sixcol -->
                        
                    </div>
                    <!--end twelvecol -->
                    
                </div>
                <div class="row organized" id="sponsor">
                    <div class="twelvecol">
                        <div class="sixcol">
                            <h4>Organized by</h4>
                            @if (isset($home) && isset($home->organized_by) && isset($home->organized_by['image']))
                                @foreach ($home->organized_by['image'] as $key => $image)
                                    <a href="{{ isset($home->organized_by['link'][$key]) ? $home->organized_by['link'][$key] : '#' }}" target="_blank"><img src="{{ asset($image) }}" alt="{{ isset($home->organized_by['image_alt'][$key]) ? $home->organized_by['image_alt'][$key] : '' }}"/></a>
                                @endforeach
                            @endif
                        </div>
                        <div class="sixcol last">
                            <h4>Co-Organized by</h4>
                            @if (isset($home) && isset($home->co_organized_by) && isset($home->co_organized_by['image']))
                                @foreach ($home->co_organized_by['image'] as $key => $image)
                                    <a href="{{ isset($home->co_organized_by['link'][$key]) ? $home->co_organized_by['link'][$key] : '#' }}" target="_blank"><img src="{{ asset($image) }}" alt="{{ isset($home->co_organized_by['image_alt'][$key]) ? $home->co_organized_by['image_alt'][$key] : '' }}" class="@if(!$loop->first)pt-25 @endif"/></a>
                                @endforeach
                            @endif
                        </div>
                        <div class="twelvecol">
                            <h4>Sponsored by</h4>
                            <div class="sponsor">
                                @if (isset($home) && isset($home->sponsored_by) && isset($home->sponsored_by['image']))
                                    @foreach ($home->sponsored_by['image'] as $key => $image)
                                        <a href="{{ isset($home->sponsored_by['link'][$key]) ? $home->sponsored_by['link'][$key] : '#' }}" target="_blank"><img src="{{ asset($image) }}" alt="{{ isset($home->sponsored_by['image_alt'][$key]) ? $home->sponsored_by['image_alt'][$key] : '' }}"/></a>
                                    @endforeach
                                @endif
                            </div>
                           
                        </div>
                    </div>
                </div>
                <!--end row -->
                                
            </div>
            <!--end section_box -->
             
        </div>
        <!--end section_wrapper -->    
        
        <!--begin bxslider_wrapper -->
        <div class="bxslider_wrapper">
            
            <!--begin bxslider_box -->
            <div class="bxslider_box container539">
                {!! isset($home) && isset($home->key_date_for_conference) ? $home->key_date_for_conference : '' !!}    
                <div id="speaker"></div>                    
            </div>
            <!--end bxslider_box -->
                
        </div>
        <!--end bxslider_wrapper -->
        
        <!--begin section_wrapper -->
        <div id="speakers" class="section_wrapper">
            
            <!--begin section_box -->
            <div class="container375 meetOurSpeaker">
            
            	<!--begin blue_box -->
                <div class="blue_box hidden">
                    
                    <!--begin row -->
                    <div class="row">
                        
                        <!--begin twelvecol -->
                        <div class="twelvecol">
                        	
                            <!--begin eightcol -->
                            <div class="eightcol">
                            	<img src="{{ asset('frontend/images/speaker.png') }}" alt="Picture">
                            </div>
                            <!--end eightcol -->
                    
                            <!--begin fourcol -->
                            <div class="fourcol last">
                                                
                                <!--begin blue_box_content -->
                                <div class="blue_box_content">
                                
                            		<h4>Meet Our Amazing Speakers</h4>
                                    
                                    <p>Pellentesque in laoret mauris, in dapibis eros, vivamus malesuada ipsum volutpat et egestas ornare. Aliquamist auctor velits velitum tellus posuere congue, sedit aliquet nibh ligula.</p>
                                    
                                    <ul>
                                    	<li><i class="fa fa-check-square-o"></i>&nbsp; Tincidunt tortor tempus ins pharetra.</li>
                                        <li><i class="fa fa-check-square-o"></i>&nbsp; Risus semper sed faucibus, vitae iaculis</li>
                                        <li><i class="fa fa-check-square-o"></i>&nbsp; Nullam dignissim vitae et consequat.</li>
                                    </ul>
                                    
                                    <a href="#" class="button_white">Our Speakers</a>
                                    
                                </div>
                                <!--end blue_box_content -->
                                
                            </div>
                            <!--end fourcol -->
                    
                        </div>
                        <!--end twelvecol -->
                        
                    </div>
                    <!--end row -->
                    
                </div>
                <!--end blue_box -->
            
            	<!--begin white_box -->
                <div class="white_box hidden">
                
                    <div class="align_center">
                        <h3 class="fancy_title">Howdy stranger! Do you fancy <span>our events</span> so far?<br>Don't miss out and <span>register today</span> to get the latest offers!</h3>
                    </div>
   
                    <!--begin row -->
                    <div class="row">
                    
                        <!--begin twelvecol -->
                        <div class="twelvecol">
                			
                            <!--begin fourcol -->
                            <div class="fourcol features_item">
                            	<span class="circle_icons"><i class="fa fa-trophy"></i></span>
                                <h5>Montly Awards</h5>
                                <p >Pellentesque in laoret mauris, in dapibis eros, vivamus malesuada ipsum volutpat ets nibh ligula.</p>
                            </div>
                            <!--end fourcol -->
                    
                            <!--begin fourcol -->
                            <div class="fourcol features_item">
                            	<span class="circle_icons"><i class="fa fa-coffee"></i></span>
                                <h5>Free Coffee</h5>
                                <p>Pellentesque in laoret mauris, in dapibis eros, vivamus malesuada ipsum volutpat ets nibh ligula.</p>
                            </div>
                            <!--end fourcol -->
                    
                            <!--begin fourcol -->
                            <div class="fourcol features_item last">
                            	<span class="circle_icons"><i class="fa fa-magic"></i></span>
                                <h5>VIP Speakers</h5>
                                <p>Pellentesque in laoret mauris, in dapibis eros, vivamus malesuada ipsum volutpat ets nibh ligula.</p>
                            </div>
                            <!--end fourcol -->
                    
                        </div>
                        <!--end twelvecol -->
                        
                    </div>
                    <!--end row -->
                    
                    <!--begin row -->
                    <div class="row">
                    
                        <!--begin twelvecol -->
                        <div class="twelvecol">
                			
                            <!--begin fourcol -->
                            <div class="fourcol features_item">
                            	<span class="circle_icons"><i class="fa fa-book"></i></span>
                                <h5>Free eBooks</h5>
                                <p >Pellentesque in laoret mauris, in dapibis eros, vivamus malesuada ipsum volutpat ets nibh ligula.</p>
                            </div>
                            <!--end fourcol -->
                    
                            <!--begin fourcol -->
                            <div class="fourcol features_item">
                            	<span class="circle_icons"><i class="fa fa-share-alt"></i></span>
                                <h5>Amazing Community</h5>
                                <p>Pellentesque in laoret mauris, in dapibis eros, vivamus malesuada ipsum volutpat ets nibh ligula.</p>
                            </div>
                            <!--end fourcol -->
                    
                            <!--begin fourcol -->
                            <div class="fourcol features_item last">
                            	<span class="circle_icons"><i class="fa fa-camera-retro"></i></span>
                                <h5>Video Courses</h5>
                                <p>Pellentesque in laoret mauris, in dapibis eros, vivamus malesuada ipsum volutpat ets nibh ligula.</p>
                            </div>
                            <!--end fourcol -->
                    
                        </div>
                        <!--end twelvecol -->
                        
                    </div>
                    <!--end row -->
                    
                </div>                
                <!--end white_box -->         
               
                
            </div>
            <div class="container375 meetOurSpeakerPeople"">
                
                <div class="container100">
                    <h4>Plenary SPEAKERS​</h4>
                    <div class="row">
                        <div class="twelvecol">
                            @if (isset($home) && isset($home->speakers) && isset($home->speakers['name']))
                                @foreach ($home->speakers['name'] as $key => $speaker_name)
                                    <a href="{{ isset($home->speakers['link'][$key]) ? $home->speakers['link'][$key] : '' }}" class="fourcol mb-0 @if ($loop->last)last @endif" target="_blank">
                                        <div class="speaker-item">
                                            <img src="{{ asset(isset($home->speakers['image'][$key]) ? $home->speakers['image'][$key] : '') }}" class="team_pic" />
                                            <div class="team_description">
                                                <h4 class="team_name">{{ $speaker_name }}
                                                <br><span> {{ isset($home->speakers['institution'][$key]) ? $home->speakers['institution'][$key] : '' }}</span></h4>
                                            </div>
                                        </div>
                                    </a>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <!--end section_box -->
            <div class="container375 speaker-slider">
                 <!--begin row -->
                 <div class="row">
                    <h4>KEYNOTE SPEAKERS​</h4>
                    <!--begin twelvecol -->
                    <div class="twelvecol">
                        
                        <div id="owl-example" class="owl-carousel">
            
                            <div class="carousel_item">
                                <img src="{{ asset('frontend/images/team4.png') }}" alt="Team Picture" class="team_pic">
                                <!--begin team_description -->
                                <div class="team_description">
                                    <h4 class="team_name">Prof. Zhang​ Yamei <br><span>Southeast University, China</span></h4>
                                </div>
                                <!--end team_description -->
                            </div>
            
                            <div class="carousel_item">
                                <img src="{{ asset('frontend/images/team5.png') }}" alt="Team Picture" class="team_pic">
                                <!--begin team_description -->
                                <div class="team_description">
                                    <h4 class="team_name textdec-none">Ir. KAN Jun<br><span>    China Road and Bridge Engineering, China</span></h4>
                                </div>
                                <!--end team_description -->
                            </div>
            
                            <div class="carousel_item">
                                <img src="{{ asset('frontend/images/team6.png') }}" alt="Team Picture" class="team_pic">
                                <!--begin team_description -->
                                <div class="team_description">
                                    <h4 class="team_name textdec-none">Ms. NIE JULIE
                                        <br><span>Elion Foundation, Hong Kong</span></h4>
                                </div>
                                <!--end team_description -->
                            </div>
            
                            <div class="carousel_item">
                                <img src="{{ asset('frontend/images/team7.png') }}" alt="Team Picture" class="team_pic">
                                <!--begin team_description -->
                                <div class="team_description">
                                    <h4 class="team_name">Prof. Liu Jiaping
                                       <br><span> Southeast University/Sobute New Materials Co., Ltd., China</span></h4>
                                </div>
                                <!--end team_description -->
                            </div>
                            <div class="carousel_item">
                                <img src="{{ asset('frontend/images/team4.png') }}" alt="Team Picture" class="team_pic">
                                <!--begin team_description -->
                                <div class="team_description">
                                    <h4 class="team_name">Prof. Zhang​ Yamei <br><span>Southeast University, China</span></h4>
                                </div>
                                <!--end team_description -->
                            </div>
            
                            <div class="carousel_item">
                                <img src="{{ asset('frontend/images/team5.png') }}" alt="Team Picture" class="team_pic">
                                <!--begin team_description -->
                                <div class="team_description">
                                    <h4 class="team_name textdec-none">Ir. KAN Jun ​<br><span>    China Road and Bridge Engineering, China</span></h4>
                                </div>
                                <!--end team_description -->
                            </div>
            
                            <div class="carousel_item">
                                <img src="{{ asset('frontend/images/team6.png') }}" alt="Team Picture" class="team_pic">
                                <!--begin team_description -->
                                <div class="team_description">
                                    <h4 class="team_name textdec-none">Ms. NIE JULIE
                                        <br><span>Elion Foundation, Hong Kong</span></h4>
                                </div>
                                <!--end team_description -->
                            </div>
            
                            <div class="carousel_item">
                                <img src="{{ asset('frontend/images/team7.png') }}" alt="Team Picture" class="team_pic">
                                <!--begin team_description -->
                                <div class="team_description">
                                    <h4 class="team_name">Prof. Liu Jiaping
                                       <br><span> Southeast University/Sobute New Materials Co., Ltd., China</span></h4>
                                </div>
                                <!--end team_description -->
                            </div>
            
                        </div>
               
                    </div>
                    <!--end twelvecol -->
                    
                </div>
                <!--end row -->
            </div>
             
        </div>
        <!--end section_wrapper -->
        
        <!--begin parallax_wrapper -->
        <div class="parallax_wrapper hidden">
            
            <!--begin parallax_box -->
            <div class="">

                <div id="pricing" class="call_to_action_grey_wrapper">
            
                    <!--begin call_to_action_white -->
                    <div class="call_to_action_white">
                        <h3>CHOOSE THE PACKAGE THAT SUIT YOUR NEEDS</h3>
                        <h4>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration,<br>by injected humour, or new randomised words which don't look even slightly believable.</h4>
                    </div>
                    <!--end call_to_action_white -->
                        
                </div>
                <!--end call_to_action_white_wrapper -->
          
                <!--begin section_wrapper -->
                <div class=" ">
                    
                    <!--begin section_box -->
                    <div class="container578 pricing">
                   
                        <!--begin row -->
                        <div class="row">
                        
                            <!--begin twelvecol -->
                            <div class="twelvecol">
                            
                                <!--begin price_item -->
                                <div class="sixcol price_item">
                                 
                                    <div class="price_head">
                                        <h2>Regular ATTENDEE</h2>
                                        <h4>HK$ 800</h4>
                                    </div>
                                    
                                    <ul class="price_features"> 
                                        <li>Proceedings (Online)</li> 
                                        <li>Book of Abstract (Hardcopy)</li>
                                        <li>Free Coffees</li>
                                        <li>Free Lunches</li>
                                        <li>Free Conference Banquet</li>
                                    </ul>  
                                                              
                                    <div class="price_button_wrapper">
                                        <a href="#" class="price_button">register today</a>
                                    </div>
                                    
                                </div>
                                <!--end price_item -->
                                
                                <!--begin price_item -->
                                <div class="sixcol last price_item">
                                 
                                    <div class="price_head blue_head">
                                        <h2>STUDENT PASS (full-time)</h2>
                                        <h4>HK$ 550</h4>
                                    </div>
                                    
                                    <ul class="price_features">  
                                        <li>Proceedings (Online)</li>
                                        <li>Book of Abstract (Hardcopy)</li>
                                        <li>Free Coffees</li>
                                        <li>Free Lunches</li>
                                        <li>Free Conference Banquet</li>
                                    </ul>  
                                                              
                                    <div class="price_button_wrapper">
                                        <a href="#" class="price_button price_blue">Subscribe today</a>
                                    </div>
                                    
                                </div>
                                <!--end price_item -->    
                            </div>
                            <!--end twelvecol -->
                            
                        </div>
                        <!--end row -->
                        
                    </div>
                    <!--end section_box -->
                     
                </div> 
            </div>
            <!--end parallax_box -->
                
        </div>
        <!--end parallax_wrapper -->
        <div class="latest-news container375 hidden">
            <h3>LATEST NEWS</h3>
            <div class="row">
                    
                <!--begin twelvecol -->
                <div class="twelvecol">
                    
                    <div id="owl-latest" class="owl-carousel">
        
                        <div class="carousel_item">
                            <img src="{{ asset('frontend/images/latest.png') }}" alt="Team Picture" class="team_pic">
                            <!--begin team_description -->
                            <div class="team_description">
                                <h4 class="team_name">Vorem ipsum dolor sit amet, consectetur adipiscing elit</h4>
                                <p>Worem ipsum dolor sit amet, consectetur adipiscing elit. Nunc vulputate libero et velit interdum, ac aliquet odio mattis. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Curabitur tempus urna at turpis condimentum lobortis.</p>
                            </div>
                            <!--end team_description -->
                        </div>
                        <div class="carousel_item">
                            <img src="{{ asset('frontend/images/latest1.png') }}" alt="Team Picture" class="team_pic">
                            <!--begin team_description -->
                            <div class="team_description">
                                <h4 class="team_name">Vorem ipsum dolor sit amet, consectetur adipiscing elit</h4>
                                <p>Worem ipsum dolor sit amet, consectetur adipiscing elit. Nunc vulputate libero et velit interdum, ac aliquet odio mattis. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Curabitur tempus urna at turpis condimentum lobortis.</p>
                            </div>
                            <!--end team_description -->
                        </div>
                        <div class="carousel_item">
                            <img src="{{ asset('frontend/images/latest2.png') }}" alt="Team Picture" class="team_pic">
                            <!--begin team_description -->
                            <div class="team_description">
                                <h4 class="team_name">Vorem ipsum dolor sit amet, consectetur adipiscing elit</h4>
                                <p>Worem ipsum dolor sit amet, consectetur adipiscing elit. Nunc vulputate libero et velit interdum, ac aliquet odio mattis. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Curabitur tempus urna at turpis condimentum lobortis.</p>
                            </div>
                            <!--end team_description -->
                        </div>
                        <div class="carousel_item">
                            <img src="{{ asset('frontend/images/latest.png') }}" alt="Team Picture" class="team_pic">
                            <!--begin team_description -->
                            <div class="team_description">
                                <h4 class="team_name">Vorem ipsum dolor sit amet, consectetur adipiscing elit</h4>
                                <p>Worem ipsum dolor sit amet, consectetur adipiscing elit. Nunc vulputate libero et velit interdum, ac aliquet odio mattis. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Curabitur tempus urna at turpis condimentum lobortis.</p>
                            </div>
                            <!--end team_description -->
                        </div>
                        <div class="carousel_item">
                            <img src="{{ asset('frontend/images/latest1.png') }}" alt="Team Picture" class="team_pic">
                            <!--begin team_description -->
                            <div class="team_description">
                                <h4 class="team_name">Vorem ipsum dolor sit amet, consectetur adipiscing elit</h4>
                                <p>Worem ipsum dolor sit amet, consectetur adipiscing elit. Nunc vulputate libero et velit interdum, ac aliquet odio mattis. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Curabitur tempus urna at turpis condimentum lobortis.</p>
                            </div>
                            <!--end team_description -->
                        </div>
                        <div class="carousel_item">
                            <img src="{{ asset('frontend/images/latest2.png') }}" alt="Team Picture" class="team_pic">
                            <!--begin team_description -->
                            <div class="team_description">
                                <h4 class="team_name">Vorem ipsum dolor sit amet, consectetur adipiscing elit</h4>
                                <p>Worem ipsum dolor sit amet, consectetur adipiscing elit. Nunc vulputate libero et velit interdum, ac aliquet odio mattis. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Curabitur tempus urna at turpis condimentum lobortis.</p>
                            </div>
                            <!--end team_description -->
                        </div>
        
                    </div>
           
                </div>
                <!--end twelvecol -->
                
            </div>
        </div>
        <!--begin call_to_action_white_wrapper -->
       
        <!--end section_wrapper -->
@endsection
           
 