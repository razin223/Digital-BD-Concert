
<table style="font-family: 'Helvetica Neue',Helvetica,Arial,'Lucida Grande',sans-serif;border: solid lightgray 1px; background-color: transparent; max-width: 450px; margin:  0px auto" cellpadding="0" cellspacing="0">
    <tbody>
        <tr>
            <td style="text-align: center">
                <img src="{{url("/")}}/assets/digital-bd.png" style="width: 300px; margin-bottom: 30px;"/>
            </td>
        </tr>

        <tr>

            <td style="padding: 10px; text-align: justify">
                <p>প্রিয় {{$details['name']}},<br/><br/>

                    সম্ভবত আপনি আপনার পাসওয়ার্ড ভুলে গেছেন। দুশ্চিন্তা করার কোন প্রয়োজন নেই। নিচের বাটনটি ক্লিক করে পাসওয়ার্ডটি পুনরায় সেট করে নিন।
                    <br/><br/>
                    *যদি পাসওয়ার্ড সংক্রান্ত সমস‌্যা ইতিমধ‌্যে সমাধান হয়ে থাকে তবে এই ইমেইলটি উপেক্ষা করুন।
                </p>


                <a href="{{route('reset_password',['id'=>$details['id'],'code'=>$details['code']])}}" style=" color: #000; display: block; background-color: yellow; margin: 30px auto; text-decoration: none; font-size: 1.5rem; text-align: center; padding: 10px 0px; width: 90%; border-radius: 10px;">পাসওয়ার্ড সেট করুন।</a>

                <p>
                    যদি বাটন কাজ না করে তবে নিচের লিংকটি ব‌্যবহার করুন।:<br/>
                    {{route('reset_password',['id'=>$details['id'],'code'=>$details['code']])}}
                </p>
                <p>
                    যদি কোন ধরণের সমস‌্যার সম্মুখিন হন তবে এই ইমেইলে যোগাযোগ করুন। 
                </p>

                <p>ধন‌্যবাদান্তে<br/> ডিজিটাল বাংলাদেশ দিবস ২০২১ অনলাইন কুইজ প্রতিযোগিতা সাপোর্ট টিম</p>
            </td>

        </tr>
        <tr>

            <td>
<!--                <img src="{{url("/")}}/assets/img/email_footer.png" style="width: 100%"/>-->
            </td>

        </tr>
    </tbody>
</table>