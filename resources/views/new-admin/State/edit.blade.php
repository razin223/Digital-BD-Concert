@extends("new-admin-template")

@section("content")

<script type="text/javascript">
    $(document).ready(function () {

        $("#form").submit(function (event) {
            event.preventDefault();

            $.ajax({
                url: "{{route('state_edit',$id)}}",
                method: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function (data) {
                    alert(data.message);
                    window.location = window.location.href;
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
                <?php
                $Data = \App\State::find($id);

                if ($Data != NULL) {
                    ?>
                    <form id="form" onsubmit="return false;" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="exampleInputUsername2" class="col-sm-3 col-md-2 col-form-label">State Name <span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <input type="text" name="state_name" value="{{$Data->name}}"  class="form-control" id="exampleInputUsername2" placeholder="Country name">
                            </div>

                        </div>
                        <div class="form-group row">
                            <label for="exampleInputUsername2" class="col-sm-3 col-md-2 col-form-label">Country Name <span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <select class="form-control select2" name="country_id">
                                    <option value="">(select)</option>
                                    <?php
                                    foreach (\App\Country::orderBy('name', 'asc')->get() as $value) {
                                        echo "<option value='{$value->id}'";
                                        echo ($Data->country_id == $value->id) ? " selected" : "";
                                        echo ">{$value->name}</option>";
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