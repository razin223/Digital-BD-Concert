@extends("new-admin-template")

@section("content")
<?php
?>

<script type="text/javascript">
    $(document).ready(function () {
        $("#form").submit(function (event) {
            event.preventDefault();

            $("#loading-Modal").modal();

            $.ajax({
                url: "{{route('admin.password_change')}}",
                method: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function (data) {
                    $("#loading-Modal").modal('hide');
                    toastr.success(data.message, "Success");
                    $(".form-control").val("");
                },
                error: function (error, b) {

                    $("#loading-Modal").modal('hide');

                    var message = JSON.parse(error.responseText);

                    var Error = "";

                    if (typeof error.status == 500) {
                        Error += "<strong>System error</strong>";
                    }

                    if (typeof message.message != 'undefined') {
                        Error += message.message;
                    }

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
                        <label for="exampleInputUsername2" class="col-sm-3 col-md-2 col-form-label">Current Password <span class="text-danger">*</span></label>
                        <div class="col-sm-9">
                            <input type="password" name="old_password"  class="form-control" id="exampleInputUsername2" placeholder="Current password">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-3 col-md-2 col-form-label">New Password <span class="text-danger">*</span></label>
                        <div class="col-sm-9">
                            <input type="password" name="new_password"  class="form-control" id="exampleInputUsername2" placeholder="New password">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-3 col-md-2 col-form-label">Confirm Password<span class="text-danger">*</span></label>
                        <div class="col-sm-9">
                            <input type="password" name="new_password_confirmation"  class="form-control" id="exampleInputUsername2" placeholder="New password confirmation">
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