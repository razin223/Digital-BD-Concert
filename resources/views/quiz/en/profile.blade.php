@extends("quiz_en_template")

@section("content")

<style>



    .btn-learn-more {
        font-family: 'Hind Siliguri', sans-serif;
        font-weight: 600;
        font-size: 14px;
        letter-spacing: 1px;
        display: inline-block;
        padding: 12px 32px;
        border-radius: 5px;
        transition: 0.3s;
        line-height: 1;
        color: rgb(68, 68, 68);
        -webkit-animation-delay: 0.8s;
        animation-delay: 0.8s;
        margin-top: 6px;
        border: 2px solid rgb(68, 68, 68);
    }

    .btn-learn-more:hover {
        background: rgb(68, 68, 68);
        color: #fff;
        text-decoration: none;
    }

    .question span{
        margin-right: 10px;
    }

    .hidden{
        display: none;
    }




</style>

<section class="breadcrumbs">
    <h2 class="text-center">Profile</h2>
</section>
<!-- ======= Cta Section ======= -->
<section class="services" style="background-color: #fff">
    <div class="container">
        <?php
        $Data = \App\User::find(auth()->id());
        $CountryId = $DivisionId = $DistrictId = null;
        if (!empty($Data->district_id)) {
            $DistrictId = $Data->district_id;
            $DivisionId = $Data->getDistrict->division_id;
            $CountryId = $Data->getDistrict->getDivision->country_id;
        }
        ?>
        <div class="row">
            <div class="col-12 col-md-8 offset-md-2 hidden collapse" id="profile_edit">
                <h6 class="w-100 text-center font-weight-bold"> <span class="text-danger">*</span> makred fields must be filled.</h6>
                <?php
                if (\Session::has('error')) {
                    ?>
                    <p class="w-100 text-center text-danger">{{\Session::get('error')}}</p>
                    <?php
                }
                ?>
                <div class="card card-info">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12" id="message_zone"></div>
                        </div>
                        <form id="form" onsubmit="return false;" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row p-1">
                                <label class="col-12"><span class="text-danger">*</span> Name: </label>
                                <div class="col-12">
                                    <input type="text" name="name" value="{{$Data->name}}" class="form-control" placeholder="Write your full name"/>
                                </div>
                            </div>
                            <div class="form-group row p-1">
                                <label class="col-12"><span class="text-danger">*</span> Occupation </label>
                                <div class="col-12">
                                    <input type="text" name="occupation" value="{{$Data->occupation}}" class="form-control" placeholder="Write your occupation"/>
                                </div>
                            </div>
                            <div class="form-group row p-1">
                                <label class="col-12"><span class="text-danger">*</span> Gender </label>
                                <div class="col-12">
                                    <select name="gender" class="form-control">
                                        <option value=""></option>
                                        <?php
                                        foreach (['Male' => 'Male', 'Female' => 'Female', 'Others' => 'Others'] as $key => $value) {
                                            echo "<option value='{$key}'";
                                            echo ($Data->gender == $key) ? "selected" : "";
                                            echo ">{$value}</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row p-1">
                                <label class="col-12"><span class="text-danger">*</span> Address: </label>
                                <div class="col-12">
                                    <input type="text" name="address" value="{{$Data->address}}" class="form-control" placeholder="Write your address (house no, road no etc.)"/>
                                </div>
                            </div>
                            <div class="form-group row p-1">
                                <label class="col-12"><span class="text-danger">*</span> Country: </label>
                                <div class="col-12">
                                    <select name="country_id" id="country_id" class="form-control">
                                        <option value=""></option>
                                        <?php
                                        foreach (\App\Country::orderBy('name', 'asc')->get() as $value) {
                                            echo "<option value='{$value->id}'";
                                            echo ($CountryId == $value->id) ? "selected" : "";
                                            echo ">{$value->name}</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row p-1">
                                <label class="col-12"><span class="text-danger">*</span> Division/State: </label>
                                <div class="col-12">
                                    <select name="division_id" id="division_id" class="form-control">
                                        <?php
                                        if (!empty($CountryId)) {
                                            ?>
                                            <option value=""></option>
                                            <?php
                                            foreach (\App\Division::where('country_id', $CountryId)->orderBy('name', 'asc')->get() as $value) {
                                                echo "<option value='{$value->id}'";
                                                echo ($DivisionId == $value->id) ? "selected" : "";
                                                echo ">{$value->name}</option>";
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row p-1">
                                <label class="col-12"><span class="text-danger">*</span>District/City: </label>
                                <div class="col-12">
                                    <select name="district_id" id="district_id" class="form-control">
                                        <?php
                                        if (!empty($DivisionId)) {
                                            ?>
                                            <option value=""></option>
                                            <?php
                                            foreach (\App\District::where('division_id', $DivisionId)->orderBy('name', 'asc')->get() as $value) {
                                                echo "<option value='{$value->id}'";
                                                echo ($DistrictId == $value->id) ? "selected" : "";
                                                echo ">{$value->name}</option>";
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row p-1">
                                <label class="col-12"><span class="text-danger">*</span> Date of Birth: </label>
                                <div class="col-12">
                                    <input type="text" name="date_of_birth" id="date_of_birth" value="{{$Data->date_of_birth}}" class="form-control" placeholder="Write your deate of birth"/>
                                </div>
                            </div>
                            <div class="form-group row p-1">
                                <label class="col-12"><span class="text-danger">*</span> Nationality: </label>
                                <div class="col-12">
                                    <select name="nationality" class="form-control">
                                        <option value=""></option>
                                        <<?php
                                        foreach (\App\Country::orderBy('name', 'asc')->get() as $value) {
                                            echo "<option value='{$value->id}'";
                                            echo ($Data->nationality == $value->id) ? "selected" : "";
                                            echo ">{$value->nationality}</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row p-1">
                                <label class="col-12"><span class="text-danger">*</span> Mobile No: </label>
                                <div class="col-12">
                                    <input type="text" name="mobile_number" value="{{$Data->mobile_number}}" class="form-control" placeholder="Write your mobile no"/>
                                    <span class="text-info">মোবাইল নং ইংরেজিতে লিখুন</span>
                                </div>
                            </div>
                            <div class="form-group row p-1">
                                <label class="col-12"> Picture:  </label>
                                <div class="col-12">
                                    <input type="file" name="file" value="" class="form-control" placeholder="Select your picture" accept="image/png, image/jpeg"/>
                                    <span class="text-info">Picture must be jpg/jpeg/png and maximum 512KB.</span><br/>
                                    <?php
                                    if (!empty($Data->picture)) {
                                        ?>
                                        <img src="{{\Storage::url($Data->picture)}}" style="width: 200px"/>
                                        <?php
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="form-group row p-1">
                                <div class="col-12 text-center">
                                    <input type="submit" value="Update" class="btn btn-info"/> 
                                    <a class="btn btn-outline-dark close-button"  href="javascript:;" data-target="profile_edit">Close</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-8 offset-md-2 mt-5 hidden" id="password_change">
                <div class="card">
                    <div class="card-body">
                        <form id="form_password">
                            @csrf
                            <h4 class="w-100 text-center font-weight-bold">Password Change</h4>
                            <div class="form-group row p-1">
                                <label class="col-12"><span class="text-danger">*</span> Current Password: </label>
                                <div class="col-12">
                                    <input type="password" name="current_password"  class="form-control" placeholder="Write current password"/>
                                </div>
                            </div>
                            <div class="form-group row p-1">
                                <label class="col-12"><span class="text-danger">*</span> New password: </label>
                                <div class="col-12">
                                    <input type="password" name="new_password"  class="form-control" placeholder="Write your new password"/>
                                </div>
                            </div>
                            <div class="form-group row p-1">
                                <label class="col-12"><span class="text-danger">*</span> Re-enter New password: </label>
                                <div class="col-12">
                                    <input type="password" name="new_password_confirmation" class="form-control" placeholder="Re-enter new password"/>
                                </div>
                            </div>
                            <div class="form-group row p-1">
                                <div class="col-12 text-center">
                                    <input type="submit" value="Change Password" class="btn btn-info"/> 
                                    <a class="btn btn-outline-dark close-button"  href="javascript:;" data-target="password_change">Close</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-8 offset-md-2 mt-5">
                <h6 class="bg-info text-center text-white w-100 p-2 m-2 mb-5">If your profile data is not updated completely, please update. Otherwise your browsing will be limited.</h6>
                <?php
                $Data = \App\User::find(auth()->id());
                ?>
                <table class="table" style="border: solid lightgray 1px">
                    <tbody>
                        <tr>
                            <td rowspan="4" style="border: solid lightgray 1px" class="text-center">
                                <?php
                                if ($Data->picture != null) {
                                    ?>
                                    <img src="{{\Storage::url($Data->picture)}}" style="max-width: 100px; max-height: 100px"/>
                                    <?php
                                } else {
                                    ?>
                                    <h6>NO PICTURE GIVEN.</h6>
                                    <?php
                                }
                                ?>
                            </td>
                            <td>Name: {{($Data->name != null)? $Data->name:"NOT GIVEN"}}</td>
                        </tr>
                        <tr>
                            <td>Mobile No: {{$Data->mobile_number != null? $Data->mobile_number: "NOT GIVEN."}}</td>
                        </tr>
                        <tr>
                            <td>Email: {{$Data->email}}</td>
                        </tr>
                        <tr>
                            <td>Occupation: {{$Data->occupation != null? $Data->occupation: "NOT GIVEN."}}</td>
                        </tr>
                        <tr>
                            <td>Address: </td>
                            <td>
                                <?php
                                if ($Data->address != null) {
                                    ?>
                                    {{$Data->address}},
                                    <?php
                                }
                                if ($Data->district_id != null) {
                                    ?>
                                    {{$Data->getDistrict->name}}, {{$Data->getDistrict->getDivision->name}}, {{$Data->getDistrict->getDivision->getCountry->name}}
                                    <?php
                                }
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Date of Birth: </td>
                            <td>{{$Data->date_of_birth != null ? date("d-M-Y",strtotime($Data->date_of_birth)):"NOT GIVEN"}}</td>
                        </tr>
                        <tr>
                            <td>Gender: </td>
                            <td>{{$Data->gender != null ? $Data->gender:"NOT GIVEN"}}</td>
                        </tr>
                        <tr>
                            <td>Nationality: </td>
                            <td>{{$Data->nationality != null ? $Data->getNationality->name:"NOT GIVEN"}}</td>
                        </tr>
                        <tr class="text-center">

                            <td colspan="2">
                                <button class="btn btn-primary edit" data-target="profile_edit">Edit Profile</button> &nbsp; &nbsp;
                                <button class="btn btn-info edit" data-target="password_change">Change Password</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section><!-- End Cta Section -->

<script type="text/javascript">
    $(document).ready(function () {

        $(".edit").click(function () {
            var ID = $(this).data('target');

            $("#" + ID).show();

            $('html, body').animate({
                scrollTop: $("#" + ID).offset().top - 120
            }, 1000);
        });

        $(".close-button").click(function () {
            var ID = $(this).data('target');

            $("#" + ID).hide();
        });


        $('#date_of_birth').attr('readonly', true).datepicker({format: 'yyyy-mm-dd', uiLibrary: 'bootstrap4'});

        $("#country_id").change(function () {
            $("#division_id,#district_id").html("");
            if ($(this).val() != "") {
                $("#division_id").html("<option value=''>(Loading)</option>");
                $.ajax({
                    url: "{{route('division_get')}}",
                    data: {'country_id': $(this).val(), 'order_by': 'name'},
                    success: function (data) {
                        if (data.length) {
                            var HTML = "<option value=''>(Division/State)</option>";
                            for (var i in data) {
                                HTML += "<option value='" + data[i].id + "'>" + data[i].name + "</option>";
                            }
                            $("#division_id").html(HTML);
                        }
                    },
                    error: function (error) {
                        alert("Error occured." + error.responseText);
                    }
                });
            }
        });




        $("#division_id").change(function () {
            $("#district_id").html("");
            if ($(this).val() != "") {
                $("#district_id").html("<option value=''>(Loading)</option>");
                $.ajax({
                    url: "{{route('district_get')}}",
                    data: {'division_id': $(this).val(), 'order_by': 'name'},
                    success: function (data) {
                        if (data.length) {
                            var HTML = "<option value=''>(District/City)</option>";
                            for (var i in data) {
                                HTML += "<option value='" + data[i].id + "'>" + data[i].name + "</option>";
                            }
                            $("#district_id").html(HTML);
                        }
                    },
                    error: function (error) {
                        alert("Error occured." + error.responseText);
                    }
                });
            }
        });

        $("#form").submit(function (e) {
            e.preventDefault();

            $.ajax({
                url: "{{route('profile_update')}}",
                method: "POST",
                data: new FormData(this),
                processData: false,
                contentType: false,
                success: function (data) {
                    if (data.status) {
                        alert('Your profile has been updated.');
                    }
                },
                error: function (error) {
                    var message = JSON.parse(error.responseText);

                    var Error = message.message;

                    if (typeof message.errors != 'undefined') {
                        var ErrorMessages = message.errors;
                        for (var i in ErrorMessages) {
                            Error += "\n" + ErrorMessages[i][0];
                        }
                    }

                    alert("Profile cannot be updated.\n" + Error);
                }
            });
        });



        $("#form_password").submit(function (e) {
            e.preventDefault();

            $.ajax({
                url: "{{route('profile_password_update')}}",
                method: "POST",
                data: new FormData(this),
                processData: false,
                contentType: false,
                success: function (data) {
                    if (data.status) {
                        alert('Your password has been updated.');
                    }
                },
                error: function (error) {
                    var message = JSON.parse(error.responseText);

                    var Error = message.message;

                    if (typeof message.errors != 'undefined') {
                        var ErrorMessages = message.errors;
                        for (var i in ErrorMessages) {
                            Error += "\n" + ErrorMessages[i][0];
                        }
                    }

                    alert("Password cannot be changed.\n" + Error);
                }
            });
        });

    });
</script>




@endsection