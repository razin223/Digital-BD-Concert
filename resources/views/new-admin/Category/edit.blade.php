@extends("new-admin-template")

@section("content")

<?php
//dd($Data);
?>

<script type="text/javascript">
    $(document).ready(function () {




        $("#form").submit(function (event) {
            event.preventDefault();
            $("#loading-Modal").modal();
            $.ajax({
                url: "{{route('photo_edit',$Data->id)}}",
                method: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function (data) {
                    window.location = window.location.href;
                },
                error: function (error, b) {
                    $("#loading-Modal").modal('hide');
                    var message = JSON.parse(error.responseText);

                    var Error = message.message;

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
    });
</script>
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <form id="form" onsubmit="return false;" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="form-group row">
                        <label for="exampleInputEmail2" class="col-sm-3  col-md-2 col-form-label">Photo Category <span class="text-danger">*</span></label>
                        <div class="col-sm-9">
                            <select name="photo_category_id" class="form-control">
                                <option value="">(select)</option>
                                <?php
                                foreach (\App\PhotoCategory::where('display', 'Yes')->orderBy('photo_category_name', 'asc')->get() as $value) {
                                    ?>
                                <option value="{{$value->id}}" {{$Data->photo_category_id == $value->id ? 'selected':'' }} >{{$value->photo_category_name}}</option>
                                    <?php
                                }
                                ?>

                            </select>
                        </div>
                    </div>
                    
                    
                    <div class="form-group row">
                        <label for="exampleInputEmail2" class="col-sm-3  col-md-2 col-form-label">Photo </label>
                        <div class="col-sm-9">
                            <input type="file" name="file" class="form-control" id="exampleInputEmail2" accept="image/png,image/x-png,image/jpeg">
                            <p class="text-info">Photo size must be 1200 X 650 pixel</p>
                            <p class="text-danger">If you do not want to change the photo, just want to change display status or serial or category, do not select any picture. Just change the display status or serial or category and click update.</p>

                            <img src="{{asset('photo_gallery/'.$Data->file)}}" style="width: 350px" class="img-fluid"/>
                        </div>

                    </div>
                    
                    
                    <div class="form-group row">
                        <label for="exampleInputEmail2" class="col-sm-3  col-md-2 col-form-label">Display Serial <span class="text-danger">*</span></label>
                        <div class="col-sm-9">
                            <input type="text" name="serial" value="{{$Data->serial}}" class="form-control"/>
                            <p class="text-info">Serial used to set the display order. The lower the number the first they appear. This number can be decimal like 1.24</p>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="exampleInputEmail2" class="col-sm-3  col-md-2 col-form-label">Display <span class="text-danger">*</span></label>
                        <div class="col-sm-9">
                            <select name="display" class="form-control">
                                <option value="Yes" {{ ($Data->display == 'Yes')? 'selected':''}} >Yes</option>
                                <option value="No"  {{ ($Data->display == 'No')? 'selected':'' }} >No</option>


                            </select>
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