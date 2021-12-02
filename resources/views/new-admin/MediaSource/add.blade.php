@extends("new-admin-template")

@section("content")

<script type="text/javascript">
    $(document).ready(function () {

        $("#form").submit(function (event) {
            event.preventDefault();

            $.ajax({
                url: "{{route('mediasource_add')}}",
                method: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function (data) {
                    alert(data.message);
                    window.location.reload();
                },
                error: function (error, b) {
                    var message = JSON.parse(error.responseText);

                    alert("Error\n" + message.message);
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
                        <label for="exampleInputUsername2" class="col-sm-3 col-md-2 col-form-label">Media Source Name <span class="text-danger">*</span></label>
                        <div class="col-sm-9">
                            <input type="text" name="media_source_name"  class="form-control" id="exampleInputUsername2" placeholder="Media Source name ">
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