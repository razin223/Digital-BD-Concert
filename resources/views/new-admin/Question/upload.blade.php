@extends("new-admin-template")

@section("content")

<script type="text/javascript">
    $(document).ready(function () {

        $('.answer').click(function () {
            if ($(this).is(":checked")) {
                $('.answer').prop('checked', false);
                $(this).prop('checked', true);
                $('.answer').parents('.form-group').removeClass('bg-success');
                $(this).parents('.form-group').addClass('bg-success');
            } else {
                $(this).parents('.form-group').removeClass('bg-success');
            }
        });

        $("#form").submit(function (event) {
            event.preventDefault();
            $("#loading-Modal").modal();
            $.ajax({
                url: "{{route('Question.upload')}}",
                method: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function (data) {
                    $("#loading-Modal").modal('hide');
                    toastr.success(data.message, "Success");
                    $("#file").val("");
                    $("#category_id").val("");
                    $("#language").val("");
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
                    <div class="form-group row" style="display: none">
                        <label for="exampleInputUsername2" class="col-sm-3 col-md-2 col-form-label">Category </label>
                        <div class="col-sm-9">
                            @include('new-admin.fixed-layout.category')
                        </div>

                    </div>
                    <div class="form-group row" style="display: none">
                        <label for="exampleInputUsername2" class="col-sm-3 col-md-2 col-form-label">Language <span class="text-danger">*</span></label>
                        <div class="col-sm-9">
                            <select name="language" id="language" class="form-control">
                                <?php
                                foreach (['En' => "English", "Bn" => "Bangla"] as $key => $value) {
                                    echo "<option value='{$key}'>{$value}</option>";
                                }
                                ?>
                            </select>
                        </div>

                    </div>
                    <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-3 col-md-2 col-form-label">Excel File <span class="text-danger">*</span></label>
                        <div class="col-sm-9">
                            <input type="file" name="file" id="file" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel"/>
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