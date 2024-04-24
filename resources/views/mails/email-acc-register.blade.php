<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <title>CityU ACE Conference</title>
        <link rel="shortcut icon" href="{{ asset('frontend/img/favicon.ico') }}" type="image/x-icon">
        <link rel="icon" href="{{ asset('frontend/img/favicon.ico') }}" type="image/x-icon">
    </head>        
  <body>
    <div> 
        <div>
    <table cellspcing="0" cellpadding="0" width="580px" align="center" border="0" style="margin: 0 30px; margin: 0 auto; border-collapse: collapse; border-spacing: 0;">
        <tr>
            <td style="background-color: #EEEEEE!important; padding: 0;">
                <table cellspcing="0" cellpadding="0" align="center" border="0" style="margin: 0 auto; width: 100%; border-collapse: collapse; border-spacing: 0; padding: 0;">
                    <tr>
                        <td style="text-align: center; padding: 32px 0;">
                            <img src="{{ $message->embed('frontend/images/email/email-logo.png') }}" alt="logo" >
                            <img src="{{ $message->embed('frontend/images/email/email-logo-2.png') }}" alt="logo" >
                        </td>
                    </tr>
                    
                    <tr>
                        <td style="padding: 0;">
                            <table class="test" bgColor="white" width="510px" style="border-top-right-radius: 25px; border-top-left-radius: 25px; background-color: white; width: 510px; margin: 0 auto; padding: 0; border-collapse: collapse; border-spacing: 0;box-shadow: 0px 0px 21px 0px rgb(0 0 0 / 5%);filter: drop-shadow(0px 0px 21px 0px rgb(0 0 0 / 5%))">
                                <tr>
                                    <td style="padding-top: 40px; padding-bottom: 20px; text-align: center;">
                                        <img src="{{ $message->embed('frontend/images/email/right.png') }}" alt="">
                                    </td>
                                </tr>
                                <tr>
                                    <td style="text-align: center; font-size: 18px; font-weight: 600; color: #54301A; padding-bottom: 36px;">
                                        You have successfully created an account.
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>

        <tr>
            <td style="background-color: #BF165E!important; margin: 0 auto; padding: 0;">
                <table cellspcing="0" cellpadding="0" align="center" border="0" style="border-collapse: collapse; border-spacing: 0; padding: 0; ">
                    <tr>
                        <td style="padding: 0;">
                            <table bgColor="white" width="510px" style="border-bottom-right-radius: 25px; border-bottom-left-radius: 25px; background-color: white; width: 510px; margin: 0 auto; border-collapse: collapse; border-spacing: 0; padding: 0;box-shadow: 0px 0px -2px 5px rgba(0, 0, 0, 0.05); ">                                
                                <tr>
                                    <td style="padding: 0 36px 20px; font-size: 16px; color: #656565;">
                                        Hello, <b>{{ $member->name }}</b>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding: 0 36px 20px; font-size: 16px; font-weight: 400; color: #656565;">You have successfully created an account at {{ $member->created_date ? date('d F Y, H:i', strtotime($member->created_date)) : '' }}.</td>
                                </tr>
                                
                                <tr>
                                    <td style="padding: 0 36px 48px; font-size: 16px;color: #656565;">
                                        If you have any questions, just reply to this email—we're always happy to help out.
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding: 0 36px 12px; font-size: 16px; font-weight: 400; color: #656565;">
                                        Cheers,
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding: 0 36px 40px; font-size: 16px; font-weight: 400; color: #656565;">
                                        <b>Department of Architecture and Civil Engineering,</b>
                                        City University of Hong Kong
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding: 32px 0;">
                            <table style="width: 510px; margin: 0 auto; border-collapse: collapse; border-spacing: 0; padding: 0;">
                                <tbody>
                                    <tr>
                                        <td style="padding: 0px 30px; font-size: 14px; font-weight: 400; color: white; text-align: center;">
                                            ©2024 City University of Hong Kong. All Rights Reserved.
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="padding: 0 30px; text-align: center;">
                                            <table style=" width: 270px; margin: 0 auto; border-collapse: collapse; border-spacing: 0; padding: 0;">
                                                <tr>
                                                    <td style="text-align: right;">
                                                        <a href="https://www.cityu.edu.hk/web/privacy" target="_blank" style="font-size: 14px; font-weight: 400; color: white; text-align: center;text-decoration: none;">Privacy Policy</a>
                                                    </td>
                                                    <td style="text-align: center;">
                                                        <a href="https://www.cityu.edu.hk/web/copyright" target="_blank" style="font-size: 14px; font-weight: 400; color: white; text-align: center;text-decoration: none;">Copyright</a>
                                                    </td>
                                                    <td style="text-align: left;">
                                                        <a href="https://www.cityu.edu.hk/web/disclaimer" target="_blank" style="font-size: 14px; font-weight: 400; color: white; text-align: center;text-decoration: none;">Disclaimer</a>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                   
                                </tbody>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</div>      
    </div>
  </body>
</html>