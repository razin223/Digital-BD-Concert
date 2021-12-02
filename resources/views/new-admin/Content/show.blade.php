@extends("new-admin-template")

@section("content")

<?php
$Language = ['En' => "English", 'Bn' => "Bangla"];
?>

<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <strong>Category: </strong> {{$Data->getCategory->category_name}} ({{$Data->getCategory->category_name_en}})
                    </div>

                    <div class="col-12">
                        <strong>Type: </strong> {{$Data->type}}
                    </div>
                    <div class="col-12">
                        <strong>Language: </strong> {{$Language[$Data->language]}}
                    </div>
                    <div class="col-12">
                        <strong>Display Order: </strong> {{$Data->display_order}}
                    </div>
                    <div class="col-12">
                        <strong>Display: </strong> {{$Data->display}}
                    </div>
                    <div class="col-12">
                        <strong>Featured: </strong> {{$Data->featured}}
                    </div>
                    <div class="col-12">
                        <h2 style="width:100%">{{$Data->title}}</h2>

                    </div>
                    <div class="col-12">&nbsp;</div>
                    <div class="col-12 text-center">
                        <?php
                        if (!empty($Data->cover_image) || !empty($Data->cover_image_resized)) {
                            $Image = !empty($Data->cover_image) ? $Data->cover_image : $Data->cover_image_resized;
                            ?>
                            <img src="{{\Storage::url($Image)}}" class="img-fluid">
                            <?php
                        } else {
                            $SubCategory = $Data->getSubCategory;
                            $CoverImage = $SubCategory->sub_category_image_resized != null ? $SubCategory->sub_category_image_resized : $SubCategory->sub_category_image;
                            if (!empty($SubCategory->sub_category_image_resized) || !empty($SubCategory->sub_category_image)) {
                                $Image = $SubCategory->sub_category_image_resized != null ? $SubCategory->sub_category_image_resized : $SubCategory->sub_category_image;
                                ?>
                                <img src="{{\Storage::url($Image)}}" class="img-fluid">
                                <?php
                            }
                        }
                        ?>
                    </div>
                    <div class="col-12">&nbsp;</div>
                    <div class="col-12">
                        {!!$Data->content!!}
                    </div>
                    <div class="col-12">&nbsp;</div>
                    <div class="col-12 text-center">
                        <a href="{{route('Content.edit',$Data->id)}}" class="btn btn-primary">Edit</a> &nbsp;&nbsp;
                        <form action="{{route('Content.destroy',$Data->id)}}" style="display: inline" method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="Delete" class="btn btn-danger"/>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection