@extends("new-admin-template")

@section("content")
<?php
$UserData = Auth::user();
$Address = [
    'city_id' => null,
    'state_id' => null,
    'country_id' => null
];
if ($UserData->city_id != NULL) {
    $City = \App\City::find($UserData->city_id);
    $Address['city_id'] = $City->id;
    $State = $City->getState;
    $Address['state_id'] = $State->id;
    $Country = $State->getCountry;
    $Address['country_id'] = $Country->id;
}
?>

<script type="text/javascript">
    $(document).ready(function () {
        $("#form").submit(function (event) {
            event.preventDefault();

            $("#loading-Modal").modal();
            $.ajax({
                url: "/profile/edit",
                method: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function (data) {
                    $("#loading-Modal").modal('hide');
                    toastr.success(data.message, "Success");
                    
                    setTimeout(function(){
                        window.location = "/admin/dashboard";
                    },6000);
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
                        <label for="exampleInputUsername2" class="col-sm-3 col-md-2 col-form-label">Name <span class="text-danger">*</span></label>
                        <div class="col-sm-4">
                            <input type="text" name="first_name" value="{{$UserData->first_name}}" class="form-control" id="exampleInputUsername2" placeholder="First Name">
                        </div>
                        <div class="col-sm-4">
                            <input type="text" name="last_name" value="{{$UserData->last_name}}" class="form-control" id="exampleInputEmail2" placeholder="Last Name">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputEmail2" class="col-sm-3  col-md-2 col-form-label">Mobile <span class="text-danger">*</span></label>
                        <div class="col-sm-9">
                            <input type="text" name="mobile" value="{{$UserData->mobile}}"  class="form-control" id="exampleInputEmail2" placeholder="Mobile Number">
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
                                    echo ($value->id == $UserData->education_level_id) ? "selected" : '';
                                    echo ">{$value->education_level_name}</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputEmail2" class="col-sm-3  col-md-2 col-form-label">Last Degree Name <span class="text-danger">*</span></label>
                        <div class="col-sm-9">
                            <input type="text" name="last_degree_name" value="{{$UserData->last_degree_name}}" class="form-control" id="exampleInputEmail2" placeholder="B.Sc, M.Sc, BBA etc.">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputEmail2" class="col-sm-3  col-md-2 col-form-label">Last Degree Achieved in <span class="text-danger">*</span></label>
                        <div class="col-sm-9">
                            <select name="last_degree_passing_year" class="select2">
                                <option value="">(select)</option>
                                <?php
                                foreach (array_reverse(range(1950, (int) date("Y"), true)) as $value) {
                                    echo "<option value='$value'";
                                    if ($UserData->last_degree_passing_year != NULL) {
                                        if ($value == $UserData->last_degree_passing_year) {
                                            echo " selected ";
                                        }
                                    } else {
                                        if ($value == (int) date("Y")) {
                                            echo " selected ";
                                        }
                                    }

                                    echo ">$value</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="exampleInputEmail2" class="col-sm-3  col-md-2 col-form-label">Address <span class="text-danger">*</span></label>
                        <div class="col-sm-9">
                            <input type="text" name="address" value="{{$UserData->address}}" class="form-control" id="exampleInputEmail2" placeholder="House No, Road No, Village, Post etc" maxlength="255">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputMobile" class="col-sm-3  col-md-2 col-form-label">Country <span class="text-danger">*</span></label>
                        <div class="col-sm-9">
                            <select name="country_id" id="country_id" class="form-control select2">
                                <option value="">(select)</option>
                                <?php
                                foreach (\App\Country::orderBy('name', 'asc')->get() as $value) {
                                    echo "<option value='{$value->id}'";
                                    echo ($Address['country_id'] == $value->id) ? "selected" : "";
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
                                        echo ($Address['state_id'] == $value->id) ? "selected" : "";
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
                                        echo ($Address['city_id'] == $value->id) ? "selected" : "";
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
                            <input type="text" name="date_of_birth" value="{{$UserData->date_of_birth}}" class="form-control date" id="exampleInputEmail2" placeholder="DD-MM-YYYY">
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
                                    echo ($UserData->gender == $value) ? "selected" : "";
                                    echo ">$value</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="exampleInputEmail2" class="col-sm-3  col-md-2 col-form-label">Picture <span class="text-danger">*</span></label>
                        <div class="col-sm-9">
                            <input type="file" name="picture" class="form-control" id="exampleInputEmail2" <input type="file" name="myImage" accept="image/jpeg" />
                            <p class="text-info">Image must be JPEG/JPG. Maximum allowed size is 200KB. Use Square size image with minimum 300X300 pixel size.</p>
                            <?php
                            if ($UserData->picture != NULL) {
                                ?>
                                <img src="{{asset("profile_pictures/".$UserData->picture)}}" style="width: 100px;padding: 5px;border: solid gray 1px;margin: 5px"/>
                                <?php
                            }
                            ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="exampleInputEmail2" class="col-sm-3  col-md-2 col-form-label">Identification ID Type <span class="text-danger">*</span></label>
                        <div class="col-sm-9">
                            <select name="validation_id_type" class="form-control">
                                <option value="">(select)</option>
                                <?php
                                foreach (['National ID', 'Birth Certificate ID', 'Passport No'] as $value) {
                                    echo "<option value='$value'";
                                    echo ($value == $UserData->validation_id_type) ? "selected" : "";
                                    echo ">$value</option>";
                                }
                                ?>
                            </select>
                            <p class="text-info">For Bangladeshi applicant National ID and Birth Certificate are applicable. For International applicant Passport No is applicable. </p>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="exampleInputEmail2" class="col-sm-3  col-md-2 col-form-label">Identification ID <span class="text-danger">*</span></label>
                        <div class="col-sm-9">
                            <input type="text" name="validation_id" value="{{$UserData->validation_id}}" class="form-control" placeholder="123455ABC"/>
                        </div>
                    </div>





                    <div class="form-group row">
                        <label for="exampleInputEmail2" class="col-sm-3  col-md-2 col-form-label">How did you hear about us <span class="text-danger">*</span></label>
                        <div class="col-sm-9">
                            <select name="media_source_id" class="form-control">
                                <option value="">(select)</option>
                                <?php
                                foreach (\App\MediaSource::get() as $value) {
                                    echo "<option value='{$value->id}'";
                                    echo $UserData->media_source_id == $value->id ? "selected" : "";
                                    echo ">{$value->media_source_name}</option>";
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