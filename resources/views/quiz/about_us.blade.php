@extends("quiz_template")

@section("og_content")
<meta property="og:url"                content="{{url()->current()}}" />
<meta property="og:type"               content="website" />
<meta property="og:title"              content="ডিজিটাল বাংলাদেশ কুইজ প্রতিযোগিতা" />
<meta property="og:description"        content="" />
<meta property="og:image"              content="{{asset('assets/digital-bd-day.jpeg')}}" />
@endsection

@section("content")

<style>

    .services .box{
        width: 300px;
        margin-bottom:  30px;
        margin-left: 15px;
        margin-right: 15px;
    }

    .services .icon-box a{
        padding: 5px 0px;
        font-size: 1.5em;
        font-weight: 500;
        color: rgb(68, 68, 68);
    }
    .services .icon-box a:hover{
        color: rgb(68, 68, 68);
        font-weight: 500;
        line-height: 1.2;
    }


    /* CSS */
    .button-63 {
        align-items: center;
        background-image: linear-gradient(144deg,#AF40FF, #5B42F3 50%,#00DDEB);
        border: 0;
        border-radius: 8px;
        box-shadow: rgba(151, 65, 252, 0.2) 0 15px 30px -5px;
        box-sizing: border-box;
        color: #FFFFFF;
        display: inline;
        font-family: Phantomsans, sans-serif;
        font-size: 20px;
        justify-content: center;
        line-height: 1em;
        min-width: 140px;
        padding: 19px 24px;
        text-decoration: none;
        user-select: none;
        -webkit-user-select: none;
        touch-action: manipulation;
        white-space: nowrap;
        cursor: pointer;
    }

    .button-63:active,
    .button-63:hover {
        outline: 0;
        color: rgb(255,255,255);
    }

    @media (min-width: 768px) {
        .button-63 {
            font-size: 24px;
            min-width: 196px;
        }
    }


    h5{
        color: #0067b2;
        font-weight: bold;
    }

</style>

<section class="breadcrumbs">
    <h2 class="text-center">ডিজিটাল বাংলাদেশ দিবস অনলাইন কুইজ প্রতিযোগিতা ২০২১</h2>
</section>
<!-- ======= Cta Section ======= -->
<section class="services" style="background-color: #fff; padding-top: 20px">
    <div class="container">

        <div class="row">
            <div class="col-12 " style=" text-align: justify;">
                <h5>যারা অংশগ্রহণ করতে পারবে:</h5>
                <p>
                    &nbsp;&nbsp;&nbsp;&nbsp;<strong>গ্রুপ ক:</strong> ৮-১২ বছর <br/>
                    &nbsp;&nbsp;&nbsp;&nbsp;<strong>গ্রুপ খ:</strong> ১৩-১৮ বছর<br/>
                    &nbsp;&nbsp;&nbsp;&nbsp;<strong>গ্রুপ গ:</strong> ১৯-তদুর্ধ বছর
                </p>
                <h5>নিবন্ধন:</h5>
                <p>
                    ২৯ নভেম্বর ২০২১ থেকে ০৯ ডিসেম্বর রাত ১১.৫৯ মিনিট পর্যন্ত অনলাইনে (quiz.digitalbangladesh.gov.bd) নিবন্ধন করা যাবে।
                </p>
                <h5>অনলাইন প্রতিযোগিতা:</h5>
                <p>
                    তিনটি গ্রুপের প্রতিযোগিতা ১০ ডিসেম্বর ২০২১, সন্ধ্যা ৭টা থেকে ৮টার মধ্যে যে কোনো ২১ মিনিট অনুষ্ঠিত হবে।
                </p>
                <h5>পুরস্কার: সর্বমোট ২১টি পুরস্কার</h5>
                <p>

                    তিনটি গ্রুপের (ক, খ, গ) ৭জন করে সর্বমোট ২১জনকে বিজয়ী হিসেবে নির্বাচন করা হবে। <br/>
                    বিজয়ীদের জন্য থাকবে অত্যাধুনিক ও আকর্ষণীয় ল্যাপটপ।<br/>

                    <strong>১ম পুরস্কার:</strong> ল্যাপটপ কোর আই ৭, ১০ জেনারেশন<br/>
                    <strong>২য় পুরস্কার:</strong> ল্যাপটপ কোর আই ৭, ৮ জেনারেশন<br/>
                    <strong>৩য় পুরস্কার:</strong> ল্যাপটপ কোর আই ৫, ১০ জেনারেশন<br/>
                    <strong>৪র্থ পুরস্কার:</strong> ল্যাপটপ কোর আই ৩, ১০ জেনারেশন<br/>
                    <strong>৫ম- ৭ম পুরস্কার:</strong> স্মার্ট ফোন<br/>

                <ul>
                    <li>কুইজ প্রতিযোগিতাটি তিনটি গ্রুপে (৮-১২; ১৩-১৮ এবং ১৮-তদুর্ধ) বছর বয়সীদের জন্য উন্মুক্ত।</li>
                    <li>একজন প্রতিযোগী একবারই অংশগ্রহণ করতে পারবেন।</li>
                    <li>ভুল/মিথ্যা তথ্য দিয়ে অংশগ্রহণ করলে তাকে প্রতিযোগিতা থেকে বাতিল বলে গণ্য করা হবে।</li>
                </ul>

                </p>
                <h5>নিয়মাবলি:</h5>
                <p>
                <ul>
                    <li>প্রত্যেকের জন্য বরাদ্দকৃত সময় ২১ মিনিট।</li>
                    <li>সকল প্রশ্নের মান সমান (১ পয়েন্ট)। তবে প্রতিটি ভুল উত্তরের জন্য এক চতুর্থাংশ (০.২৫) পয়েন্ট কাটা যাবে।</li>
                    <li>সকল প্রশ্নের উত্তরের জন্য চারটি বিকল্প থেকে একটি সঠিক উত্তর বাছাই করতে হবে (এমসিকিউ)।</li>
                    <li>কম সময়ে সর্বোচ্চ সংখ্যক উত্তরদাতা থেকে বিজয়ী নির্বাচন করা হবে।</li>
                    <li>চূড়ান্ত বিজয়ীদের ক্ষেত্রে বয়স যাচাই সাপেক্ষে পুরস্কার প্রদান করা হবে।</li>
                    <li>প্রতিযোগিতা বাস্তবায়নের সঙ্গে প্রত্যক্ষ বা পরোক্ষভাবে সম্পৃক্ত ব্যক্তি ও পরিবারবর্গ প্রতিযোগিতায় অংশগ্রহণ করতে পারবেন না।</li>
                </ul>

                </p>

                <h5>কুইজের বিষয়:</h5>
                <p>জাতির পিতা বঙ্গবন্ধু শেখ মুজিবুর রহমানের জীবনাদর্শ, মুজিববর্ষ, ডিজিটাল বাংলাদেশ দিবস, ডিজিটাল বাংলাদেশ রূপকল্প, ডিজিটাল বাংলাদেশের চার স্তম্ভ, নির্বাচনী ইশতেহার, সকল ই-সেবা, ভিশন ২০২১, ২০৪১ এবং ডেল্টা প্ল্যান ২০৭১, স্বাধীনতার সূবর্ণজয়ন্তী, মুক্তিযুদ্ধ, বাংলাদেশের অর্জনসহ প্রভৃতি বিষয় থেকে প্রশ্ন নির্ধারণ করা হবে।</p>

                <p class="text-center">
                    <br/><br/>

                    <a class="button-63" href="{{route('ka_group_registration')}}">গ্রুপ ক: ৮-১২ বছর রেজিস্ট্রেশন</a><br/><br/><br/><a class="button-63" href="{{route('kha_group_registration')}}">গ্রুপ খ: ১৩-১৮ বছর  রেজিস্ট্রেশন</a><br/><br/><br/><a class="button-63" href="{{route('ga_group_registration')}}">গ্রুপ গ: ১৯-তদুর্ধ বছর   রেজিস্ট্রেশন</a>
                </p>


            </div>


        </div>
    </div>
</section><!-- End Cta Section -->





@endsection