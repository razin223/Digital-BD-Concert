@extends("new-admin-template")

@section("content")
<style>
    .table-responsive a{
        color: #000;
    }
</style>
<div class="row">
    <div class="col-12">
        <h4>Search</h4>
        <form>
            <div class="row">
                <div class="col-md-4">
                    <b>Mobile</b>
                    <input type="text" name="mobile" value="{{request()->input('mobile')}}" class="form-control"/>
                </div>
                <div class="col-md-4">
                    <b>Email</b>
                    <input type="text" name="email" value="{{request()->input('email')}}" class="form-control"/>
                </div>
                <div class="col-md-4">
                    <b>Group</b>
                    <select name="group"  class="form-control">
                        <option value="">(select)</option>
                        <?php
                        foreach (['Ka', "Kha"] as $value) {
                            echo "<option value='$value'";
                            echo request()->input('group') == $value ? "selected" : "";
                            echo ">$value<?option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="col-md-4">
                    <b>Order By</b>
                    <select name="order_by" class="form-control">
                        <option value="">(select)</option>
                        <?php
                        foreach (["Top", "Latest"] as $value) {
                            echo "<option value='$value'";
                            echo request()->input('order_by') == $value ? "selected" : "";
                            echo ">$value<?option>";
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-12 text-center">
                    <input type="submit" value="Search" class="btn btn-primary"/>
                </div>
            </div>
        </form>
    </div>
    <div class="col-12">
        <div class="table-responsive">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>&nbsp;</th>
                        <th>#</th>
                        <th>Email</th>
                        <th>Name</th>
                        <th>Group</th>
                        <th>Mark</th>
                        <th>Time Taken</th>
                        <th>Mobile</th>
                        <th>Age</th>
                        <th>Occupation</th>
                        <th>Address</th>
                        <th>Exam Start</th>
                        <th>Exam End</th>
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
                                <a href="{{route('Exam.View',['id'=>$Data->id])}}" class="text-info" target="_blank"><i class="fas fa-eye"></i></a> &nbsp;&nbsp;&nbsp;
                                <a onclick="return confirm('Do you really want to delete this news?')" href="{{route('Exam.show',['Exam'=>$Data->id])}}" class="text-danger"><i class="fas fa-times"></i></a>
                            </td>
                            <td>{{$Sl}}</td>
                            <td>
                                {{$Data->getUser->email}}
                            </td>
                            <td>
                                {{$Data->getUser->name}}
                            </td>
                            <td>
                                {{$Data->getUser->group}}
                            </td>
                            <td>{{(int)$Data->mark_obtained}}</td>
                            <td>{{(int)($Data->time_taken/60)}} min {{($Data->time_taken%60)}}sec</td>
                            <td>{{$Data->getUser->mobile_number}}</td>
                            <td>{{\Carbon\Carbon::parse($Data->getUser->date_of_birth)->diff(\Carbon\Carbon::now())->format('%y y,%m m,%d d')}}</td>
                            <td>{{$Data->getUser->occupation}}</td>
                            <td>
                                {{$Data->getUser->address}}
                                <?php
                                if ($Data->getUser->district_id != null) {
                                    ?>
                                    ,{{$Data->getUser->getDistrict->bn}}, {{$Data->getUser->getDistrict->getDivision->bn}}, {{$Data->getUser->getDistrict->getDivision->getCountry->bn}}
                                    <?php
                                }
                                ?>
                            </td>
                            <td>
                                {{date("d-M-Y h:i:sA",strtotime($Data->started))}}
                            </td>
                            <td>
                                {{!empty($Data->submitted) ? date("d-M-Y h:i:sA",strtotime($Data->submitted)):"-"}}
                            </td>

                            <td>
                                Created: {{date("d-M-Y h:i:sA",strtotime($Data->created_at))}}<br/>
                                Updated: {{date("d-M-Y h:i:sA",strtotime($Data->updated_at))}}<br/>
                            </td>
                        </tr>


                        <?php
                    }
                    ?>
                </tbody>
            </table>
            {{$SearchData->withQueryString()->links()}}
        </div>
    </div>

</div>
@endsection