@extends("quiz_en_template")

@section("content")

<style>

    .content-list img{
        width: 25%;
        float: left;
    }

    .content-list .content-summary{
        width: 70%;
        float: left;
    }

    .btn-learn-more {
        font-family: 'Hind Siliguri', sans-serif;
        font-weight: 600;
        font-size: 14px;
        letter-spacing: 1px;
        display: inline-block;
        padding: 12px 32px;
        border-radius: 5px;
        transition: 0.3s;
        line-height: 1;
        color: rgb(68, 68, 68);
        -webkit-animation-delay: 0.8s;
        animation-delay: 0.8s;
        margin-top: 6px;
        border: 2px solid rgb(68, 68, 68);
    }

    .btn-learn-more:hover {
        background: rgb(68, 68, 68);
        color: #fff;
        text-decoration: none;
    }

    @media only screen and (max-width: 768px) {
        .content-list img{
            width: 100%;
            float: left;
            margin-bottom: 10px;
        }

        .content-list .content-summary{
            width: 100%;
            float: left;
        }
    }


</style>

<?php
$Data = \App\Content::find($id);
if ($Data != null) {
    $CoverImage = !empty($Data->cover_image_en) ? $Data->cover_image_en : $Data->cover_image_resized_en;
    ?>
    <meta property="og:url"                content="{{route('content_guest',$id)}}" />
    <meta property="og:type"               content="article" />
    <meta property="og:title"              content="{{$Data->title_en}}" />
    <meta property="og:description"        content="{{implode(' ',array_slice(explode(' ', str_replace(["\r\n",'\n'], [' ',' '],  strip_tags($Data->content_en))),0,40))}}" />
    <meta property="og:image"              content="{{url('/').\Storage::url($CoverImage)}}" />
    <!-- ======= Cta Section ======= -->
    <section class="breadcrumbs">
        <h2 class="text-center">{{$Data->getCategory->category_name_en}}</h2>
    <!--        <p class="text-center">হোম / ক‌্যাটাগরি / কনটেন্ট / বিস্তারিত
        </p>-->
    </section>
    <section class="services" style="background-color: #fff">
        <div class="container">


            <div class="container">

                <div class="row">
                    <div class="col-md-8 offset-md-2">
                        <h1 class="mb-5 w-100">{{$Data->title_en}}</h1>
                    </div>
                    <div class="col-12 text-center mb-5">
                        <a href="https://www.facebook.com/sharer.php?u={{urlencode(route('content_guest',$id))}}" title="Share Facebook" class="p-2 bg-primary text-white rounded"><i class="icofont-facebook"></i></a>
                        <a href="https://twitter.com/intent/tweet?url={{urlencode(route('content_guest',$id))}}&text={{urlencode($Data->title_en)}}" title="Share Twitter" class="p-2 bg-info text-white rounded"><i class="icofont-twitter"></i></a>
                    </div>
                    <div class="col-md-8 offset-md-2 text-center">
                        <img src="{{\Storage::url($CoverImage)}}" class="mb-5 img-fluid"/>
                    </div>
                    <div class="col-md-8 offset-md-2">
                        {!! $Data->content_en !!}
                    </div>
                </div>
            </div>

        </div>
    </section><!-- End Cta Section -->

    <?php
} else {
    ?>
    <h3 class="text-center">No data found.</h3>
    <?php
}
?>


@endsection