<header id="header_wrapper" >            
    <!--begin header -->    
    <div id="header" class="clearfix container100-header">
    
        <!--begin logo -->  
        <div>
            <a href="{{ route('front.home') }}" id="logo">
                <img src="{{ asset('frontend/images/logo-new.svg') }}" alt="Logo">
            </a>
            <a href="https://www.cityu.edu.hk/ace/" id="logo-sec" target="_blank">
                <img src="{{ asset('frontend/images/sec-logo.svg') }}" alt="Logo">
            </a>
        </div>          
        
        <!--end logo -->
            
        <!--begin nav -->
        <ul id="nav">
            <li>
                <a href="{{ route('front.home') }}">Home</a>
            </li>
            <li>
                <a href="https://www.tudelft.nl/citg/over-faculteit/afdelingen/materials-mechanics-management-design-3md/sections-labs/materials-environment/staff/profdrir-e-erik-schlangen/" target="_blank" class="disabled">Call for papers</a>
            </li>
            <li>
                <a href="{{ route('front.committee') }}">Committees</a>
            </li>
            <li>
                <a href="{{ route('front.venue') }}">VENUE</a>
            </li>
            {{-- <li>
                <a href="{{ route('front.home') }}#speaker">Travel</a>
            </li>
            <li>
                <a href="{{ route('front.home') }}#sponsor">sponsors</a>
            </li>
            <li class="hidden">
                <a href="./news.html">NEWS</a>
            </li> --}}
            <li>
                <div class="two-link">
                    {{-- <a href="{{ route('front.get.login') }}" class="disabled">Login/</a> --}}
                    <a href="{{ route('front.get.register') }}">Register</a>
                    <img src="{{ asset('frontend/images/login.svg') }}" />  
                </div>                            
            </li>
        </ul>
        <!--end nav -->
        
    </div>
    <!--end header -->
    
</header>