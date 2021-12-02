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
                url: "{{route('Question.show',$Data->id)}}",
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
                <?php
                if ($Data != NULL) {
                    ?>
                    <form id="form" onsubmit="return false;" enctype="multipart/form-data">
                        @csrf
                        @method("PUT")
                        <div class="form-group row">
                            <label for="exampleInputUsername2" class="col-sm-3 col-md-2 col-form-label">Group <span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <select name="group" class="form-control">
                                    <option value="">(select)</option>
                                    <option value="Ka" {{$Data->group == 'Ka' ? "selected":""}} >Ka</option>
                                    <option value="Kha" {{$Data->group == 'Kha' ? "selected":""}} >Kha</option>
                                    <option value="Ga" {{$Data->group == 'Ga' ? "selected":""}} >Ga</option>
                                </select>
                            </div>

                        </div>

                        
                        <div class="form-group row">
                            <label for="exampleInputUsername2" class="col-sm-3 col-md-2 col-form-label">Question <span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <textarea name="question" class="form-control reset" id="exampleInputUsername2" placeholder="Question">{{$Data->question}}</textarea>
                            </div>
                        </div>
                        <?php
                        foreach (range(1, 4) as $value) {
                            $Parameter = "option_" . $value;
                            ?>
                            <div class="form-group row p-2 {{$value == $Data->answer? "bg-success":""}}">
                                <label for="exampleInputUsername2" class="col-sm-3 col-md-2 col-form-label">Option {{$value}} <span class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <textarea name="option_{{$value}}" class="form-control reset" id="exampleInputUsername2" placeholder="Option {{$value}}">{{$Data->$Parameter}}</textarea>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="checkbox" name="answer" class="form-check-input answer" value="{{$value}}" {{$value == $Data->answer? "checked":""}}>Make Answer
                                        </label>
                                    </div>
                                </div>

                            </div>
                            <?php
                        }
                        ?>



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