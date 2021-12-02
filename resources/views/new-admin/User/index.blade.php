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
                            <b>Name</b>
                            <input type="text" name="name" value="{{request()->input('name')}}" class="form-control"/>
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
                            <b>Email Verification Status</b>
                            <select name="email_verification" class="form-control">
                                <option value="">(select)</option>
                                <?php
                                foreach (['No', 'Yes',] as $value) {
                                    echo "<option value='$value'";
                                    echo (request()->input('email_verification') == $value) ? "selected" : "";
                                    echo ">$value</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <b>Profile Update Status</b>
                            <select name="profile_update" class="form-control">
                                <option value="">(select)</option>
                                <?php
                                foreach (['No', 'Yes',] as $value) {
                                    echo "<option value='$value'";
                                    echo (request()->input('profile_update') == $value) ? "selected" : "";
                                    echo ">$value</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <b>User Type</b>
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
                <div class="card card-success">
                    <div class="card-header">
                        <h4>Search Result</h4>
                    </div>
                    <div class="card-body">
                        <a href="{{route('User.export')}}?{{request()->getQueryString()}}" class="btn btn-app text-success" target="_blank"><i class="far fa-file-excel"></i>Excel</a>
                        <div class="table-responsive">
                            <table class="table table-condensed">
                                <thead>
                                    <tr>
                                        <th>&nbsp;</th>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Type</th>
                                        <th>Status</th>
                                        <th>Picture</th>
                                        <th>Modification</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if ($SearchData->count()) {
                                        $Sl = ($SearchData->currentPage() - 1) * $SearchData->perPage();
                                        foreach ($SearchData as $Data) {
                                            $Sl++;
                                            ?>
                                            <tr>
                                                <td>
                                                    <?php
                                                    if (\Auth::user()->user_type == 'Admin') {
                                                        ?>
                                                        <a href="{{route('User.edit',['User'=>$Data->id])}}"><i class="fas fa-pencil-alt"></i></a>
                                                        <?php
                                                    }
                                                    ?>
                                                </td>
                                                <td>{{$Sl}}</td>
                                                <td>{{$Data->name}}</td>
                                                <td>{{$Data->email}}</td>
                                                <td>{{$Data->user_type}}</td>
                                                <td>{{$Data->status}}</td>
                                                <td>
                                                    <?php
                                                    if (!empty($Data->picture)) {
                                                        ?>
                                                        <img src="{{$Data->picture}}" style='width:150px'/>
                                                        <?php
                                                    }
                                                    ?>
                                                </td>

                                                <td>
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
                        {{ $SearchData->withQueryString()->links() }}
                    </div>
                </div>

            </div>
        </div>

    </div>

</div>
@endsection