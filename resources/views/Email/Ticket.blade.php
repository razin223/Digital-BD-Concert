<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Bengali:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    </head>
    <body>
        <table style="font-family: 'Noto Sans Bengali','Helvetica Neue',Helvetica,Arial,'Lucida Grande',sans-serif;border: solid lightgray 1px; background-color: transparent; max-width: 450px; margin:  0px auto" cellpadding="0" cellspacing="0">
            <tbody>
                <tr>
                    <td style="text-align: center">
                        <img src="{{url("/")}}/assets/digital-bd.png" style="width: 300px; margin-bottom: 30px;"/>
                    </td>
                </tr>

                <tr>

                    <td style="padding: 10px; text-align: justify">
                        <p>প্রিয় {{$details['name']}},<br/><br/>

                            ডিজিটাল বাংলাদেশ দিবস ২০২১ কনসার্টে নিবন্ধনের জন্য আপনাকে ধন্যবাদ। আপনার টিকিটটি এই ইমেইলের সাথে সংযুক্ত আছে। 

                        </p>



                        <p style=" color: #000; display: block; background-color: yellow; margin: 30px auto; text-decoration: none; font-size: 1.5rem; text-align: center; padding: 10px 0px; width: 90%; border-radius: 10px;">Ticket No: {{$details['ticket']}}</p>

                        <p>ধন‌্যবাদান্তে<br/>ডিজিটাল বাংলাদেশ দিবস ২০২১ কনসার্ট সাপোর্ট টিম</p>
                    </td>
                </tr>
                <tr>

                    <td>
        <!--                <img src="{{url("/")}}/assets/img/email_footer.png" style="width: 100%"/>-->
                    </td>

                </tr>
            </tbody>
        </table>
    </body>
</html>