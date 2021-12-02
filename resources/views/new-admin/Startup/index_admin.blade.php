@extends("new-admin-template")

@section("content")
<div class="row">
    <div class="col-12">

        <div class="card card-primary">
            <div class="card-header">
                <h4>Search</h4>
            </div>
            <div class="card-body">
                <form>
                    <div class="row">
                        <div class="col-md-4">
                            <b>Startup Name</b>
                            <input type="text" name="startup_name" value="{{request()->input('startup_name')}}" placeholder="Startup name" class="form-control"/>
                        </div>
                        <div class="col-md-4">
                            <b>Startup Category</b>
                            <select name="startup_category_id" class="form-control">
                                <option value="">(select)</option>
                                <?php
                                foreach (\App\StartupCategory::orderBy('startup_category_name', 'asc')->get() as $value) {
                                    echo "<option value='{$value->id}'";
                                    echo (request()->input('startup_category_id') == $value->id) ? " selected" : '';
                                    echo ">{$value->startup_category_name}</option>";
                                }
                                ?>
                            </select>
                        </div>


                        <div class="col-md-4">
                            <b>Startup Status</b>
                            <select name="startup_status" class="form-control">
                                <option value="">(select)</option>
                                <?php
                                foreach (['Applied', 'Not Applied'] as $value) {
                                    echo "<option value='{$value}'";
                                    echo (request()->input('startup_status') == $value) ? " selected" : '';
                                    echo ">{$value}</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-12 text-center">&nbsp;</div>
                        <div class="col-12 text-center">
                            <input type="submit" value="Search" class="btn btn-primary"/>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="card card-dark">
            <div class="card-header">
                <h4>Search Result</h4>
            </div>
            <div class="card-body">
                <a href="{{route('startup_export_excel')}}?{{request()->getQueryString()}}" class="btn btn-app text-success" target="_blank"><i class="far fa-file-excel"></i>Excel</a>

                <div class="table-responsive">
                    <br/>
                    {{ $SearchData->withQueryString()->links() }}
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
                            $Sl = ($SearchData->currentPage() - 1) * $SearchData->perPage();
                            foreach ($SearchData as $Data) {
                                $Sl++;
                                ?>
                                <tr>
                                    <td>
    <!--                                        <a href="{{route('startup_edit',['id'=>$Data->id])}}"><i class="fas fa-pencil-alt"></i></a> &nbsp;&nbsp;&nbsp;&nbsp;
                                        <a onclick="return confirm('Do you really want to delete this?')" href="{{route('startup_delete',['id'=>$Data->id])}}" class="text-danger"><i class="fas fa-times"></i></a>-->
                                    </td>
                                    <td>{{$Sl}}</td>
                                    <td>{{$Data->startup_name}}</td>
                                    <td>{{$Data->getStartupCategory->startup_category_name}}</td>
                                    <td>
                                        <div style="width: 400px; height: 300px" class="overflow-auto">
                                            <?php
                                            if (!empty($Data->startup_logo)) {
                                                ?>
                                                Logo<br/>
                                                <img src="{{(!empty($Data->startup_logo) && file_exists(public_path('startup_content/'.$Data->startup_logo)))? asset('startup_content/'.$Data->startup_logo):asset('assets/img/no-image.png')}}" class="rounded" style="width: 100px"/><br/>
                                                <br/>
                                                <?php
                                            }
                                            ?>

                                            <?php
                                            if (!empty($Data->startup_cover)) {
                                                ?>
                                                Cover<br/>
                                                <img src="{{(!empty($Data->startup_cover) && file_exists(public_path('startup_content/'.$Data->startup_cover)))? asset('startup_content/'.$Data->startup_cover):asset('assets/img/no-image.png')}}" class="rounded" style="width: 300px"/><br/>
                                                <br/>
                                                <?php
                                            }
                                            ?>

                                            <?php
                                            if (!empty($Data->startup_poster)) {
                                                $ExtensionArray = explode('.', $Data->startup_poster);
                                                if (strtolower(end($ExtensionArray)) == 'jpeg' || strtolower(end($ExtensionArray)) == 'jpg' || strtolower(end($ExtensionArray)) == 'png') {
                                                    ?>
                                                    <img src="{{(!empty($Data->startup_poster) && file_exists(public_path('startup_content/'.$Data->startup_poster)))? asset('startup_content/'.$Data->startup_poster):asset('assets/img/no-image.png')}}" class="rounded" style="width: 300px"/><br/>
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
                                                Group Picture
                                                <img src="{{(!empty($Data->startup_poster) && file_exists(public_path('startup_content/'.$Data->group_picture)))? asset('startup_content/'.$Data->group_picture):asset('assets/img/no-image.png')}}" class="rounded" style="width: 300px"/><br/>

                                                <?php
                                            }
                                            ?>

                                        </div>

                                    </td>
                                    <td>
                                        <div style="width: 100%; height: 300px" class="overflow-auto">
                                            {{ str_replace(['\n'],['<br/>'],$Data->startup_details) }}
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
                                        <div style="width: 100%; height: 300px; overflow-y: auto">
                                            <strong>Stage:</strong> {{$Data->stage}}<br/>
                                            <strong>Revenue:</strong> {{!empty($Data->revenue)? $Data->revenue." USD": "N/A"}}<br/>
                                        </div>
                                    </td>
                                    <td>
                                        <div style="width: 100%; height: 300px; overflow-y: auto">
                                            <strong>Target Market:</strong> {{ str_replace(['\n'],['<br/>'],$Data->target_market) }}<br/>
                                            <strong>Business Strategy:</strong> {{ str_replace(['\n'],['<br/>'],$Data->business_strategy) }}<br/>
                                        </div>
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

                    {{ $SearchData->withQueryString()->links() }}
                </div>
            </div>
        </div>
    </div>
</div>

</div>
@endsection