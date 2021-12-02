@extends("landing_template_2")

@section("content")

<style>


    #photo img {

    }

    #photo img:hover {
        filter: gray; /* IE6-9 */
        -webkit-filter: grayscale(1); /* Google Chrome, Safari 6+ & Opera 15+ */
        -webkit-box-shadow: 0px 2px 6px 2px rgba(0,0,0,0.75);
        -moz-box-shadow: 0px 2px 6px 2px rgba(0,0,0,0.75);
        box-shadow: 0px 2px 6px 2px rgba(0,0,0,0.75);

    }


    .video-container{
        position: relative;
    }

    .video-container a{
        position: absolute;
        width: 100%;
        height: 100%;
    }


    h4{
        margin-top: 75px;
        margin-bottom: 25px;
        font-size: 2rem;
    }


</style>


<section class="before-footer section-bg">
    <div class="container">
        <div class="row" style="padding-top: 0.5em; ">
            <div class="col-md-8 offset-md-2 text-center">
                <h1 style=" margin: 40px 0px">VIDEO GALLERY</h1>
            </div>


            <div class="col-12" id="photo">
                <div class="row d-flex align-items-baseline justify-content-center">


                    <div class="col-lg-8 col-md-8 video-container">
                        <a href="https://www.youtube.com/embed/ByaIva2k9Xc" data-toggle="lightbox">

                        </a>
                        <iframe width="100%" height="300"
                                src="https://www.youtube.com/embed/ByaIva2k9Xc">
                        </iframe> 
                    </div>

                </div>


                <?php
                $VideoCategory = \App\VideoCategory::where('display', 'Yes')->orderBy('serial', 'asc')->get();

                foreach ($VideoCategory as $Single) {
                    ?>

                    <div class="row d-flex align-items-baseline justify-content-center">

                        <div class="col-12 text-center">
                            <h4>{{$Single->video_category_name}}</h4>
                        </div>
                        <?php
                        $Video = \App\Video::where('video_category_id', $Single->id)->where('display', 'Yes')->orderBy('serial', 'asc')->get();

                        foreach ($Video as $Data) {
                            ?>
                            <div class="col-lg-4 col-md-6 text-center video-container">
                                <a href="{{$Data->link}}" data-toggle="lightbox">

                                </a>
                                <iframe width="100%" height="250"
                                        src="{{$Data->link}}">
                                </iframe>
                            </div>
                            <?php
                        }
                        ?>



                    </div>

                    <?php
                }
                ?>

            </div>


        </div>
    </div>
</section>


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.css" >
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.min.js"></script>

<script type="text/javascript">
$(document).ready(function () {
    $(document).on('click', '[data-toggle="lightbox"]', function (event) {
        event.preventDefault();
        $(this).ekkoLightbox({alwaysShowClose: true, });
    });
});
</script>







@endsection