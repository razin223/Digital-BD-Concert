@extends("new-admin-template")

@section("content")

<script type="text/javascript">
    $(document).ready(function () {
        $(document).on('click', '.accept', function () {
            var ID = $(this).data('id');
            var $Selector = $(this);




            if (confirm("Do you really want to accept this startup?")) {
                $("#loading-Modal").modal();
                $.ajax({
                    url: "/roundstartup/accept/" + ID,
                    data: {},
                    success: function (data) {
                        $("#loading-Modal").modal('hide');

                        toastr.success(data.message, "Success");

                        $("#accept_" + ID).remove();
                        $("#reject_" + ID).remove();

                        $("#status_" + ID).html("Accept");

                        $("#status_changed_by_" + ID).html(data.changed_by);

                        if (data.show_next_round) {
                            $("#action_" + ID).prepend('<a href="javascript:;" data-id="' + ID + '" class="btn btn-secondary move_to_next_round">Move to Next Round</a><br/>');
                        }




                    },
                    error: function (error) {
                        $("#loading-Modal").modal('hide');

                        var message = JSON.parse(error.responseText);

                        var Error = "";

                        if (typeof error.status == 500) {
                            Error += "<strong>System error</strong>";
                        }

                        if (typeof message.message != 'undefined') {
                            Error += message.message;
                        }

                        if (typeof message.errors != 'undefined') {
                            var ErrorMessages = message.errors;
                            for (var i in ErrorMessages) {
                                Error += "<br/>" + ErrorMessages[i][0];
                            }
                        }


                        toastr.error(Error, "Error");
                    }
                });
            }

        });



        $(document).on('click', '.reject', function () {
            var ID = $(this).data('id');
            var $Selector = $(this);




            if (confirm("Do you really want to reject this startup?")) {
                $("#loading-Modal").modal();
                $.ajax({
                    url: "/roundstartup/reject/" + ID,
                    data: {},
                    success: function (data) {
                        $("#loading-Modal").modal('hide');

                        toastr.success(data.message, "Success");

                        $("#accept_" + ID).remove();
                        $("#reject_" + ID).remove();

                        $("#status_" + ID).html("Reject");

                        $("#status_changed_by_" + ID).html(data.changed_by);

                    },
                    error: function (error) {
                        $("#loading-Modal").modal('hide');

                        var message = JSON.parse(error.responseText);

                        var Error = "";

                        if (typeof error.status == 500) {
                            Error += "<strong>System error</strong>";
                        }

                        if (typeof message.message != 'undefined') {
                            Error += message.message;
                        }

                        if (typeof message.errors != 'undefined') {
                            var ErrorMessages = message.errors;
                            for (var i in ErrorMessages) {
                                Error += "<br/>" + ErrorMessages[i][0];
                            }
                        }


                        toastr.error(Error, "Error");
                    }
                });
            }

        });
    })
</script>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header"><h4>Search</h4></div>
            <div class="card-body">
                <form>
                    <div class="row">
                        <div class="col-md-4">
                            <b>Startup Name</b>
                            <input type="text" name="startup_name" value="{{request()->input('startup_name')}}" class="form-control"/>
                        </div>
                        <div class="col-md-4">
                            <b>Category</b>
                            <select name="chapter_id" id="chapter_id" class="form-control">
                                <option value="">(select)</option>
                                <?php
                                foreach (\App\Chapter::get() as $value) {
                                    echo "<option value='{$value->id}'";
                                    echo (request()->input('chapter_id') == $value->id) ? 'selected' : '';
                                    echo ">{$value->chapter_name}</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <b>Round</b>
                            <select name="round_id" id="round_id" class="form-control">
                                <option value="">(select)</option>
                                <?php
                                if (!empty(request()->input('chapter_id'))) {
                                    foreach (\App\Round::where('chapter_id', request()->input('chapter_id'))->get() as $value) {
                                        echo "<option value='{$value->id}'";
                                        echo (request()->input('round_id') == $value->id) ? 'selected' : '';
                                        echo ">{$value->round_name}</option>";
                                    }
                                }
                                ?>
                            </select>
                        </div>

                        <div class="col-md-4">
                            <b>Status</b>
                            <select name="status" class="form-control">
                                <option value="">(select)</option>
                                <?php
                                foreach (['Pending', 'Reject', 'Accept', 'Moved To Next Round'] as $value) {
                                    echo "<option value='{$value}'";
                                    echo (request()->input('status') == $value) ? 'selected' : '';
                                    echo ">{$value}</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <b>Registration Date (From)</b>
                            <input type="text" class="form-control date" name="created_at_from" value="{{request()->input('created_at_from')}}"/>
                        </div>
                        <div class="col-md-4">
                            <b>Registration Date (To)</b>
                            <input type="text" class="form-control date" name="created_at_to" value="{{request()->input('created_at_to')}}"/>
                        </div>
                        <div class="col-12 text-center">&nbsp;</div>
                        <div class="col-12 text-center">
                            <input type="submit" value="Search" class="btn btn-primary"/>
                        </div>
                        <div class="col-12 text-center">&nbsp;</div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-12">
        <div class="card card-success">
            <div class="card-header"><h4>Search Result</h4></div>
            <div class="card-body">
                <a href="{{route('roundstartup_export_excel')}}?{{request()->getQueryString()}}" class="btn btn-app text-success" target="_blank"><i class="far fa-file-excel"></i>Excel</a>
                <div class="table-responsive">
                    <br/>
                    {{ $SearchData->withQueryString()->links() }}
                    <table class="table table-condensed">
                        <thead>
                            <tr>
                                <th>&nbsp;</th>
                                <th>#</th>
                                <th>Category</th>
                                <th>Round</th>
                                <th>Startup</th>
                                <th>Status</th>
                                <th>Status Changed By</th>
                                <th>Total Mark</th>
                                <th style="width: 250px">Action</th>
                                <th>Modification</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $Sl = ($SearchData->currentPage() - 1) * $SearchData->perPage();

                            if ($SearchData->count()) {
                                foreach ($SearchData as $Data) {
                                    $Sl++;
                                    ?>
                                    <tr>
                                        <td>
                                            <a href="{{route('roundstartup_edit',['id'=>$Data->id])}}"><i class="fas fa-pencil-alt"></i></a>
                                        </td>
                                        <td>{{$Sl}}</td>
                                        <td>{{$Data->getRound->getChapter->chapter_name}}</td>
                                        <td>{{$Data->getRound->round_name}}</td>
                                        <td>{{$Data->getStartup->startup_name}}</td>
                                        <td><span id="status_{{$Data->id}}">{{$Data->status != NULL ? $Data->status: '-' }}</span></td>
                                        <td><span id="status_changed_by_{{$Data->id}}">{{$Data->status != NULL ? $Data->getStatusChangedBy->first_name." ".$Data->getStatusChangedBy->last_name: '-' }}</span></td>
                                        <td style="width: 200px">
                                            <?php
                                            $Mark = \App\RoundTaskSubmissionMark::join('round_task_submissions', 'round_task_submission_marks.round_task_submission_id', 'round_task_submissions.id')
                                                    ->join('round_tasks', 'round_task_submissions.round_task_id', 'round_tasks.id')
                                                    ->where('round_task_submissions.round_startup_id', $Data->id)
                                                    ->where('round_tasks.round_id', $Data->getRound->id)
                                                    ->sum('round_task_submission_marks.mark');

                                            echo $Mark;
                                            ?>
                                        </td>
                                        <td id="action_{{$Data->id}}">
                                            <?php
                                            if ($Data->status == NULL) {
                                                ?>
                                                <a href="javascript:;" data-id="{{$Data->id}}" id="accept_{{$Data->id}}" class="btn btn-success accept">Accept</a> 

                                                <a href="javascript:;" data-id="{{$Data->id}}" id="reject_{{$Data->id}}" class="btn btn-danger reject">Reject</a><br/><br/>
                                                <?php
                                            }

                                            if ($Data->status == 'Accept') {

                                                $NextRound = \App\Round::where('chapter_id', $Data->getRound->chapter_id)
                                                        ->where('serial', '>', $Data->getRound->serial)
                                                        ->orderBy('serial', 'asc')
                                                        ->first();

                                                if ($NextRound != NULL) {
                                                    ?>
                                                    <a href="javascript:;" data-id="{{$Data->id}}" class="btn btn-secondary move_to_next_round">Move to Next Round</a><br/><br/>
                                                    <?php
                                                } else {
                                                    ?>
                                                    <span class="bg-warning">No next round found</span><br/><br/>
                                                    <?php
                                                }
                                            }
                                            ?>

                                            <a href="{{route('roundstartup_individual',$Data->id)}}" class="btn btn-info" target="_blank">Details</a><br/><br/>
                                            <a href="{{route('roundstartup_individual_pdf',$Data->id)}}" class="btn btn-primary" target="_blank">Download PDF</a>

                                        </td>
                                        <td>
                                            {{$Data->getUser->first_name}} {{$Data->getUser->last_name}}<br/>
                                            Created: {{date("d-M-Y h:i:sA",strtotime($Data->created_at))}}<br/>
                                            Updated: {{date("d-M-Y h:i:sA",strtotime($Data->updated_at))}}<br/>
                                        </td>
                                    </tr>


                                    <?php
                                }
                            } else {
                                ?>
                                <tr>
                                    <td colspan="10" class="text-center bg-warning">No data found.</td>
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
@endsection