@extends("quiz_en_template")

@section("content")

<style>

    .services .box{
        width: 300px;
        margin-bottom:  30px;
        margin-left: 15px;
        margin-right: 15px;
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
    <h2 class="text-center">Learn Father of the Nation</h2>
</section>
<!-- ======= Cta Section ======= -->
<section class="services" style="background-color: #fff">
    <div class="container">


        <div class="container">

            <div class="row text-center justify-content-center ">
                <?php
                $Data = \App\Category::whereIn('id', function($query) {
                            $query->select('category_id')
                            ->from(with(new \App\Content)->getTable())
                            ->where('contents.display', 'Yes')
                            ->where('language', 'En')
                            ->groupBy('category_id');
                        })
                        ->where('display', 'Yes')
                        ->orderBy('category_order', 'asc')
                        ->get();
                if ($Data->count()) {
                    foreach ($Data as $value) {
                        ?>
                        <div class="box">
                            <div class="icon-box text-center">
                                <a href="{{route('en.content_list',$value->id)}}">{{$value->category_name_en}}</a>
                            </div>
                        </div>
                        <?php
                    }
                }
                ?>
                <div class="box">
                    <div class="icon-box text-center">
                        <a href="{{route('en.photo_gallery')}}">Photo Gallery</a>
                    </div>
                </div>

                <div class="box">
                    <div class="icon-box text-center">
                        <a href="{{route('en.video_gallery')}}">Video Gallery</a>
                    </div>
                </div>

            </div>
        </div>

    </div>
</section><!-- End Cta Section -->





@endsection