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
    <h2 class="text-center">Photo Gallery</h2>
</section>
<!-- ======= Cta Section ======= -->
<section class="services" style="background-color: #fff">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-12">
                        <div class="card-columns">
                            <?php
                            foreach (\App\Photo::where('display', 'Yes')->orderBy('display_order', 'asc')->get() as $value) {
                                ?>
                                <div class="card rounded-lg image-card">
                                    <a href="{{\Storage::url($value->file_name)}}" data-toggle="lightbox" data-gallery="1" data-max-height="600" data-footer="{{$value->title_en}}">
                                        <img class="card-img-top" src="{{\Storage::url($value->file_name_resized)}}" alt="Card image cap" >
                                        
                                    </a>
                                </div>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
</section><!-- End Cta Section -->





@endsection