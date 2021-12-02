<table style="font-family: 'Helvetica Neue',Helvetica,Arial,'Lucida Grande',sans-serif;border: solid lightgray 1px; background-color: transparent; max-width: 450px; margin:  0px auto" cellpadding="0" cellspacing="0">
    <tbody>
        <tr>
            <td style="text-align: center">
                <img src="{{asset('assets/img/mujib_olympiad_logo.png')}}" style="width: 300px; margin-bottom: 30px;"/>
            </td>
        </tr>

        <tr>

            <td style="padding: 10px; text-align: justify">
                <p>Dear User,<br/><br/>
                    Thank you for sign up in Mujib Olympiad. You've to verify your email to use your account. To verify email address and to participate in Mujib Olympiad, click the button below.
                    
 
                </p>


                <a href="{{route('en.email_verify',['id'=>$details['id'],'code'=>$details['code']])}}" style=" color: #000; display: block; background-color: yellow; margin: 30px auto; text-decoration: none; font-size: 1.5rem; text-align: center; padding: 10px 0px; width: 90%; border-radius: 10px;">Verify Email Address.</a>

                <p>
                    If the button does not work use the link below:<br/>
                    {{route('en.email_verify',['id'=>$details['id'],'code'=>$details['code']])}}
                </p>
                <p>
                    If you face any issue, contact this email.
                </p>

                <p>Thanking you<br/>Mujib Olympiad Support Team</p>
            </td>

        </tr>
        <tr>

            <td>
<!--                <img src="{{url("/")}}/assets/img/email_footer.png" style="width: 100%"/>-->
            </td>

        </tr>
    </tbody>
</table>