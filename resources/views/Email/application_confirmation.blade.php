<table style="font-family: 'Helvetica Neue',Helvetica,Arial,'Lucida Grande',sans-serif;border: solid lightgray 1px; background-color: transparent; max-width: 450px; margin:  0px auto" cellpadding="0" cellspacing="0">
    <tbody>
        <tr>
            <td style="text-align: center">
                <img src="{{url("/")}}/assets/img/BIG.png?{{time()}}" style="width: 300px; margin-bottom: 30px;"/>
            </td>
        </tr>

        <tr>

            <td style="padding: 10px; text-align: justify">
                <p>Dear {{$details['name']}},<br/><br/>


                    Congratulations, your application for BIG 2021 at <b>{{$details['category']}}</b> has been successfully completed. For further information and update keep an eye on our website. 


                </p>


                <a href="{{url("/")}}" style=" color: #000; display: block; background-color: yellow; margin: 30px auto; text-decoration: none; font-size: 1.5rem; text-align: center; padding: 10px 0px; width: 90%; border-radius: 10px;">Website Link</a>

                <p>
                    If you are having any issues kindly reach out to us by replying to this email. 
                </p>

                <p>Thanking you<br/>BIG Support Team</p>
            </td>

        </tr>
        <tr>

            <td>
                <img src="{{url("/")}}/assets/img/email_footer.png" style="width: 100%"/>
            </td>

        </tr>
    </tbody>
</table>