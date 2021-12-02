@extends("new-admin-template")

@section("content")


<script type="text/javascript">
    $(document).ready(function () {

        $("#form").submit(function (event) {
            event.preventDefault();
            $("#loading-Modal").modal();
            $.ajax({
                url: "{{route('User.update',$UserData->id)}}",
                method: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function (data) {
                    $("#loading-Modal").modal('hide');
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
                    @method('PUT')
                    <div class="form-group row">
                        <div class="col-sm-12 text-center text-info">All fields with <span class="text-danger">*</span> marks are mandatory.</div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-3 col-md-2 col-form-label">Name <span class="text-danger">*</span></label>
                        <div class="col-sm-9">
                            <input type="text" name="name" value="{{$UserData->name}}" class="form-control" id="exampleInputUsername2" placeholder="Name">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputEmail2" class="col-sm-3  col-md-2 col-form-label">Email <span class="text-danger">*</span></label>
                        <div class="col-sm-9">
                            <input type="text" name="email" value="{{$UserData->email}}"  class="form-control" id="exampleInputEmail2" placeholder="Email address">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputEmail2" class="col-sm-3  col-md-2 col-form-label">Password </label>
                        <div class="col-sm-9">
                            <input type="password" name="password" value=""  class="form-control" id="exampleInputEmail2" placeholder="Password ">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="exampleInputEmail2" class="col-sm-3  col-md-2 col-form-label">Confirm Password </label>
                        <div class="col-sm-9">
                            <input type="password" name="password_confirmation" value=""  class="form-control" id="exampleInputEmail2" placeholder="Confirm Password ">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="exampleInputEmail2" class="col-sm-3  col-md-2 col-form-label">User Type <span class="text-danger">*</span></label>
                        <div class="col-sm-9">
                            <select class="form-control" name="user_type">
                                <option value=""></option>
                                <?php
                                foreach (['Admin', 'Manager', 'Entry', 'User'] as $value) {
                                    echo "<option value='$value'";
                                    echo ($UserData->user_type == $value) ? "selected" : "";
                                    echo ">$value</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="exampleInputEmail2" class="col-sm-3  col-md-2 col-form-label">Picture </label>
                        <div class="col-sm-9">
                            <input type="file" name="picture" class="form-control" id="exampleInputEmail2" accept="image/png, image/jpeg" />
                            <?php
                            if (!empty($UserData->picture)) {
                                ?>
                                <div style="width: 100px; height: 100px">
                                    <img src="{{\Storage::url($UserData->picture)}}" class="img-fluid"/>
                                </div>
                                <?php
                            }
                            ?>
                            <p class="text-info">Use Square size image with minimum 300X300 pixel size.</p>
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="exampleInputEmail2" class="col-sm-3  col-md-2 col-form-label">User Status</label>
                        <div class="col-sm-9">
                            <select name="status" class="form-control">
                                <?php
                                foreach (['Active', 'Inactive', 'Awaiting Verification'] as $value) {
                                    echo "<option value='$value'";
                                    echo ($value == $UserData->status) ? "selected" : "";
                                    echo ">$value</option>";
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
@endsection