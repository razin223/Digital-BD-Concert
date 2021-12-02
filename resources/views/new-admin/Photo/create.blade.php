@extends("new-admin-template")

@section("content")

<script type="text/javascript">
    $(document).ready(function () {


        $(document).ready(function () {
            $('#embed_code').bind('input propertychange', function () {

                var html = $.parseHTML($("#embed_code").val());


                $("#preview").html('<iframe class="popup" src="' + html[0].src + '" width="100%" height="250"></iframe>')

            });
        });

        $("#form").submit(function (event) {
            event.preventDefault();
            $("#loading-Modal").modal();
            $("#photo_update").html("");
            $.ajax({
                url: "{{route('Photo.index')}}",
                method: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function (data) {
                    //window.location = window.location.href;
                    $("#loading-Modal").modal('hide');
                    toastr.success(data.message, "Success");

                    $("#file_input").val('');


                    var Data = data.data;

                    var HTML = "";
                    for (var i in Data) {
                        var Serial = (i + 1);
                        HTML += "<div class='form-group row border p-1'>";
                        HTML += "<div class='col-md-1'>" + Serial + ".</div>";
                        HTML += "<div class='col-md-2'><img src='" + Data[i].image + "' class='img-fluid'/></div>";
                        HTML += "<input type='hidden' name='id[]' value='" + Data[i].id + "'/>";
                        HTML += "<div class='col-md-3'><input type='text' name='title[]' value='' class='form-control' placeholder='Title'/></div>";
                        HTML += "<div class='col-md-3'><input type='text' name='title_en[]' value='' class='form-control' placeholder='Title in English'/></div>";
                        HTML += "<div class='col-md-2'><select name='featured[]' class='form-control'><option value='No'>No (Featured)</option><option value='Yes'>Yes (Featured)</option></select></div>";
                        HTML += "<div class='col-md-1'><input type='text' name='display_order[]' value='" + Data[i].display_order + "' class='form-control' placeholder='Display Serial'/></div>";
                        HTML += "</div>";
                    }
                    $("#photo_update").html(HTML);
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

        $("#form_update").submit(function (event) {
            event.preventDefault();
            $("#loading-Modal").modal();
            $.ajax({
                url: "{{route('Photo.mass_update')}}",
                method: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function (data) {
                    //window.location = window.location.href;
                    $("#loading-Modal").modal('hide');
                    toastr.success(data.message, "Success");

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
                        <label for="exampleInputEmail2" class="col-sm-3  col-md-2 col-form-label">Photo </label>
                        <div class="col-sm-9">
                            <input type="file" name="file[]" class="form-control" id="file_input" accept="image/png,image/x-png,image/jpeg" multiple>
                            <p class="text-info">Photo maximum 1MB each.</p>
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


        <div class="card">
            <div class="card-body">

                <form id="form_update" onsubmit="return false;" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-12" id="photo_update">
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