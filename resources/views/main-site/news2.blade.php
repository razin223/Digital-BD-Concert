@extends("landing_template_2")

@section("content")

<style>


    #news a {
        color: #000;
    }

    #news a div:hover{
        text-decoration: none;
        filter: gray;  /*IE6-9 */
        -webkit-filter: grayscale(1);  /*Google Chrome, Safari 6+ & Opera 15+ */
        -webkit-box-shadow: 0px 2px 6px 2px rgba(0,0,0,0.75);
        -moz-box-shadow: 0px 2px 6px 2px rgba(0,0,0,0.75);
        box-shadow: 0px 2px 6px 2px rgba(0,0,0,0.75); 
    }

    #photo img:hover {
        filter: gray;  /*IE6-9 */
        -webkit-filter: grayscale(1);  /*Google Chrome, Safari 6+ & Opera 15+ */
        -webkit-box-shadow: 0px 2px 6px 2px rgba(0,0,0,0.75);
        -moz-box-shadow: 0px 2px 6px 2px rgba(0,0,0,0.75);
        box-shadow: 0px 2px 6px 2px rgba(0,0,0,0.75);

    }
</style>


<script type="text/javascript">
//    $(document).ready(function () {
//        var URL = $(".popup").first().attr("href");
//        console.log(URL);
//
//        $.get(URL,
//                function (data) {
//                    console.log($(data).find('meta[property="og:image"]').attr("content"));
//                });
//    });
</script>


<section class="before-footer section-bg">
    <div class="container">
        <div class="row" style="padding-top: 0.5em; ">
            <div class="col-md-8 offset-md-2 text-center">
                <h1 style=" margin: 40px 0px">PRESS COVERAGE</h1>
            </div>


            <div class="col-md-12" id="news">
                <div class="row d-flex align-content-stretch flex-wrap">
                    <?php
                    $Data = \App\News::where('display', 'Yes')->get();



                    foreach ($Data as $key => $value) {
                        ?>
                        <div class="col-md-3 text-center" style=" padding: 15px;">
                            <a href="{{$value->link}}" target="_blank">
                                <div style="width: 100%; height: 150px; overflow: hidden">
                                    <img src="{{$value->image}}" style="width: 100%; height: 100%; max-width: 100%; max-height: 100%;"/>
                                </div>
                                <h5>{{$value->title}}</h5>
                            </a>

                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>


        </div>
    </div>
</section>


<script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js" integrity="sha512-IsNh5E3eYy3tr/JiX2Yx4vsCujtkhwl7SLqgnwLNgf04Hrt9BT9SXlLlZlWx+OK4ndzAoALhsMNcCmkggjZB1w==" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.css" integrity="sha512-WEQNv9d3+sqyHjrqUZobDhFARZDko2wpWdfcpv44lsypsSuMO0kHGd3MQ8rrsBn/Qa39VojphdU6CMkpJUmDVw==" crossorigin="anonymous" />
<script type="text/javascript">
    $(document).ready(function () {
        $('.popup').magnificPopup({
            disableOn: 700,
            type: 'iframe',
            mainClass: 'mfp-fade',
            removalDelay: 160,
            preloader: false,

            fixedContentPos: false
        });
    });
</script>







@endsection