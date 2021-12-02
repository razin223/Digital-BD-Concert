@extends("new-admin-template")

@section("content")

<script type="text/javascript">
    $(document).ready(function () {

        $("#form").submit(function (event) {
            event.preventDefault();
            $("#loading-Modal").modal();
            $.ajax({
                url: "{{route('roundstartup_edit',$Data->id)}}",
                method: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function (data) {
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


        $("#category_id").change(function () {
            var ID = $(this).val();

            if (ID != "") {
                window.location = "{{route('roundstartup_add')}}?id=" + ID;
            } else {
                $(".hidden_row").hide().remove();
            }
        });
    });
</script>
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <div class="row">

                    <div class="col-md-12 col-sm-12">
                        <form id="form" onsubmit="return false;" enctype="multipart/form-data">

                            @csrf

                            <div class="form-group row">
                                <label for="exampleInputUsername2" class="col-sm-3 col-md-2 col-form-label">Startup <span class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <input type="text" name="startup_name" value="{{$Data->getStartup->startup_name}}" class="form-control" readonly/>
                                </div>

                            </div>
                            <div class="form-group row">
                                <label for="exampleInputUsername2" class="col-sm-3 col-md-2 col-form-label">Category <span class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <select name="chapter_id" id="chapter_id" class="form-control">
                                        <?php
                                        foreach (\App\Chapter::get() as $value) {
                                            echo "<option value='{$value->id}'";
                                            echo ($Data->getRound->getChapter->id == $value->id) ? 'selected' : '';
                                            echo ">{$value->chapter_name}</option>";
                                        }
                                        ?>
                                    </select>
                                </div>

                            </div>

                            <div class="form-group row">
                                <label for="exampleInputUsername2" class="col-sm-3 col-md-2 col-form-label">Round <span class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <select name="round_id" id="round_id" class="form-control">
                                        <?php
                                        foreach (\App\Round::where('chapter_id', $Data->getRound->chapter_id)->get() as $value) {
                                            echo "<option value='{$value->id}'";
                                            echo ($Data->round_id == $value->id) ? 'selected' : '';
                                            echo ">{$value->round_name}</option>";
                                        }
                                        ?>
                                    </select>
                                </div>

                            </div>


                            <div class="form-group row">
                                <label for="exampleInputUsername2" class="col-sm-3 col-md-2 col-form-label">Status <span class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <select name="status"  class="form-control">
                                        <option value="">Pending</option>
                                        <?php
                                        foreach (['Reject', 'Accept', 'Moved To Next Round'] as $value) {
                                            echo "<option value='{$value}'";
                                            echo ($Data->status == $value) ? 'selected' : '';
                                            echo ">{$value}</option>";
                                        }
                                        ?>
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
    </div>
</div>
@endsection