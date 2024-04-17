@php
$header_logo = get_setting('header_logo');

@endphp
<div  style="width:70%; background:#ffffff; padding:30px 20px; text-align:left; font-family: 'Arial', sans-serif; margin:0 auto;">
     
      
      <a href="{{ route('home') }}">
    <img src="{{ uploaded_asset($header_logo) }}" width="200" height="50" style=" margin-bottom:3px;">
    </a>

    <h1 style="font-size:16px; line-height:22px; font-weight:normal; color:#900000;">
        {{$array['subject']}}
    </h1>

  



  
    

   <p style="font-size:16px; line-height:24px; color:#666666; margin-bottom:30px;">
   A request to reset your password was recently submitted. Click the link below to create a new password.
If you did not make this request, please ignore this email.
   </p> 

   <p style="font-size:16px; line-height:24px; color:#666666; margin-bottom:30px;">
   If you need further assistance, contact us at https://mirrormefashion.com/support.
   </p> 

    <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
            <td style="  display: inline-block;">
                <table border="0" cellspacing="0" cellpadding="0">
                    <tr>
                        <td bgcolor="#900000" style="padding: 12px 26px 12px 26px; border-radius:4px; margin:auto;  ">
                            <a href="{{route('password.reset',['email'=>$email,'code'=>$code])}}" target="_blank"
                                style="font-family: 'Arial', sans-serif; font-size: 14px; font-weight: bold; color: #ffffff; text-decoration: none; ">
                               Update Password
                            </a>
                        </td>
                    </tr>
                </table>
            </td>

        </tr>
        <tr>
            <td width="100%" height="30">&nbsp;</td>
        </tr>
    </table>





</div>
<footer style="text-align:center">
    <hr style="border:none; height:3px; color:#dddddd; background:#900000; width:100%; margin-bottom:20px;">

    <a href="{{ route('home') }}">
        <img src="{{ uploaded_asset($header_logo) }}" width="200" height="50" style=" margin-bottom:3px;">
    </a>
    <p style="font-size:12px; line-height:18px; color:#999999; margin-bottom:10px;">
        &copy; Copyright 2022

        Mirror Me Fashion, LLC
    </p>
    <p style="color:#900000">
        You receive this email because you’ve used <a href="{{ route('home') }}" style="color:#900000">Mirror Me
            Fashion.</a>
        Read our <a href="{{ url('privacy') }}" style="color:#900000">Privacy</a> and <a href="{{ url('terms') }}"
            style="color:#900000">Terms</a> of Service to
        learn more.
    </p>
</footer>
