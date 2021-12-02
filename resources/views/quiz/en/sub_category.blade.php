@extends("quiz_en_template")

@section("content")

<style>

    .services .box{
        margin-bottom:  30px;
        width: 250px;
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
    <h2 class="text-center">সাব-ক‌্যাটাগরি</h2>
    <p class="text-center">হোম / সাব-ক‌্যাটাগরি</p>
</section>
<!-- ======= Cta Section ======= -->
<section class="services" style="background-color: #fff">
    <div class="container">


        <div class="container">

            <div class="row text-center d-flex justify-content-center ">
                <?php
                $Data = \App\SubCategory::where('category_id', $id)->where('display', 'Yes')->orderBy('sub_category_order', 'asc')->get();
                if ($Data->count()) {
                    foreach ($Data as $value) {
                        ?>
                        <div class="box">
                            <div class="icon-box text-center">
                                <a href="{{route('content_list',$value->id)}}">{{$value->sub_category_name}}</a>
                            </div>
                        </div>
                        <?php
                    }
                }
                ?>


            </div>
        </div>

    </div>
</section><!-- End Cta Section -->





@endsection