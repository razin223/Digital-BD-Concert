@extends("new-admin-template")

@section("content")

<script type="text/javascript">


    $(document).ready(function () {


        $(".search_user").keyup(function () {
            var $Selector = $(this);
            setTimeout(User_Search($Selector), 300);
        });


        $("#form").submit(function (event) {
            event.preventDefault();

            $("#loading-Modal").modal();

            $.ajax({
                url: "{{route('startup_add')}}",
                method: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function (data) {
                    $("#loading-Modal").modal('hide');
                    alert(data.message);
                    window.location = "/admin/dashboard";
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

    function User_Search($Selector) {
        console.log($Selector.val().length);
        if ($Selector.val().length == 11) {
            $.get("/user/get_user", {"mobile": $Selector.val()}, function (data) {
                console.log(data);
                if (data.length) {
                    $Selector.siblings('.search_user_select').html("<option value='" + data[0].id + "'>" + data[0].name + "</option>");
                } else {
                    $Selector.siblings('.search_user_select').html("<option value=''>No user found.</option>");
                }
            });
        } else {
            $Selector.siblings('.search_user_select').html("<option value=''>Input mobile number upper.</option>");
        }
    }
</script>
<div class="row">
    <div class="col-sm-12">
        <?php
        $Startup = \App\Startup::where('created_by', auth()->id())->first();

        if ($Startup == NULL) {
            ?>
            <div class="card">
                <div class="card-body">
                    <form id="form" onsubmit="return false;" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <div class="col-sm-12 text-center text-info">All fields with <span class="text-danger">*</span> marks are mandatory.</div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputUsername2" class="col-sm-3 col-md-2 col-form-label">Startup Category <span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <select name="startup_category_id" class="form-control select2">
                                    <option value="">(select category)</option>
                                    <?php
                                    foreach (\App\StartupCategory::orderBy('startup_category_name', 'asc')->get() as $value) {
                                        echo "<option value='{$value->id}'>{$value->startup_category_name}</option>";
                                    }
                                    ?>
                                </select>
                            </div>

                        </div>
                        <div class="form-group row">
                            <label for="exampleInputUsername2" class="col-sm-3 col-md-2 col-form-label">Startup Name <span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <input type="text" name="startup_name"  class="form-control" id="exampleInputUsername2" placeholder="Startup name">
                            </div>

                        </div>
                        <div class="form-group row">
                            <label for="exampleInputEmail2" class="col-sm-3  col-md-2 col-form-label">Startup Details <span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <textarea name="startup_details" class="form-control"></textarea>
                                <p class="text-info">Maximum 250 words.</p>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputEmail2" class="col-sm-3  col-md-2 col-form-label">Startup Cover Picture </label>
                            <div class="col-sm-9">
                                <input type="file" name="startup_cover" class="form-control" id="exampleInputEmail2" accept="image/jpeg">
                                <p class="text-info">JPG/JPEG image with maximum of 1MB. Use 1920X1250 pixel.</p>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="exampleInputEmail2" class="col-sm-3  col-md-2 col-form-label">Startup Logo </label>
                            <div class="col-sm-9">
                                <input type="file" name="startup_logo" class="form-control" id="exampleInputEmail2" accept="image/jpeg">
                                <p class="text-info">JPG/JPEG image with maximum 100KB. Use Square size image 300X300 pixel.</p>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="exampleInputEmail2" class="col-sm-3  col-md-2 col-form-label">Startup Poster/Pitch Deck </label>
                            <div class="col-sm-9">
                                <input type="file" name="startup_poster" class="form-control" id="exampleInputEmail2" accept="image/jpeg,application/pdf">
                                <p class="text-info">PDF, JPG/JPEG image with any size, maximum 12MB.</p>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="exampleInputUsername2" class="col-sm-3 col-md-2 col-form-label">Startup Video Pitch Link </label>
                            <div class="col-sm-9">
                                <input type="text" name="startup_intro_video"  class="form-control" id="exampleInputUsername2" placeholder="Youtube link">
                                <p class="text-info">Youtube link.</p>
                            </div>

                        </div>


                        <div class="form-group row">
                            <label for="exampleInputUsername2" class="col-sm-3 col-md-2 col-form-label">Startup Website </label>
                            <div class="col-sm-9">
                                <input type="text" name="startup_website"  class="form-control" id="exampleInputUsername2" placeholder="Website address">
                                <p class="text-info">Website link.</p>
                            </div>

                        </div>

                        <div class="form-group row">
                            <label for="exampleInputEmail2" class="col-sm-3  col-md-2 col-form-label">Business Address </label>
                            <div class="col-sm-9">
                                <input type="text" name="business_address" value="" class="form-control" id="exampleInputEmail2" placeholder="House No, Road No, Village, Post etc" maxlength="255">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="exampleInputMobile" class="col-sm-3  col-md-2 col-form-label">Country </label>
                            <div class="col-sm-9">
                                <select name="country_id" id="country_id" class="form-control select2">
                                    <option value="">(select)</option>
                                    <?php
                                    foreach (\App\Country::orderBy('name', 'asc')->get() as $value) {
                                        echo "<option value='{$value->id}'";
                                        echo ">{$value->name}</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputMobile" class="col-sm-3  col-md-2 col-form-label">State </label>
                            <div class="col-sm-9">
                                <select name="state_id" id="state_id" class="form-control ">

                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="exampleInputMobile" class="col-sm-3  col-md-2 col-form-label">City </label>
                            <div class="col-sm-9">
                                <select name="city_id" id="city_id" class="form-control ">

                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputMobile" class="col-sm-3  col-md-2 col-form-label">Startup Stage <span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <select name="stage" class="form-control ">
                                    <option value="">(select)</option>
                                    <?php
                                    foreach (['Idea', 'MVP', 'Seed', 'Growth'] as $value) {
                                        echo "<option value='$value'>$value</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="exampleInputEmail2" class="col-sm-3  col-md-2 col-form-label">Startup Revenue (if any)</label>
                            <div class="col-sm-6">
                                <input type="text" name="revenue" value="" class="form-control" id="exampleInputEmail2" placeholder="In USD" maxlength="255">
                            </div>
                            <div class="col-sm-3 text-danger">(In USD)</div>
                        </div>


                        <div class="form-group row">
                            <label for="exampleInputEmail2" class="col-sm-3  col-md-2 col-form-label">Target Market <span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <textarea name="target_market" class="form-control"></textarea>
                                <p class="text-info">Maximum 100 words.</p>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="exampleInputEmail2" class="col-sm-3  col-md-2 col-form-label">Business Strategy <span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <textarea name="business_strategy" class="form-control"></textarea>
                                <p class="text-info">Maximum 250 words.</p>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="exampleInputEmail2" class="col-sm-3  col-md-2 col-form-label">Your Position in Startup </label>
                            <div class="col-sm-9">
                                <input type="text" name="position_name" class="form-control" placeholder="CEO, CTO, CFO, M.D Chairman etc.">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="exampleInputEmail2" class="col-sm-3  col-md-2 col-form-label">Tell us your experience being this position </label>
                            <div class="col-sm-9">
                                <textarea name="about_yourself" class="form-control" maxlength="1000"  placeholder="Write something about you"></textarea>
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
            <?php
        } else {
            ?>
            <h3 class="text-center text-warning">You already created your startup. You cannot create more.</h3>
            <h4 class="text-center">To add team member <a href="{{route('startupteammember_add')}}">Click here</a>.</h4>
            <?php
        }
        ?>
    </div>
</div>
@endsection