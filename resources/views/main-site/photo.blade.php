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
</style>


<section class="before-footer section-bg">
    <div class="container">
        <div class="row" style="padding-top: 0.5em; ">
            <div class="col-md-8 offset-md-2 text-center">
                <h1 style=" margin: 40px 0px">PHOTO GALLERY</h1>
            </div>


            <div class="col-12" id="photo">
                <div class="row d-flex align-items-baseline">

                    <?php
                    $Category = \App\PhotoCategory::where('display', 'Yes')->orderBy('serial', 'asc')->get();

                    foreach ($Category as $PhotoCategory) {
                        ?>
                        <div class="col-12 text-center" style="padding: 25px; margin-top: 25px">
                            <h4>{{$PhotoCategory->photo_category_name}}</h4>
                        </div>


                        <?php
                        $Photos = \App\Photo::where('photo_category_id', $PhotoCategory->id)->where('display', 'Yes')->orderBy('serial', 'asc')->get();

                        foreach ($Photos as $Photo) {
                            ?>
                            <div class="col-lg-3 col-md-4 col-6">
                                <a href="{{asset('photo_gallery/'.$Photo->file)}}" class="d-block mb-4 h-100" data-toggle="lightbox" data-gallery="{{$PhotoCategory->id}}">
                                    <img class="img-fluid img-thumbnail" src="{{asset('photo_gallery/'.$Photo->file)}}" alt="">
                                </a>
                            </div>
                            <?php
                        }
                    }
                    ?>


                </div>
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