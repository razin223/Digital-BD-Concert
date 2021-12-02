@extends("new-admin-template")

@section("content")
<div class="row">
    <div class="col-12">
        <div class="card card-primary">
            <div class="card-header"><h4>Search</h4></div>
            <div class="card-body">
                <form>
                    <div class="row">
                        <div class="col-md-4">
                            <b>First Name</b>
                            <input type="text" name="first_name" value="{{request()->input('first_name')}}" class="form-control"/>
                        </div>
                        <div class="col-md-4">
                            <b>Last Name</b>
                            <input type="text" name="last_name" value="{{request()->input('last_name')}}" class="form-control"/>
                        </div>
                        <div class="col-md-4">
                            <b>Email</b>
                            <input type="text" name="email" value="{{request()->input('email')}}" class="form-control"/>
                        </div>
                        <div class="col-md-4">
                            <b>Mobile</b>
                            <input type="text" name="mobile" value="{{request()->input('mobile')}}" class="form-control"/>
                        </div>
                        <div class="col-md-4">
                            <b>Gender</b>
                            <select name="gender" class="form-control">
                                <option value="">(select)</option>
                                <?php
                                foreach (['Male', 'Female', 'Others'] as $value) {
                                    echo "<option value='$value'";
                                    echo (request()->input('gender') == $value) ? "selected" : "";
                                    echo ">$value</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <b>user Type</b>
                            <select name="user_type" class="form-control">
                                <option value="">(select)</option>
                                <?php
                                foreach (['Super Admin', 'Admin', 'Judge', 'Mentor', 'Entrepreneur', 'User'] as $value) {
                                    echo "<option value='$value'";
                                    echo ($value == request()->input('user_type')) ? "selected" : "";
                                    echo ">$value</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <b>Status</b>
                            <select name="status"class="form-control">
                                <option value="">(select)</option>
                                <?php
                                foreach (['Active', 'Inactive', 'Awaiting Verification'] as $value) {
                                    echo "<option value='$value'";
                                    echo ($value == request()->input('status')) ? "selected" : "";
                                    echo ">$value</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <!--<div class="col-md-4">
                            <b>Country</b>
                            <select name="country_id" id="country_id" class="form-control ">
                                <option value="">(select)</option>
                        <?php
                        foreach (\App\Country::orderBy('name', 'asc')->get() as $value) {
                            echo "<option value='{$value->id}'";
                            echo (request()->input('country_id') == $value->id) ? "selected" : "";
                            echo ">{$value->name}</option>";
                        }
                        ?>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <b>Division</b>
                            <select name="state_id" id="state_id" class="form-control ">
                        <?php
                        if (request()->input('country_id') != NULL) {
                            echo "<option value=''>(select)</option>";
                            foreach (\App\State::where('country_id', request()->input('country_id'))->orderBy('name', 'asc')->get() as $value) {
                                echo "<option value='{$value->id}'";
                                echo (request()->input('state_id') == $value->id) ? "selected" : "";
                                echo ">{$value->name}</option>";
                            }
                        }
                        ?>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <b>District</b>
                            <select name="city_id" id="city_id" class="form-control ">
                        <?php
                        if (request()->input('state_id') != NULL) {
                            echo "<option value=''>(select)</option>";
                            foreach (\App\City::where('state_id', request()->input('state_id'))->orderBy('name', 'asc')->get() as $value) {
                                echo "<option value='{$value->id}'";
                                echo (request()->input('city_id') == $value->id) ? "selected" : "";
                                echo ">{$value->name}</option>";
                            }
                        }
                        ?>
                            </select>
                        </div> -->
                    </div>
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <input type="submit" value="Search" class="btn btn-primary"/>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card card-dark">
                    <div class="card-header">
                        <h4>Search Result</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-condensed">
                                <thead>
                                    <tr>
                                        <th>&nbsp;</th>
                                        <th>#</th>
                                        <th>Startup</th>
                                        <th>Position</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Mobile</th>
                                        <th>Address</th>
                                        <th>Gender</th>
                                        <th>Education</th>
                                        <th>Last Degree</th>
                                        <th>Date of Birth</th>
                                        <th>Picture</th>
                                        <th>Experience</th>
                                        <th>Modification</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if ($SearchData->count()) {
                                        $Sl = 0;
                                        foreach ($SearchData as $Data) {
                                            $Sl++;
                                            ?>
                                            <tr>
                                                <td>
                                                    <?php
                                                    if ($Data->user_id == NULL) {
                                                        ?>
                                                        <a href="{{route('startupteammember_edit',['id'=>$Data->id])}}"><i class="fas fa-pencil-alt"></i></a> &nbsp;&nbsp;
                                                        <a onclick="return confirm('Do you really want to delete this team member?')" href="{{route('startupteammember_delete',['id'=>$Data->id])}}" class="text-danger"><i class="fas fa-times"></i></a>

                                                        <?php
                                                    }
                                                    ?>
                                                </td>
                                                <td>{{$Sl}}</td>
                                                <td>{{$Data->getStartup->startup_name}}</td>
                                                <td>{{$Data->position_name}}</td>
                                                <?php
                                                if ($Data->user_id != NULL) {
                                                    ?>
                                                    <td colspan="10" class="text-center text-info"><h3>Yourself</h3></td>
                                                    <?php
                                                } else {
                                                    ?>
                                                    <td>{{$Data->first_name}} {{$Data->last_name}}</td>
                                                    <td>{{$Data->email}}</td>
                                                    <td>{{$Data->mobile}}</td>
                                                    <td>{{$Data->address}}, {{$Data->getCity->name}}, {{$Data->getCity->getState->name}}, {{$Data->getCity->getState->getCountry->name}}</td>
                                                    <td>{{$Data->gender}}</td>
                                                    <td>{{$Data->getEducationLevel->education_level_name}}</td>
                                                    <td>{{$Data->last_degree_name}} ({{$Data->last_degree_passing_year}}</td>
                                                    <td>{{$Data->date_of_birth != NULL? date("d-M-Y",strtotime($Data->date_of_birth)):""}} </td>
                                                    <td>
                                                        <?php
                                                        if ($Data->picture != NULL) {
                                                            ?>
                                                            <img src="{{asset("profile_pictures/".$Data->picture)}}" style="width: 100px;padding: 5px;border: solid gray 1px;margin: 5px"/>
                                                            <?php
                                                        }
                                                        ?>
                                                    </td>
                                                    <td>{{str_replace("\n","<br/>",$Data->about_yourself)}}</td>
                                                    <?php
                                                }
                                                ?>

                                                <td>
                                                    {{$Data->getUser->first_name}} {{$Data->getUser->last_name}}
                                                    Created: {{date("d-M-Y h:i:sA",strtotime($Data->created_at))}}<br/>
                                                    Updated: {{date("d-M-Y h:i:sA",strtotime($Data->updated_at))}}<br/>
                                                </td>
                                            </tr>


                                            <?php
                                        }
                                    } else {
                                        ?>
                                        <tr>
                                            <td colspan="10" class="text-center text-warning">No data found.</td>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>

            </div>
        </div>

    </div>

</div>
@endsection