@extends("new-admin-template")

@section("content")

<script type="text/javascript">
    $(document).ready(function () {

        $("#form").submit(function (event) {
            event.preventDefault();

            $.ajax({
                url: "{{route('roundtask_add')}}",
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
                        <label for="exampleInputEmail2" class="col-sm-3  col-md-2 col-form-label">Chapter<span class="text-danger">*</span></label>
                        <div class="col-sm-9">
                            <select name="chapter_id" id="chapter_id" class="form-control">
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
                        <label for="exampleInputEmail2" class="col-sm-3  col-md-2 col-form-label">Round<span class="text-danger">*</span></label>
                        <div class="col-sm-9">
                            <select name="round_id" id="round_id" class="form-control">
                                <option value="">(select)</option>
                                <?php
                                if (!empty(old('chapter_id'))) {
                                    foreach (\App\Round::where('chapter_id', old('chapter_id'))->get() as $value) {
                                        echo "<option value='{$value->id}'>{$value->round_name}</option>";
                                    }
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-3 col-md-2 col-form-label">Task Details <span class="text-danger">*</span></label>
                        <div class="col-sm-9">
                            <textarea name="task_details" class="form-control editor" rows="10"></textarea>
                        </div>

                    </div>

                    <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-3 col-md-2 col-form-label">Mark <span class="text-danger">*</span></label>
                        <div class="col-sm-9">
                            <input type="text" name="mark"  class="form-control" id="exampleInputUsername2" placeholder="Mark">
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="exampleInputEmail2" class="col-sm-3  col-md-2 col-form-label">Accept Content Type<span class="text-danger">*</span></label>
                        <div class="col-sm-9">
                            <select name="accept_type" class="form-control">
                                <option value="">(select)</option>
                                <?php
                                foreach (['Text', 'File', 'Video', 'Youtube','Link'] as $value) {
                                    echo "<option value='$value'>$value</option>";
                                }
                                ?>
                            </select>
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