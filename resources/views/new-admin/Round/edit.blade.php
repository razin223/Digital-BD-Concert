@extends("new-admin-template")

@section("content")

<script type="text/javascript">
    $(document).ready(function () {

        $("#form").submit(function (event) {
            event.preventDefault();

            $.ajax({
                url: "/round/edit/{{$Data->id}}",
                method: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function (data) {
                    alert(data.message);
                    window.location.reload();
                },
                error: function (error, b) {
                    var message = JSON.parse(error.responseText);

                    alert("Error\n" + message.message);
                }
            });
        });
    });
</script>
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <form id="form" onsubmit="return false;" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-3 col-md-2 col-form-label">Round Name <span class="text-danger">*</span></label>
                        <div class="col-sm-9">
                            <input type="text" name="round_name" value="{{$Data->round_name}}"  class="form-control" id="exampleInputUsername2" placeholder="Round name">
                        </div>

                    </div>
                    <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-3 col-md-2 col-form-label">Serial <span class="text-danger">*</span></label>
                        <div class="col-sm-9">
                            <input type="text" name="serial" value="{{$Data->serial}}"  class="form-control" id="exampleInputUsername2" placeholder="Serial">
                        </div>

                    </div>
                    <div class="form-group row">
                        <label for="exampleInputEmail2" class="col-sm-3  col-md-2 col-form-label">Chapter<span class="text-danger">*</span></label>
                        <div class="col-sm-9">
                            <select name="chapter_id" class="form-control">
                                <option value="">(select)</option>
                                <?php
                                foreach (\App\Chapter::get() as $value) {
                                    echo "<option value='{$value->id}'";
                                    echo ($Data->chapter_id == $value->id) ? ' selected' : '';
                                    echo ">{$value->chapter_name}</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputEmail2" class="col-sm-3  col-md-2 col-form-label">Accept Application <span class="text-danger">*</span></label>
                        <div class="col-sm-9">
                            <select name="application_stage" class="form-control">
                                <option value="No" {{($Data->application_stage == "No")? "selected":""}}>No</option>
                                <option value="Yes" {{($Data->application_stage == "Yes")? "selected":""}}>Yes</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputEmail2" class="col-sm-3  col-md-2 col-form-label">Judged By <span class="text-danger">*</span></label>
                        <div class="col-sm-9">
                            <select name="judged_by" class="form-control">
                                <option value="Judge" {{($Data->judged_by == "Judge")? "selected":""}}>Judge</option>
                                <option value="Mentor" {{($Data->judged_by == "Mentor")? "selected":""}}>Mentor</option>
                                <option value="No Marking" {{($Data->judged_by == "No Marking")? "selected":""}}>No Marking</option>
                            </select>
                        </div>
                    </div>

                    <!--                    <div class="form-group row">
                                            <label for="exampleInputEmail2" class="col-sm-3  col-md-2 col-form-label">Task Details <span class="text-danger">*</span></label>
                                            <div class="col-sm-9">
                                                <textarea name="task_details" class="form-control editor"></textarea>
                                            </div>
                                        </div>-->

                    <!--                    <div class="form-group row">
                                            <label for="exampleInputEmail2" class="col-sm-3  col-md-2 col-form-label">Accept Assignment/File <span class="text-danger">*</span></label>
                                            <div class="col-sm-9">
                                                <select name="accept_file" class="form-control">
                                                    <option value="">(select)</option>
                                                    <option value="No">No</option>
                                                    <option value="Yes">Yes</option>
                                                </select>
                                            </div>
                                        </div>-->

                    <div class="form-group row">
                        <label for="exampleInputEmail2" class="col-sm-3  col-md-2 col-form-label">Start Time <span class="text-danger">*</span></label>
                        <div class="col-sm-9">
                            <input type="text" name="start_at" value="{{date("Y-m-d h:i A",strtotime($Data->start_at))}}" class="form-control datetime"/>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="exampleInputEmail2" class="col-sm-3  col-md-2 col-form-label">End Time <span class="text-danger">*</span></label>
                        <div class="col-sm-9">
                            <input type="text" name="end_at" value="{{date("Y-m-d h:i A",strtotime($Data->end_at))}}" class="form-control datetime"/>
                        </div>
                    </div>


                    <div class="form-group row">
                        <div class="col-sm-12 text-center">

                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection