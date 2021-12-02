<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    </head>
    <body>
        <table style="font-family: 'Helvetica Neue',Helvetica,Arial,'Lucida Grande',sans-serif;border: solid lightgray 1px; background-color: transparent; max-width: 600; margin:  0px auto" cellpadding="0" cellspacing="0">
            <tbody>
                <tr>
                    <td style="text-align: center">
                        <img src="{{url("/")}}/assets/digital-bd.png" style="width: 300px; margin-bottom: 30px;"/>
                    </td>
                </tr>

                <tr>

                    <td style="padding: 10px; text-align: justify">

                        <h2 style="text-align: center; color: red">CONCERT TICKET</h2>

                        <p style="text-align: center">
                            <img src="{{url("/")}}/assets/digital-bd-day.jpeg" style="width: 300px; margin-bottom: 30px;"/>
                        </p>


                        <p style=" color: #000; display: block; background-color: yellow; margin: 30px auto; text-decoration: none; font-size: 1.5rem; text-align: center; padding: 10px 0px; width: 90%; border-radius: 10px;">Ticket No: {{$details['ticket']}}</p>

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
    </body>
</html>