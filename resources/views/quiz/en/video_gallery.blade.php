@extends("quiz_en_template")

@section("content")

<style>



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

    .question span{
        margin-right: 10px;
    }




</style>

<section class="breadcrumbs">
    <h2 class="text-center">Video Gallery</h2>
</section>
<!-- ======= Cta Section ======= -->
<section class="services" style="background-color: #fff">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <?php
                    foreach (\App\Video::where('display', 'Yes')->orderBy('display_order', 'asc')->get() as $value) {
                        ?>
                        <div class="col-md-4 mb-4">
                            <div class="embed-responsive embed-responsive-16by9" style="border-radius: 10px"><iframe class="embed-responsive-item" src="https://www.youtube.com/embed/{{$value->link}}" allowfullscreen></iframe></div>
                            <h5 class="w-100 pt-1">{{$value->title_en}}</h5>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>


        </div>
    </div>
</section><!-- End Cta Section -->





@endsection