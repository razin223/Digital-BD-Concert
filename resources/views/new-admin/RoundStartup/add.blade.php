@extends("new-admin-template")

@section("content")

<script type="text/javascript">
    $(document).ready(function () {

        $("#form").submit(function (event) {
            event.preventDefault();
            $("#loading-Modal").modal();
            $.ajax({
                url: "{{route('roundstartup_add')}}",
                method: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function (data) {
                    $("#loading-Modal").modal('hide');

                    toastr.success(data.message, "Success");
//                    setTimeout(function () {
//                        window.location = "/admin/dashboard";
//                    }, 6000);

                    $("#form").hide();
                },
                error: function (error, b) {
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
        });


        $("#category_id").change(function () {
            var ID = $(this).val();

            if (ID != "") {
                window.location = "{{route('roundstartup_add')}}?id=" + ID;
            } else {
                $(".hidden_row").hide().remove();
            }
        });
    });
</script>
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <div class="row">

                    <div class="col-md-12 col-sm-12">
                        <form id="form" onsubmit="return false;" enctype="multipart/form-data">

                            @csrf
                            <div class="form-group row">
                                <label for="exampleInputUsername2" class="col-sm-3 col-md-2 col-form-label">Category <span class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <select name="category_id" id="category_id" class="form-control">
                                        <option value="">(select)</option>
                                        <?php
                                        $Chapters = \App\Chapter::join('rounds', 'chapters.id', 'rounds.chapter_id')
                                                ->where('rounds.application_stage', 'Yes')
                                                ->where('rounds.start_at', '<=', date("Y-m-d H:i:s"))
                                                ->where('rounds.end_at', '>=', date("Y-m-d H:i:s"))
                                                ->select("rounds.id", 'chapters.chapter_name')
                                                ->get();

                                        foreach ($Chapters as $Chapter) {
                                            echo "<option value='{$Chapter->id}'";
                                            echo (!empty(request()->input('id')) && request()->input('id') == $Chapter->id) ? "selected" : "";
                                            echo ">{$Chapter->chapter_name}</option>";
                                        }
                                        ?>
                                    </select>
                                </div>

                            </div>
                            <?php
                            if (!empty(request()->input('id'))) {
                                $Round = \App\Round::join('chapters', 'rounds.chapter_id', 'chapters.id')
                                        ->where('rounds.id', request()->input('id'))
                                        ->where('rounds.application_stage', 'Yes')
                                        ->where('rounds.start_at', '<=', date("Y-m-d H:i:s"))
                                        ->where('rounds.end_at', '>=', date("Y-m-d H:i:s"))
                                        ->select('*', 'rounds.id as round_id', 'chapters.id as chapter_id')
                                        ->first();

                                if ($Round != NULL) {
                                    ?>
                                    <div class="form-group row hidden_row">
                                        <label for="exampleInputUsername2" class="col-sm-3 col-md-2 col-form-label">Startup <span class="text-danger">*</span></label>
                                        <div class="col-sm-9">
                                            <select name="startup_id" class="form-control">
                                                <?php
                                                $Startups = \App\Startup::where('created_by', auth()->id())
                                                        ->get();
                                                foreach ($Startups as $Startup) {
                                                    echo "<option value='{$Startup->id}'>{$Startup->startup_name}</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>

                                    </div>
                                    <?php
                                    $Tasks = \App\RoundTask::where('round_id', $Round->round_id)->get();

                                    foreach ($Tasks as $key => $Task) {
                                        ?>
                                        <div class="form-group row hidden_row">
                                            <label for="exampleInputUsername2" class="col-sm-3 col-md-2 col-form-label">Task {{$key+1}} <span class="text-danger">*</span></label>
                                            <div class="col-sm-9">
                                                {!!$Task->task_details!!}
                                                <?php
                                                if ($Task->accept_type == 'Text') {
                                                    ?>
                                                    <textarea name="task[{{$Task->id}}]" class="form-control editor" rows="10"></textarea>
                                                    <?php
                                                }

                                                if ($Task->accept_type == 'Video') {
                                                    ?>
                                                    <input type="file" name="task[{{$Task->id}}]" accept="video/mp4"/>
                                                    <?php
                                                }

                                                if ($Task->accept_type == 'File') {
                                                    ?>
                                                    <input type="file" name="task[{{$Task->id}}]" />
                                                    <?php
                                                }

                                                if ($Task->accept_type == 'Youtube') {
                                                    ?>
                                                    <input type="text" name="task[{{$Task->id}}]" class="form-control" />
                                                    <?php
                                                }
                                                ?>
                                            </div>

                                        </div>
                                        <?php
                                    }
                                    ?>

                                    <div class="form-group row hidden_row">
                                        <div class="col-sm-12 text-center">

                                            <button type="submit" class="btn btn-primary">Apply</button>
                                        </div>
                                    </div>
                                    <?php
                                }
                            }
                            ?>



                        </form>
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>
@endsection