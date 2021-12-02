@extends("new-admin-template")

@section("content")

<script type="text/javascript">
    $(document).ready(function () {

        $("#form").submit(function (event) {
            event.preventDefault();

            $.ajax({
                url: "/round/add",
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
                            <input type="text" name="round_name"  class="form-control" id="exampleInputUsername2" placeholder="Round name">
                        </div>

                    </div>
                    <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-3 col-md-2 col-form-label">Serial <span class="text-danger">*</span></label>
                        <div class="col-sm-9">
                            <input type="text" name="serial"  class="form-control" id="exampleInputUsername2" placeholder="Serial">
                        </div>

                    </div>
                    <div class="form-group row">
                        <label for="exampleInputEmail2" class="col-sm-3  col-md-2 col-form-label">Chapter<span class="text-danger">*</span></label>
                        <div class="col-sm-9">
                            <select name="chapter_id" class="form-control">
                                <option value="">(select)</option>
                                <?php
                                foreach (\App\Chapter::get() as $value) {
                                    echo "<option value='{$value->id}'>{$value->chapter_name}</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputEmail2" class="col-sm-3  col-md-2 col-form-label">Accept Application <span class="text-danger">*</span></label>
                        <div class="col-sm-9">
                            <select name="application_stage" class="form-control">
                                <option value="">(select)</option>
                                <option value="No">No</option>
                                <option value="Yes">Yes</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputEmail2" class="col-sm-3  col-md-2 col-form-label">Judged By <span class="text-danger">*</span></label>
                        <div class="col-sm-9">
                            <select name="judged_by" class="form-control">
                                <option value="">(select)</option>
                                <option value="Judge">Judge</option>
                                <option value="Mentor">Mentor</option>
                                <option value="No Marking">No Marking</option>
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
                            <input type="text" name="start_at" class="form-control date"/>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="exampleInputEmail2" class="col-sm-3  col-md-2 col-form-label">End Time <span class="text-danger">*</span></label>
                        <div class="col-sm-9">
                            <input type="text" name="end_at" class="form-control date"/>
                        </div>
                    </div>


                    <div class="form-group row">
                        <div class="col-sm-12 text-center">

                            <button type="submit" class="btn btn-primary">Create</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection