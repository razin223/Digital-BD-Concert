@extends("new-admin-template")

@section("content")
<div class="row">
    <div class="col-12">
        <form>
            <div class="card card-primary">
                <div class="card-header"><h5>Search</h5></div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <b>State Name</b>
                            <input type="text" name="state_name" value="{{request()->input('state_name')}}"  class="form-control"/>
                        </div>
                        
                        <div class="col-md-4">
                            <b>Country Name</b>
                            <select class="form-control select2" name="country_id">
                                <option value="">(select)</option>
                                <?php
                                foreach (\App\Country::orderBy('name','asc')->get() as $value){
                                    echo "<option value='{$value->id}'";
                                    echo (request()->input('country_id') == $value->id)? "selected":"";
                                    echo ">{$value->name}</option>";
                                }
                                ?>
                            </select>
                        </div>

                        <div class="col-12 text-center">
                            <input type="submit" value="Search" class="btn btn-primary"/>
                        </div>
                    </div>

                </div>
            </div>
        </form>

        <div class="card card-success">
            <div class="card-header"><h5>Result</h5></div>
            <div class="card-body">
                <table class="table table-condensed">
                    <thead>
                        <tr>
                            <th>Action</th>
                            <th>#</th>
                            <th>State</th>
                            <th>Country</th>
                            <th>City Count</th>
                            <th>Modification</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $Sl = ($SearchData->currentPage() - 1)*$SearchData->perPage();
                        foreach ($SearchData as $Data) {
                            $Sl++;
                            ?>
                            <tr>
                                <td>
                                    <a href="{{route('state_edit',['id'=>$Data->id])}}"><i class="fas fa-pencil-alt"></i></a> &nbsp;&nbsp;&nbsp;&nbsp;
                                    <a onclick="return confirm('Do you really want to delete this?')" href="{{route('state_delete',['id'=>$Data->id])}}" class="text-danger"><i class="fas fa-times"></i></a>
                                </td>
                                <td>{{$Sl}}</td>
                                <td>{{$Data->name}}</td>
                                <td>{{$Data->getCountry->name}}</td>
                                <td>{{$Data->getCity->count()}}</td>
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

</div>
@endsection