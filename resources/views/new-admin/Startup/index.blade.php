@extends("new-admin-template")

@section("content")
<div class="row">
    <div class="col-12">
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
                                <th>Startup Name</th>
                                <th>Category</th>
                                <th>Images</th>
                                <th>Startup Details</th>
                                <th>Links</th>
                                <th>Address</th>
                                <th>Startup Status</th>
                                <th>Startup Plan of Action</th>
                                <th>Team Members</th>
                                <th>Modification</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $Sl = 0;
                            foreach ($SearchData as $Data) {
                                $Sl++;
                                ?>
                                <tr>
                                    <td>
                                        <a href="{{route('startup_edit',['id'=>$Data->id])}}"><i class="fas fa-pencil-alt"></i></a> &nbsp;&nbsp;&nbsp;&nbsp;
                                        <a onclick="return confirm('Do you really want to delete this?')" href="{{route('startup_delete',['id'=>$Data->id])}}" class="text-danger"><i class="fas fa-times"></i></a>
                                    </td>
                                    <td>{{$Sl}}</td>
                                    <td>{{$Data->startup_name}}</td>
                                    <td>{{$Data->getStartupCategory->startup_category_name}}</td>
                                    <td>
                                        <?php
                                        if (!empty($Data->startup_logo)) {
                                            ?>
                                            <img src="{{asset('startup_content/'.$Data->startup_logo)}}" class="rounded" style="width: 100px"/><br/>
                                            Logo
                                            <?php
                                        }
                                        ?>

                                        <?php
                                        if (!empty($Data->startup_cover)) {
                                            ?>
                                            <img src="{{asset('startup_content/'.$Data->startup_cover)}}" class="rounded" style="width: 300px"/><br/>
                                            Cover
                                            <?php
                                        }
                                        ?>

                                        <?php
                                        if (!empty($Data->startup_poster)) {
                                            $ExtensionArray = explode('.', $Data->startup_poster);
                                            if (strtolower(end($ExtensionArray)) == 'jpeg' || strtolower(end($ExtensionArray)) == 'jpg' || strtolower(end($ExtensionArray)) == 'png') {
                                                ?>
                                                <img src="{{asset('startup_content/'.$Data->startup_poster)}}" class="rounded" style="width: 300px"/><br/>
                                                Poster
                                                <?php
                                            } else {
                                                ?>
                                                Poster
                                                <a href="{{asset('startup_content/'.$Data->startup_poster)}}" target='_blank' class='btn btn-primary'>PDF</a>
                                                <?php
                                            }
                                        }
                                        ?>


                                        <?php
                                        if (!empty($Data->group_picture)) {
                                            ?>
                                            <img src="{{asset('startup_content/'.$Data->group_picture)}}" class="rounded" style="width: 300px"/><br/>
                                            Poster
                                            <?php
                                        }
                                        ?>



                                    </td>
                                    <td>
                                        <div class="overflow-auto">
                                            {!! $Data->startup_details !!}
                                        </div>
                                    </td>
                                    <td>
                                        <strong>Youtube Intro Link:</strong> <?php if (!empty($Data->startup_intro_video)) { ?>
                                            <a href="{{$Data->startup_intro_video}}" target="_blank">{{$Data->startup_intro_video}}</a>
                                            <?php
                                        } else {
                                            echo "Not given.";
                                        }
                                        ?>
                                        <br/>
                                        <strong>Website:</strong> <?php if (!empty($Data->startup_website)) { ?>
                                            <a href="{{$Data->startup_website}}" target="_blank">{{$Data->startup_website}}</a>
                                            <?php
                                        } else {
                                            echo "Not given.";
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                        if (!empty($Data->business_address)) {
                                            echo $Data->business_address;
                                        }
                                        if (!empty($Data->city_id)) {
                                            echo "<br/>";
                                            echo "<strong>City:</strong>" . $Data->getCity->name . "<br/>";
                                            echo "<strong>State:</strong>" . $Data->getCity->getState->name . "<br/>";
                                            echo "<strong>Country:</strong>" . $Data->getCity->getState->getCountry->name . "<br/>";
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <strong>Stage:</strong> {{$Data->stage}}<br/>
                                        <strong>Revenue:</strong> {{!empty($Data->revenue)? $Data->revenue." USD": "N/A"}}<br/>
                                    </td>
                                    <td>
                                        <strong>Target Market:</strong> {{ $Data->target_market }}<br/>
                                        <strong>Business Strategy:</strong> {{ $Data->business_strategy }}<br/>
                                    </td>
                                    <td>
                                        <?php
                                        foreach ($Data->getStartupTeamMember as $value) {

                                            if ($value->user_id != null) {
                                                echo $value->getMember->first_name . " " . $value->getMember->last_name . " - ";
                                                echo (!empty($value->position_name)) ? $value->position_name : "N/A";
                                                echo "<br/>";
                                            } else {
                                                echo $value->first_name . " " . $value->last_name . " - " . $value->position_name . "<br/>";
                                            }
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        {{$Data->getUser->first_name}} {{$Data->getUser->last_name}}<br/>
                                        Created: {{date("d-M-Y h:i:sA",strtotime($Data->created_at))}}<br/>
                                        Updated: {{date("d-M-Y h:i:sA",strtotime($Data->updated_at))}}<br/>
                                    </td>
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
@endsection