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
            $.ajax({
                url: "{{route('photocategory_add')}}",
                method: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function (data) {
                    window.location = window.location.href;
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
                <p class="text-center bg-warning">
                    <?php
                    $MaxSerial = \App\PhotoCategory::orderBy('serial', 'desc')->first();

                    if ($MaxSerial != NULL) {
                        $Max = $MaxSerial->serial;
                    } else {
                        $Max = 0;
                    }

                    echo "Max serial used is " . $Max;
                    ?>
                </p>
                <form id="form" onsubmit="return false;" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <label for="exampleInputEmail2" class="col-sm-3  col-md-2 col-form-label">Photo Category Name <span class="text-danger">*</span></label>
                        <div class="col-sm-9">
                            <input type="text" name="photo_category_name" class="form-control" id="exampleInputEmail2" >
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="exampleInputEmail2" class="col-sm-3  col-md-2 col-form-label">Display Serial <span class="text-danger">*</span></label>
                        <div class="col-sm-9">
                            <input type="text" name="serial" value="" class="form-control"/>
                            <p class="text-info">Serial used to set the display order. The lower the number the first they appear. This number can be decimal like 1.24</p>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="exampleInputEmail2" class="col-sm-3  col-md-2 col-form-label">Display <span class="text-danger">*</span></label>
                        <div class="col-sm-9">
                            <select name="display" class="form-control">
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>

                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-4" id="preview" style="margin:  0px auto"></div>
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