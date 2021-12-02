
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
                    
                    Probably you forgot your password. No need to worry. Reset your password by clicking the button below.
                   
                    <br/><br/>
                    * If you solve your password problem already, ignore this email.
                    
                </p>


                <a href="{{route('en.reset_password',['id'=>$details['id'],'code'=>$details['code']])}}" style=" color: #000; display: block; background-color: yellow; margin: 30px auto; text-decoration: none; font-size: 1.5rem; text-align: center; padding: 10px 0px; width: 90%; border-radius: 10px;">Reset Password</a>

                <p>
                    If the button does not work, use the link below.
                    {{route('en.reset_password',['id'=>$details['id'],'code'=>$details['code']])}}
                </p>
                <p>
                    If you face any problem, please contact email address.
                    
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