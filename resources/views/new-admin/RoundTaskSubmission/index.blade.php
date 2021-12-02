@extends("new-admin-template")

@section("content")
<script type="text/javascript">
    $(document).ready(function () {
        $(".form").submit(function (e) {
            e.preventDefault();

            var ID = $(this).data('id');

            $("#submit_" + ID).attr('disabled', true).val("Saving...");

            $.ajax({
                url: "{{route('roundtasksubmissionmark_add')}}",
                data: $(this).serializeArray(),
                method: "POST",
                success: function (data) {
                    console.log(data);
                    $("#" + data.id).html(data.html);
                },
                error: function (error) {
                    alert("Error\n" + error.responseText);
                    $("#submit_" + ID).attr('disabled', false).val("Submit");
                }
            });
        });
    });
</script>
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
                    <th>Accept Type</th>
                    <th>Submission</th>
                    <th>Mark</th>
                    <th>Given</th>
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
                        <td><a href="{{route('roundtasksubmission_edit',['id'=>$Data->id])}}"><i class="fas fa-pencil-alt"></i></a></td>
                        <td>{{$Sl}}</td>
                        <td>{{$Data->getRoundStartup->getRound->getChapter->chapter_name}}</td>
                        <td>{{$Data->getRoundStartup->getRound->round_name}}</td>
                        <td>
                            <div class="overflow-auto">{!!$Data->getRoundTask->task_details!!}</div>
                        </td>
                        <td>{{$Data->getRoundTask->accept_type}}</td>
                        <td>
                            <?php
                            if ($Data->getRoundTask->accept_type == 'Text') {
                                ?>
                                <div class="overflow-auto">{!!$Data->submission!!}</div>
                                <?php
                            }
                            ?>
                        </td>
                        <td>{{$Data->getRoundTask->mark}}</td>


                        <td id="{{$Data->id}}">
                            <?php
                            $Found = false;
                            foreach ($Data->getRoundTaskSubmissionMark as $value) {
                                if ($value->judged_by == auth()->id()) {
                                    echo $value->mark;
                                    echo "<br/>";
                                    echo str_replace("\n", "<br/>", $value->comment);
                                    $Found = true;
                                }
                            }

                            if (!$Found) {
                                ?>
                                <form class="form" data-id="{{$Data->id}}">
                                    <input type="hidden" name="id" value="{{$Data->id}}"/>
                                    @csrf
                                    <b>Mark</b>
                                    <input type="text" name="mark" class="form-control"/>
                                    <b>Comment</b>
                                    <input type="text" name="comment" class="form-control"/>
                                    <input type="submit" id="submit_{{$Data->id}}" value="Submit" class="btn btn-primary"/>
                                </form>
                                <?php
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
@endsection