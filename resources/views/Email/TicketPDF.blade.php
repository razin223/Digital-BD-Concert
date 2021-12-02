<table style="font-family: 'Helvetica Neue',Helvetica,Arial,'Lucida Grande',sans-serif;border: solid lightgray 1px; background-color: transparent; max-width: 450px; margin:  0px auto" cellpadding="0" cellspacing="0">
    <tbody>
        <tr>
            <td style="text-align: center">
                <img src="{{url("/")}}/assets/digital-bd.png" style="width: 300px; margin-bottom: 30px;"/>
            </td>
        </tr>

        <tr>

            <td style="padding: 10px; text-align: justify">

                <h3 style="text-align: center">ডিজিটাল বাংলাদেশ দিবস ২০২১ কনসার্ট</h3>

                <table style="border: solid black 1px" cellpadding="0" cellspacing="0">
                    <tr>
                        <td>নাম: </td>
                        <td>{{$details['name']}}</td>
                    </tr>
                    <tr>
                        <td>ইমেইল: </td>
                        <td>{{$details['email']}}</td>
                    </tr>
                    <tr>
                        <td>মোবাইল নং: </td>
                        <td>{{$details['mobile_number']}}</td>
                    </tr>
                </table>

                <p style=" color: #000; display: block; background-color: yellow; margin: 30px auto; text-decoration: none; font-size: 1.5rem; text-align: center; padding: 10px 0px; width: 90%; border-radius: 10px;">Ticket No: {{$details['ticket']}}</p>

                <p>&nbsp;</p>

                <p><img src="data:image/png;base64, {!! $details['ticket_qr'] !!}"></p>
            </td>
        </tr>
        <tr>

            <td>

            </td>

        </tr>
    </tbody>
</table>