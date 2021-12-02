@extends("quiz_template")

<?php
$Data = \App\Content::find($id);
if ($Data != null) {
    $CoverImage = !empty($Data->cover_image) ? $Data->cover_image : $Data->cover_image_resized;
    ?>

    @section("og_content")
    <meta property="og:url"                content="{{route('content',$id)}}" />
    <meta property="og:type"               content="article" />
    <meta property="og:title"              content="{{$Data->title}}" />
    <meta property="og:description"        content="{{implode(' ',array_slice(explode(' ', str_replace(["\r\n",'\n'], [' ',' '],  strip_tags($Data->content))),0,40))}}" />
    <meta property="og:image"              content="{{url('/').\Storage::url($CoverImage)}}" />
    @endsection
    <?php
}
?>


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
if ($Data != null) {
    $CoverImage = !empty($Data->cover_image) ? $Data->cover_image : $Data->cover_image_resized;
    ?>


    <section class="breadcrumbs">
        <h2 class="text-center">{{$Data->getCategory->category_name}}</h2>
    <!--        <p class="text-center">হোম / ক‌্যাটাগরি / কনটেন্ট / বিস্তারিত
        </p>-->
    </section>
    <!-- ======= Cta Section ======= -->
    <section class="services" style="background-color: #fff">
        <div class="container">


            <div class="container">

                <div class="row">
                    <div class="col-md-12">
                        <h1 class="mb-5 w-100">{{$Data->title}}</h1>
                    </div>

                    <div class="col-12 text-center">
                        <img src="{{\Storage::url($CoverImage)}}" class="mb-5 img-fluid"/>
                    </div>
                    <div class="col-12">
                        {!! $Data->content !!}
                    </div>
                </div>
            </div>

        </div>
    </section><!-- End Cta Section -->

    <?php
} else {
    ?>
    <h3 class="text-center">কোন ডাটা পাওয়া যায় নি।</h3>
    <?php
}
?>


@endsection