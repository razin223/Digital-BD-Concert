<table style="font-family: 'Helvetica Neue',Helvetica,Arial,'Lucida Grande',sans-serif;border: solid lightgray 1px; background-color: rgba(0,0,255,0.1); max-width: 600px; margin:  0px auto" cellpadding="0" cellspacing="0">
    <tbody>
        <tr>
            <td style="text-align: center">
                <img src="{{url("/")}}/assets/digital-bd.png" style="width: 300px; margin-bottom: 30px;"/>
            </td>
        </tr>

        <tr>

            <td style="padding: 10px; text-align: justify">

                <h3 style="text-align: center; color:  #006622">Digital Bangladesh Day 2021</h3>
                <h2 style="text-align: center; color:  FF0000; margin-top: 10px">TICKET</h2>



                <p style=" color: #000; display: block; background-color: yellow; margin: 30px auto; text-decoration: none; font-size: 1.5rem; text-align: center; padding: 10px 0px; width: 90%; border-radius: 10px;">Ticket No<br/> {{$details['ticket']}}</p>

                <p>&nbsp;</p>

                <p style="text-align: center"><img src="data:image/png;base64, {!! $details['ticket_qr'] !!}"></p>
            </td>
        </tr>
        <tr>

            <td>

            </td>

        </tr>
    </tbody>
</table>