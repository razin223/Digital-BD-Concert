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
$Category = \App\Category::find($id);
if ($Category != null) {
    ?>

    <section class="breadcrumbs">
        <h2 class="text-center">{{$Category->category_name}}</h2>
<!--        <p class="text-center">হোম / ক‌্যাটাগরি / কনটেন্ট / {{$Category->category_name}}</p>-->
    </section>
    <!-- ======= Cta Section ======= -->
    <section class="services" style="background-color: #fff">
        <div class="container">


            <div class="container">

                <div class="row ">
                    <?php
                    if ($Data->count()) {
                        foreach ($Data as $value) {
                            $CoverImage = null;
                            if (!empty($value->cover_image) || !empty($value->cover_image_resized)) {
                                $CoverImage = !empty($value->cover_image_resized) ? $value->cover_image_resized : $value->cover_image;
                            } else {
                                $CoverImage = $SubCategory->sub_category_image_resized != null ? $SubCategory->sub_category_image_resized : $SubCategory->sub_category_image;
                            }
                            ?>
                            <div class="col-12 shadow p-3 mb-3 content-list">

                                <img src="{{\Storage::url($CoverImage)}}" class="mr-3 rounded" alt="..." />
                                <div class="content-summary">
                                    <h4>{{$value->title}}</h4>
                                   {{implode(' ',array_slice(explode(' ', str_replace(["\r\n",'\n'], [' ',' '],  strip_tags($value->content))),0,40))}}<br/>
                                    <a href="{{route('content',$value->id)}}" class="btn-learn-more">আরো পড়ুন</a>
                                </div>
                            </div>
                            <?php
                        }
                    } else {
                        ?>
                        <h3 class="text-center">কোন কনটেন্ট পাওয়া যায় নি।</h3>
                        <?php
                    }
                    ?>
                    

                    <div class="col-12 p-3 text-center">
                        {{ $Data->withQueryString()->links() }}
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