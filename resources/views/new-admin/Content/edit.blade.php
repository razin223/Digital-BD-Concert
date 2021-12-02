@extends("new-admin-template")

@section("content")

<script type="text/javascript">
    $(document).ready(function () {

        $("#form").submit(function (event) {
            event.preventDefault();

            $.ajax({
                url: "{{route('Content.show',$Data->id)}}",
                method: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                beforeSend: function () {
                    $("#loading-Modal").modal();
                },
                success: function (data) {
                    $("#loading-Modal").modal('hide');
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
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <?php
                if ($Data != NULL) {
                    $CategoryId = $Data->category_id;
                    ?>
                    <form id="form" onsubmit="return false;" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group row">
                            <label for="exampleInputUsername2" class="col-sm-3 col-md-2 col-form-label">Category <span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                @include('new-admin.fixed-layout.category')
                            </div>

                        </div>
                        <!--                        <div class="form-group row">
                                                    <label for="exampleInputUsername2" class="col-sm-3 col-md-2 col-form-label">Sub Category <span class="text-danger">*</span></label>
                                                    <div class="col-sm-9">
                                                        @include('new-admin.fixed-layout.sub_category')
                                                    </div>
                        
                                                </div>-->
                        <div class="form-group row">
                            <label for="exampleInputEmail2" class="col-sm-3  col-md-2 col-form-label">Type <span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <select name="type" id="type" class="form-control">
                                    <option value="">(select)</option>
                                    <option value="General" {{$Data->type == 'General' ? 'selected':'' }} >General</option>
                                    <option value="Gallery" {{$Data->type == 'Gallery' ? 'selected':'' }} >Gallery</option>
                                    <option value="Video" {{$Data->type == 'Video' ? 'selected':'' }} >Video</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="exampleInputUsername2" class="col-sm-3 col-md-2 col-form-label">Language <span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <select name="language" id="language" class="form-control">
                                    <option value="">(select)</option>
                                    <?php
                                    foreach (['En' => "English", "Bn" => "Bangla"] as $key => $value) {
                                        echo "<option value='{$key}'";
                                        echo ($Data->language == $key) ? "selected" : "";
                                        echo ">{$value}</option>";
                                    }
                                    ?>
                                </select>
                            </div>

                        </div>

                        <div class="form-group row">
                            <label for="exampleInputUsername2" class="col-sm-3 col-md-2 col-form-label">Title <span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <input type="text" name="title" id="title" value="{{$Data->title}}" class="form-control" id="exampleInputUsername2" placeholder="Title name">
                            </div>

                        </div>

                        
                        <div class="form-group row">
                            <label for="exampleInputEmail2" class="col-sm-3  col-md-2 col-form-label">Content <span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <textarea name="content" id="content" class="form-control editor" rows="20">{!! $Data->content !!}</textarea>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="exampleInputUsername2" class="col-sm-3 col-md-2 col-form-label">Display Serial <span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <input type="text" name="display_order" id="display_order" value="{{$Data->display_order}}" class="form-control" id="exampleInputUsername2" placeholder="Like 1,2,3 ">
                            </div>

                        </div>
                        <div class="form-group row">
                            <label for="exampleInputEmail2" class="col-sm-3  col-md-2 col-form-label">Content Cover </label>
                            <div class="col-sm-9">
                                <input type="file" name="cover_image" id="cover_image" class="form-control" id="exampleInputEmail2" >
                                <p class="text-info">Use maximum of 1MB.</p>
                                <?php
                                if (!empty($Data->cover_image) || !empty($Data->cover_image_resized)) {
                                    $Image = !empty($Data->cover_image_resized) ? $Data->cover_image_resized : $Data->cover_image;
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
                                    <option value="Yes"  {{$Data->display == 'Yes' ? 'selected':'' }}>Yes</option>
                                    <option value="No"  {{$Data->display == 'No' ? 'selected':'' }}>No</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="exampleInputEmail2" class="col-sm-3  col-md-2 col-form-label">Featured <span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <select name="featured" id="featured" class="form-control">
                                    <option value="No"  {{$Data->featured == 'No' ? 'selected':'' }}>No</option>
                                    <option value="Yes"  {{$Data->featured == 'Yes' ? 'selected':'' }}>Yes</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-12 text-center">

                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </div>
                    </form>
                    <?php
                } else {
                    ?>
                    <h3 class="text-center text-warning">Invalid data given.</h3>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>
</div>
@endsection