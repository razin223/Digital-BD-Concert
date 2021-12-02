@extends("new-admin-template")

@section("content")

<script type="text/javascript">
    $(document).ready(function () {




        $("#form").submit(function (event) {
            event.preventDefault();
            $("#loading-Modal").modal();
            $.ajax({
                url: "{{route('SubCategory.show',$Data->id)}}",
                method: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function (data) {
                    if (data.status) {
                        window.location = window.location.href;
                    }
                },
                error: function (error, b) {
                    $("#loading-Modal").modal('hide');
                    var message = JSON.parse(error.responseText);

                    var Error = message.message;

                    if (typeof message.errors != 'undefined') {
                        var ErrorMessages = message.errors;
                        for (var i in ErrorMessages) {
                            Error += "<br/>" + ErrorMessages[i][0];
                        }
                    }


                    toastr.error(Error, "Error");
                }
            });
        });
    });
</script>
<?php
$CategoryId = $Data->category_id;
?>
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <form id="form" onsubmit="return false;" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group row">
                        <label for="exampleInputEmail2" class="col-sm-3  col-md-2 col-form-label">Category Name<span class="text-danger">*</span></label>
                        <div class="col-sm-9">
                            @include('new-admin.fixed-layout.category')
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="exampleInputEmail2" class="col-sm-3  col-md-2 col-form-label">Sub Category Name<span class="text-danger">*</span></label>
                        <div class="col-sm-9">
                            <input type="text" name="sub_category_name" id="sub_category_name" value="{{$Data->sub_category_name}}" placeholder="Sub Category name" class="form-control"/>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="exampleInputEmail2" class="col-sm-3  col-md-2 col-form-label">Sub Category Serial<span class="text-danger">*</span></label>
                        <div class="col-sm-9">
                            <input type="text" name="sub_category_order" id="sub_category_order" value="{{$Data->sub_category_order}}" placeholder="Sub Category serial to display like 1,2,3" class="form-control number"/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputEmail2" class="col-sm-3  col-md-2 col-form-label">Sub Category Photo </label>
                        <div class="col-sm-9">
                            <input type="file" name="file" class="form-control" id="file_input" accept="image/png,image/x-png,image/jpeg">
                            <p class="text-info">Photo maximum 1MB.</p>
                            <?php
                            if (!empty($Data->sub_category_image) || !empty($Data->sub_category_image_resized)) {
                                $Image = !empty($Data->sub_category_image_resized) ? $Data->sub_category_image_resized : $Data->sub_category_image;
                                ?>
                                <img src="{{\Storage::url($Image)}}" style="width: 200px;border: solid lightgray 1px" class="img-fluid">
                                <?php
                            }
                            ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="exampleInputEmail2" class="col-sm-3  col-md-2 col-form-label">Display <span class="text-danger">*</span></label>
                        <div class="col-sm-9">
                            <select name="display" id="display" class="form-control">
                                <option value="">(select)</option>
                                <option value="Yes" {{($Data->display == 'Yes'? 'selected':'')}} >Yes</option>
                                <option value="No" {{($Data->display == 'No'? 'selected':'')}} >No</option>
                            </select>
                        </div>
                    </div>




                    <div class="form-group row">
                        <div class="col-sm-12 text-center">

                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection