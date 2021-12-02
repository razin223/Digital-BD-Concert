@extends("quiz_template")

@section("og_content")
<meta property="og:url"                content="{{url()->current()}}" />
<meta property="og:type"               content="website" />
<meta property="og:title"              content="মুজিব অলিম্পিয়াড" />
<meta property="og:description"        content="মুজিব অলিম্পিয়াড আয়োজনের মূল উদ্দেশ‌্য হল জাতির পিতা সম্পর্কে দেশের ও দেশের বাইরের সকলকে জাতির পিতা সম্পর্কে জানানো। মানুষ এখান থেকে আমাদের জাতির পিতা সম্পর্কে আরো বেশি করে জানতে পারবে। " />
<meta property="og:image"              content="{{asset('assets/img/mujib_olympiad_logo.png')}}" />
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
</style>

<section class="breadcrumbs">
    <h2 class="text-center">জাতির পিতাকে জানুন</h2>
</section>
<!-- ======= Cta Section ======= -->
<section class="services" style="background-color: #fff">
    <div class="container">


        <div class="container">

            <div class="row text-center justify-content-center ">
                <?php
                $Data = \App\Category::where('display', 'Yes')->orderBy('category_order', 'asc')->get();
                if ($Data->count()) {
                    foreach ($Data as $value) {
                        ?>
                        <div class="box">
                            <div class="icon-box text-center">
                                <a href="{{route('content_list',$value->id)}}">{{$value->category_name}}</a>
                            </div>
                        </div>
                        <?php
                    }
                }
                ?>
                <div class="box">
                    <div class="icon-box text-center">
                        <a href="{{route('photo_gallery')}}">ফটো গ‌্যালারী</a>
                    </div>
                </div>

                <div class="box">
                    <div class="icon-box text-center">
                        <a href="{{route('video_gallery')}}">ভিডিও গ‌্যালারী</a>
                    </div>
                </div>

            </div>
        </div>

    </div>
</section><!-- End Cta Section -->





@endsection