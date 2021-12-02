@extends("new-admin-template")

@section("content")
<div class="row">
    <div class="col-12">
        <table class="table table-condensed">
            <thead>
                <tr>
                    <th>&nbsp;</th>
                    <th>#</th>
                    <th>Education Institution Name</th>
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
                        <td><a href="{{route('educationinstitution_edit',['id'=>$Data->id])}}"><i class="fas fa-pencil-alt"></i></a></td>
                        <td>{{$Sl}}</td>
                        <td>{{$Data->institution_name}}</td>
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
    </div>

</div>
@endsection