@extends("new-admin-template")

@section("content")

<script type="text/javascript">
    $(document).ready(function () {


        $("#round_id").change(function () {
            $("#judge_id,#judge_list").html("");
            $("#judge_type").val("");

            var round_id = $(this).val();

            if (round_id != "") {

                $.ajax({
                    url: "{{route('round_list')}}",
                    method: "GET",
                    data: {'round_id': round_id, "mode": "ajax"},
                    success: function (data) {
                        console.log(data);

                        if (data.length) {
                            $("#judge_type").val(data[0].judged_by);

                            $.ajax({
                                url: "{{route('roundjudge_list')}}",
                                method: "GET",
                                data: {'round_id': round_id, 'mode': 'ajax'},
                                success: function (data) {
                                    if (data.length) {
                                        var HTML = "<ul class='list-group'>";
                                        for (var i in data) {
                                            HTML += "<li class='list-group-item'>" + data[i].get_judge.first_name + " " + data[i].get_judge.last_name + "</li>";

                                        }
                                        HTML += "</ul>"
                                        $("#judge_list").html(HTML);
                                    }
                                },
                                error: function (error) {},
                            });


                            $.ajax({
                                url: "{{route('user_list')}}",
                                method: "GET",
                                data: {'user_type': data[0].judged_by, 'mode': 'ajax'},
                                success: function (data) {
                                    if (data.length) {
                                        var HTML = "";
                                        for (var i in data) {
                                            HTML += "<option value='" + data[i].id + "'>" + data[i].first_name + " " + data[i].last_name + "</option>";

                                        }
                                        $("#judge_id").html(HTML).select2();
                                    }
                                },
                                error: function (error) {},
                            });

                        }
                    },
                    error: function (data) {
                        alert("Error");
                    }
                });
            } else {
                $("#judge_type").val('');
            }
        });

        $("#form").submit(function (event) {
            event.preventDefault();

            $.ajax({
                url: "{{route('roundjudge_add')}}",
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
                        <label for="exampleInputUsername2" class="col-sm-3 col-md-2 col-form-label">Chapter <span class="text-danger">*</span></label>
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
                        <label for="exampleInputEmail2" class="col-sm-3  col-md-2 col-form-label">Round <span class="text-danger">*</span></label>
                        <div class="col-sm-9">
                            <select name="round_id" id="round_id" class="form-control">

                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputEmail2" class="col-sm-3  col-md-2 col-form-label">Judge Type <span class="text-danger">*</span></label>
                        <div class="col-sm-9">
                            <input type="text" id="judge_type" class="form-control" disabled/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputEmail2" class="col-sm-3  col-md-2 col-form-label">Judged By <span class="text-danger">*</span></label>
                        <div class="col-sm-4">
                            <select name="judge_id[]" id="judge_id" class="form-control select2" multiple>

                            </select>
                        </div>
                        <div class="col-sm-4">
                            <b>Judge List</b>
                            <div class="row">
                                <div class="col-12" id="judge_list"></div>
                            </div>

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