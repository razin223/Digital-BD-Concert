@extends("new-admin-template")

@section("content")

<script type="text/javascript">
    $(document).ready(function () {



        $('#link').on('input propertychange paste', function () {
            var Link = $(this).val();

            $("#title").val("");
            $("#image").attr('src', "");

            $("#image-input").val("");

            if (Link.length > 10) {
                $("#loading-Modal").modal();
                $.ajax({
                    url: "{{route('newsadmin_getOGContent')}}",
                    data: {'link': Link},
                    success: function (data) {
                        console.log(data);
                        $("#loading-Modal").modal('hide');

                        $("#title").val(data.title);
                        $("#image").attr('src', data.image);

                        $("#image-input").val(data.image);
                    },

                    error: function (error) {
                        console.log(error);
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
                    },
                });
            }

        });

        $("#form").submit(function (event) {
            event.preventDefault();
            $("#loading-Modal").modal();
            $.ajax({
                url: "{{route('newsadmin_add')}}",
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
                        <label for="exampleInputEmail2" class="col-sm-3  col-md-2 col-form-label">News Link <span class="text-danger">*</span></label>
                        <div class="col-sm-9">
                            <input type="text" name="link" class="form-control" id="link" placeholder="https://example.com/example">
                            <p class="text-info">Must contain http or https at the begining of the link.</p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputEmail2" class="col-sm-3  col-md-2 col-form-label">Title <span class="text-danger">*</span></label>
                        <div class="col-sm-9">
                            <input type="text" name="title" class="form-control" id="title">
                            <p class="text-info">Format: News head line - (News company name)</p>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="exampleInputEmail2" class="col-sm-3  col-md-2 col-form-label">Image</label>
                        <div class="col-sm-9">
                            <img src="" id="image" style=" height: 250px; width: auto; max-width: 100%; max-height: 100%"/>
                            <input type="text" name="image" id="image-input" class="form-control" readonly/>
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