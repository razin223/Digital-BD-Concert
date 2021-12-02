@extends("new-admin-template")

@section("content")

<script type="text/javascript">
    $(document).ready(function () {

        $("#form").submit(function (event) {
            event.preventDefault();
            $("#loading-Modal").modal();
            $.ajax({
                url: "{{route('Content.index')}}",
                method: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function (data) {
                    $("#loading-Modal").modal('hide');
                    toastr.success(data.message, "Success");

                    $("#type,#title,#display_order,#featured,#cover_image").val("");
                    $('.editor').summernote("reset");
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
                <form id="form" onsubmit="return false;" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-3 col-md-2 col-form-label">Category <span class="text-danger">*</span></label>
                        <div class="col-sm-9">
                            @include('new-admin.fixed-layout.category')
                        </div>

                    </div>
                    <div class="form-group row">
                        <label for="exampleInputEmail2" class="col-sm-3  col-md-2 col-form-label">Type <span class="text-danger">*</span></label>
                        <div class="col-sm-9">
                            <select name="type" id="type" class="form-control">
                                <option value="">(select)</option>
                                <option value="General">General</option>
                                <option value="Gallery">Gallery</option>
                                <option value="Video">Video</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-3 col-md-2 col-form-label">Language <span class="text-danger">*</span></label>
                        <div class="col-sm-9">
                            <select name="language" class="form-control">
                                <option value="">(select)</option>
                                <?php
                                foreach (['En' => "English", "Bn" => "Bangla"] as $key => $value) {
                                    echo "<option value='{$key}'>{$value}</option>";
                                }
                                ?>
                            </select>
                        </div>

                    </div>

                    <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-3 col-md-2 col-form-label">Title <span class="text-danger">*</span></label>
                        <div class="col-sm-9">
                            <input type="text" name="title" id="title" class="form-control" id="exampleInputUsername2" placeholder="Title name">
                        </div>

                    </div>

                    

                    <div class="form-group row">
                        <label for="exampleInputEmail2" class="col-sm-3  col-md-2 col-form-label">Content <span class="text-danger">*</span></label>
                        <div class="col-sm-9">
                            <textarea name="content" id="content" class="form-control editor" rows="20"></textarea>
                        </div>
                    </div>

                    
                    <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-3 col-md-2 col-form-label">Display Serial <span class="text-danger">*</span></label>
                        <div class="col-sm-9">
                            <input type="text" name="display_order" id="display_order" class="form-control" id="exampleInputUsername2" placeholder="Like 1,2,3 ">
                        </div>

                    </div>
                    <div class="form-group row">
                        <label for="exampleInputEmail2" class="col-sm-3  col-md-2 col-form-label">Content Cover <span class="text-danger">*</span></label>
                        <div class="col-sm-9">
                            <input type="file" name="cover_image" id="cover_image" class="form-control" id="exampleInputEmail2" >
                            <p class="text-info">Use maximum of 1MB.</p>
                        </div>
                    </div>

                    
                    <div class="form-group row">
                        <label for="exampleInputEmail2" class="col-sm-3  col-md-2 col-form-label">Display <span class="text-danger">*</span></label>
                        <div class="col-sm-9">
                            <select name="display" id="display" class="form-control">
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="exampleInputEmail2" class="col-sm-3  col-md-2 col-form-label">Featured <span class="text-danger">*</span></label>
                        <div class="col-sm-9">
                            <select name="featured" id="featured" class="form-control">
                                <option value="No">No</option>
                                <option value="Yes">Yes</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-12 text-center">

                            <button type="submit" class="btn btn-primary">Create</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection