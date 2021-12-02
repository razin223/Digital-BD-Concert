@extends("new-admin-template")

@section("content")
<div class="row">
    <div class="col-12">
        <table class="table table-condensed">
            <thead>
                <tr>
                    <th>&nbsp;</th>
                    <th>#</th>
                    <th>Category</th>
                    <th>Round</th>
                    <th>Type</th>
                    <th>Judge</th>
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
                            <a href="{{route('roundjudge_edit',['id'=>$Data->id])}}"><i class="fas fa-pencil-alt"></i></a><br/><br/>
                            
                            <a href="{{route('roundjudge_delete',['id'=>$Data->id])}}" class="text-danger" onclick="return confirm('Do you really want to delete this judge? All marking of this judge will be deleted.')"><i class="fas fa-times"></i></a>
                        </td>
                        <td>{{$Sl}}</td>
                        <td>{{$Data->getRound->getChapter->chapter_name}}</td>
                        <td>{{$Data->getRound->round_name}}</td>
                        <td>{{$Data->getRound->judged_by}}</td>
                        <td>{{$Data->getJudge->first_name}} {{$Data->getJudge->first_name}}<br/>Email: {{$Data->getJudge->email}}<br/>Mobile: {{$Data->getJudge->mobile}}</td>
                        
                        
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