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

                    আপনার পাসওয়ার্ড নতুন করে সেট করা হয়েছে। নতুন পাসওয়ার্ড নিচে দেওয়া হল।
                    <br/><br/>
                    <h3>পাসওয়ার্ড: {{$details['password']}}</h3>
                    
                    
                    <h3 style="color: red">সাইন ইন করার পরে পাসওয়ার্ড নতুন করে পরিবর্তন করে নিতে ভুলবেন না।</h3> 
                </p>


                <a href="{{route('login')}}" style=" color: #000; display: block; background-color: yellow; margin: 30px auto; text-decoration: none; font-size: 1.5rem; text-align: center; padding: 10px 0px; width: 90%; border-radius: 10px;">সাইন ইন করুন।</a>

                <p>
                    যদি বাটন কাজ না করে তবে নিচের লিংকটি ব‌্যবহার করুন।:<br/>
                    {{route('login')}}
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