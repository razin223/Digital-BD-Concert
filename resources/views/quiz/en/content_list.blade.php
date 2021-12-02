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
$Category = \App\Category::find($id);
if ($Category != null) {
    ?>

    <section class="breadcrumbs">
        <h2 class="text-center">{{$Category->category_name_en}}</h2>
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
                            } 
                            ?>
                            <div class="col-12 shadow p-3 mb-3 content-list">

                                <img src="{{\Storage::url($CoverImage)}}" class="mr-3 rounded" alt="..." />
                                <div class="content-summary">
                                    <h4>{{$value->title}}</h4>
                                    {{implode(' ',array_slice(explode(' ', str_replace(["\r\n",'\n'], [' ',' '],  strip_tags($value->content))),0,40))}}<br/>
                                    <a href="{{route('en.content',$value->id)}}" class="btn-learn-more">Read More</a>
                                </div>
                            </div>
                            <?php
                        }
                    } else {
                        ?>
                        <h3 class="text-center">No content found.</h3>
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
    <h3 class="text-center">No data found.</h3>
    <?php
}
?>



@endsection