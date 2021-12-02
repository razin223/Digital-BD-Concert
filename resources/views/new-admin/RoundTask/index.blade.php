@extends("new-admin-template")

@section("content")
<div class="row">
    <div class="col-12">
        <table class="table table-condensed">
            <thead>
                <tr>
                    <th>&nbsp;</th>
                    <th>#</th>
                    <th>Round Name</th>
                    <th>Chapter Name</th>
                    <th>Task Details</th>
                    <th>Mark</th>
                    <th>Accept Type</th>
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
                        <td><a href="{{route('roundtask_edit',['id'=>$Data->id])}}"><i class="fas fa-pencil-alt"></i></a></td>
                        <td>{{$Sl}}</td>
                        <td>{{$Data->getRound->round_name}}</td>
                        <td>{{$Data->getRound->getChapter->chapter_name}}</td>
                        <td>
                            <div class="overflow-auto">{!!$Data->task_details!!}</div>
                        </td>
                        <td>{{$Data->mark}}</td>
                        <td>{{$Data->accept_type}}</td>
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
@endsection