@if (Route::currentRouteName() == 'front.venue' || Route::currentRouteName() == 'front.committee')
    <footer id="footer">
                
        <!--begin row -->
        <div class="row">
            
            <!--begin twelvecol -->
            <div class="twelvecol">  
            
                <!--begin copyright -->            
                <p class="copyright">©2024 City University of Hong Kong. All Rights Reserved.  &amp;  <a href="https://visibleone.com/" target="_blank">Site by Visible One.</a></p>
                <!--end copyright -->
            
            <!--begin social icons -->
            <ul class="social">
                <li>
                    <a href="https://www.cityu.edu.hk/web/privacy" target="_blank">
                        Privacy Policy
                    </a>
                </li>
                <li>
                    <a href="https://www.cityu.edu.hk/web/copyright" target="_blank">
                        Copyright
                    </a>
                </li>
                <li>
                    <a href="https://www.cityu.edu.hk/web/disclaimer" target="_blank">
                        Disclaimer
                    </a>
                </li>
                
            </ul>
            <!--end social icons -->
            
            </div>
            <!--end twelvecol -->
            
        </div>
        <!--end row -->

    </footer>
@else
    <!--begin contact_wrapper -->
    <div id="contact" class="contact_wrapper">
        
        <!--begin contact_box -->
        <div class="contact_box">

            <img src="{{ asset('frontend/images/mail.svg') }}" /><br>
            <h5 class="contact_title">If you have any questions, please contact</h5>
            <p class="contact_details hidden">Your Company Name, No.917,Oxford Street, London, UK</p>
            <p class="contact_details hidden">(+44) 987-654-321 / (+44) 021-123-456-789</p>
            <a href="mailto:5ic3dcp@mingfocus.com" class="contact_details">5ic3dcp@mingfocus.com</a>
            <!-- <a href="#" class="button_transparent">Subscribe today</a> -->
            
        </div>
        <!--end contact_box -->
            
    </div>
    <!--end contact_wrapper -->
    <footer id="footer">
            
        <!--begin row -->
        <div class="row">
            
            <!--begin twelvecol -->
            <div class="twelvecol">  
            
                <!--begin copyright -->            
                <p class="copyright">©2024 City University of Hong Kong. All Rights Reserved.  &amp;  <a href="https://visibleone.com/" target="_blank">Site by Visible One.</a></p>
                <!--end copyright -->
            
            <!--begin social icons -->
            <ul class="social">
                <li>
                    <a href="https://www.cityu.edu.hk/web/privacy" target="_blank">
                        Privacy Policy
                    </a>
                </li>
                <li>
                    <a href="https://www.cityu.edu.hk/web/copyright" target="_blank">
                        Copyright
                    </a>
                </li>
                <li>
                    <a href="https://www.cityu.edu.hk/web/disclaimer" target="_blank">
                        Disclaimer
                    </a>
                </li>
                
            </ul>
            <!--end social icons -->
            
            </div>
            <!--end twelvecol -->
            
        </div>
        <!--end row -->

    </footer>
@endif