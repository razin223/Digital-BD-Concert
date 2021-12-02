@extends("new-admin-template")

@section("content")

<script type="text/javascript">
    $(document).ready(function () {


        $(document).ready(function () {
            $('#link').bind('input propertychange', function () {

                var url = $(this).val();

                if (url != "") {
                    $("#preview").html('<div class="embed-responsive embed-responsive-16by9"><iframe class="embed-responsive-item" src="https://www.youtube.com/embed/' + url + '" allowfullscreen></iframe></div>');
                } else {
                    $("#preview").html("");
                }
            });
        });

        $("#form").submit(function (event) {
            event.preventDefault();
            $("#loading-Modal").modal();
            $("#photo_update").html("");
            $.ajax({
                url: "{{route('Video.index')}}",
                method: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function (data) {
                    //window.location = window.location.href;
                    $("#loading-Modal").modal('hide');
                    toastr.success(data.message, "Success");

                    $(".reset").val('');
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
                        <label for="exampleInputEmail2" class="col-sm-3  col-md-2 col-form-label">Video Title<span class="text-danger">*</span></label>
                        <div class="col-sm-9">
                            <input type="text" name="title" id="title" value="" placeholder="Video Title" class="form-control reset"/>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label for="exampleInputEmail2" class="col-sm-3  col-md-2 col-form-label">Video Title (English)<span class="text-danger">*</span></label>
                        <div class="col-sm-9">
                            <input type="text" name="title_en" id="title_en" value="" placeholder="Video Title in English" class="form-control reset"/>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="exampleInputEmail2" class="col-sm-3  col-md-2 col-form-label">Video Link<span class="text-danger">*</span></label>
                        <div class="col-sm-9">
                            <input type="text" name="link" id="link" value="" placeholder="Video Link like qt_urUz42vI" class="form-control reset"/>
                            <span>If your youtube link is https://www.youtube.com/watch?v=</span><span class="text-danger">qt_urUz42vI</span> you just enter </span> <span class="text-info">qt_urUz42vI</span><br/>
                            <div id="preview" style="width: 400px">

                            </div>
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="exampleInputEmail2" class="col-sm-3  col-md-2 col-form-label">Display Serial<span class="text-danger">*</span></label>
                        <div class="col-sm-9">
                            <input type="text" name="display_order" id="display_order" value="" placeholder="Display serial to display like 1,2,3" class="form-control number reset"/>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="exampleInputEmail2" class="col-sm-3  col-md-2 col-form-label">Display <span class="text-danger">*</span></label>
                        <div class="col-sm-9">
                            <select name="display" id="display" class="form-control reset">
                                <option value="">(select)</option>
                                <option value="Yes" >Yes</option>
                                <option value="No"  >No</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="exampleInputEmail2" class="col-sm-3  col-md-2 col-form-label">Featured <span class="text-danger">*</span></label>
                        <div class="col-sm-9">
                            <select name="featured" id="featured" class="form-control reset">
                                <option value="">(select)</option>
                                <option value="Yes" >Yes</option>
                                <option value="No"  >No</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-12 text-center">

                            <button type="submit" class="btn btn-primary">Upload</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>



    </div>
</div>
@endsection