@extends("new-admin-template")

@section("content")

<script type="text/javascript">
    $(document).ready(function () {

        $("#form").submit(function (event) {
            event.preventDefault();
            $("#loading-Modal").modal();
            $.ajax({
                url: "{{route('startupteammember_add')}}",
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
                        <div class="col-sm-12 text-center text-info">All fields with <span class="text-danger">*</span> marks are mandatory.</div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputEmail2" class="col-sm-3  col-md-2 col-form-label">Startup <span class="text-danger">*</span></label>
                        <div class="col-sm-9">
                            <select name="startup_id" class="form-control">
                                <?php
                                foreach (\App\Startup::where('created_by', auth()->id())->get() as $value) {
                                    ?>
                                    <option value="{{$value->id}}">{{$value->startup_name}}</option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputEmail2" class="col-sm-3  col-md-2 col-form-label">Position <span class="text-danger">*</span></label>
                        <div class="col-sm-9">
                            <input type="text" name="position_name" value=""  class="form-control" id="exampleInputEmail2" placeholder="CEO, CTO, CFO etc.">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-3 col-md-2 col-form-label">Name <span class="text-danger">*</span></label>
                        <div class="col-sm-4">
                            <input type="text" name="first_name" value="" class="form-control" id="exampleInputUsername2" placeholder="First Name">
                        </div>
                        <div class="col-sm-4">
                            <input type="text" name="last_name" value="" class="form-control" id="exampleInputEmail2" placeholder="Last Name">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputEmail2" class="col-sm-3  col-md-2 col-form-label">Email <span class="text-danger">*</span></label>
                        <div class="col-sm-9">
                            <input type="text" name="email" value=""  class="form-control" id="exampleInputEmail2" placeholder="Email address">
                        </div>
                    </div>



                    <div class="form-group row">
                        <label for="exampleInputEmail2" class="col-sm-3  col-md-2 col-form-label">Mobile <span class="text-danger">*</span></label>
                        <div class="col-sm-9">
                            <input type="text" name="mobile" value=""  class="form-control" id="exampleInputEmail2" placeholder="Mobile Number">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputEmail2" class="col-sm-3  col-md-2 col-form-label">Gender <span class="text-danger">*</span></label>
                        <div class="col-sm-9">
                            <select name="gender" class="form-control">
                                <option value="">(select)</option>
                                <?php
                                foreach (['Male', 'Female', 'Others'] as $value) {
                                    echo "<option value='$value'";

                                    echo ">$value</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputEmail2" class="col-sm-3  col-md-2 col-form-label">Education <span class="text-danger">*</span></label>
                        <div class="col-sm-9">
                            <select name="education_level_id" class="form-control">
                                <option value="">(select)</option>
                                <?php
                                foreach (\App\EducationLevel::orderBy('education_level_name')->get() as $value) {
                                    echo "<option value='{$value->id}'";
                                    echo ">{$value->education_level_name}</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputEmail2" class="col-sm-3  col-md-2 col-form-label">Last Degree Name <span class="text-danger">*</span></label>
                        <div class="col-sm-9">
                            <input type="text" name="last_degree_name" value="" class="form-control" id="exampleInputEmail2" placeholder="B.Sc, M.Sc, BBA etc.">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputEmail2" class="col-sm-3  col-md-2 col-form-label">Last Degree Achieved in <span class="text-danger">*</span></label>
                        <div class="col-sm-9">
                            <select name="last_degree_passing_year" class="form-control select2">
                                <option value="">(select)</option>
                                <?php
                                foreach (array_reverse(range(1950, (int) date("Y"), true)) as $value) {
                                    echo "<option value='$value'";

                                    echo ">$value</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="exampleInputEmail2" class="col-sm-3  col-md-2 col-form-label">Address <span class="text-danger">*</span></label>
                        <div class="col-sm-9">
                            <input type="text" name="address" value="" class="form-control" id="exampleInputEmail2" placeholder="House No, Road No, Village, Post etc" maxlength="255">
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
                        <label for="exampleInputMobile" class="col-sm-3  col-md-2 col-form-label">State <span class="text-danger">*</span></label>
                        <div class="col-sm-9">
                            <select name="state_id" id="state_id" class="form-control ">
                                <?php
                                if (isset($Address['country_id'])) {
                                    echo "<option value=''>(select)</option>";
                                    foreach (\App\State::where('country_id', $Address['country_id'])->orderBy('name', 'asc')->get() as $value) {
                                        echo "<option value='{$value->id}'";

                                        echo ">{$value->name}</option>";
                                    }
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="exampleInputMobile" class="col-sm-3  col-md-2 col-form-label">City <span class="text-danger">*</span></label>
                        <div class="col-sm-9">
                            <select name="city_id" id="city_id" class="form-control ">
                                <?php
                                if (isset($Address['state_id'])) {
                                    echo "<option value=''>(select)</option>";
                                    foreach (\App\City::where('state_id', $Address['state_id'])->orderBy('name', 'asc')->get() as $value) {
                                        echo "<option value='{$value->id}'";

                                        echo ">{$value->name}</option>";
                                    }
                                }
                                ?>
                            </select>
                        </div>
                    </div>



                    <div class="form-group row">
                        <label for="exampleInputEmail2" class="col-sm-3  col-md-2 col-form-label">Date of Birth</label>
                        <div class="col-sm-9">
                            <input type="text" name="date_of_birth" value="" class="form-control date" id="exampleInputEmail2" placeholder="DD-MM-YYYY">
                        </div>
                    </div>



                    <div class="form-group row">
                        <label for="exampleInputEmail2" class="col-sm-3  col-md-2 col-form-label">Picture <span class="text-danger">*</span></label>
                        <div class="col-sm-9">
                            <input type="file" name="picture" class="form-control" id="exampleInputEmail2" accept="image/jpeg" >
                            <p class="text-info">Use Square size image with minimum 300X300 pixel size with maximum 100KB.</p>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="exampleInputEmail2" class="col-sm-3  col-md-2 col-form-label">Tell us about your team member's experience being at this position <span class="text-danger">*</span></label>
                        <div class="col-sm-9">
                            <textarea name="about_yourself" class="form-control" maxlength="1000" rows="4" placeholder="Write something about your team member why he is qualified for his position"></textarea>
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