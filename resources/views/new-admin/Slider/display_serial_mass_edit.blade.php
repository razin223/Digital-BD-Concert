@extends("new-admin-template")

@section("content")

<script type="text/javascript">
    $(document).ready(function () {


        $(document).ready(function () {
            $("#image-holder .fa-angle-up").click(function () {
                var e = $(this).parents('.image-div');

                e.prev().insertAfter(e);
            });
        });
        
        
        $(document).ready(function () {
            $("#image-holder .fa-angle-down").click(function () {
                var e = $(this).parents('.image-div');

                e.next().insertBefore(e);
            });
        });

        $("#form").submit(function (event) {
            event.preventDefault();
            $("#loading-Modal").modal();
            $.ajax({
                url: "{{route('slider_add')}}",
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

                    if (typeof message.errors != 'undefined{') {
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
                        <div class="col-md-4">
                            <div class="row" id="image-holder" >
                                <?php
                                foreach (\App\Slider::where('display', 'Yes')->orderBy('serial', 'asc')->get() as $value) {
                                    ?>

                                    <div class="col-12 text-center image-div" style="border: solid lightgray 1px; margin: 5px 0px;">
                                        <i class="fas fa-angle-up"></i>
                                        <img src="{{asset('assets/slider/'.$value->file)}}" class="img-fluid"/>
                                        <i class="fas fa-angle-down"></i>

                                    </div>

                                    <?php
                                }
                                ?>
                            </div>
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