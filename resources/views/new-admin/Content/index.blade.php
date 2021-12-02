@extends("new-admin-template")

@section("content")

<script type="text/javascript">
    $(document).ready(function () {
        $('.delete').click(function () {
            if (confirm('Do you really want to delete this?')) {
                var Selector = $(this);
                var ID = $(this).data('id');
                $.ajax({
                    url: "{{route('Content.index')}}/" + ID,
                    method: "DELETE",
                    data: {'mode': 'ajax'},
                    success: function (data) {
                        if (data.status) {
                            Selector.parents('tr').hide('slow').remove();
                        }
                    },
                    error: function (error) {
                        alert(error.responseText);
                    }
                });
            }
        });
    });
</script>

<div class="row">
    <div class="col-12">
        <form>
            <div class="card card-primary">
                <div class="card-header"><h5>Search</h5></div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <b>Category Name</b>
                            @include('new-admin.fixed-layout.category')
                        </div>
                        <!--                        <div class="col-md-4">
                                                    <b>Sub Category Name</b>
                                                    @include('new-admin.fixed-layout.sub_category')
                                                </div>-->
                        <div class="col-md-4">
                            <b>Type</b>
                            <select name="type" id="type" class="form-control">
                                <option value="">(select)</option>
                                <option value="General" {{request()->input('type') == 'General' ? "selected":""}} >General</option>
                                <option value="Gallery" {{request()->input('type') == 'Gallery' ? "selected":""}} >Gallery</option>
                                <option value="Video" {{request()->input('type') == 'Video' ? "selected":""}} >Video</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <b>Display</b>
                            <select name="display" id="display" class="form-control">
                                <option value="">(select)</option>
                                <option value="Yes" {{request()->input('display') == 'Yes' ? "selected":""}} >Yes</option>
                                <option value="No" {{request()->input('display') == 'No' ? "selected":""}}>No</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <b>Featured</b>
                            <select name="featured" id="featured" class="form-control">
                                <option value="">(select)</option>
                                <option value="Yes" {{request()->input('featured') == 'Yes' ? "selected":""}} >Yes</option>
                                <option value="No" {{request()->input('featured') == 'No' ? "selected":""}}>No</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <b>Language</b>
                            <select name="language" id="language" class="form-control">
                                <option value="">(select)</option>
                                <?php
                                foreach (['En' => "English", "Bn" => "Bangla"] as $key => $value) {
                                    echo "<option value='{$key}'";
                                    echo (request()->input('language') == $key) ? "selected" : "";
                                    echo ">{$value}</option>";
                                }
                                ?>
                            </select>
                        </div>

                        <div class="col-12 text-center">
                            <input type="submit" value="Search" class="btn btn-primary"/>
                        </div>
                    </div>

                </div>
            </div>
        </form>


        <table class="table table-condensed">
            <thead>
                <tr>
                    <th>&nbsp;</th>
                    <th>#</th>
                    <th>Type</th>
                    <th>Language</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Display Order</th>
                    <th>Display</th>
                    <th>Featured</th>
                    <th>Cover Picture</th>
                    <th>Modification</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $Sl = 0;
                $Language = ['En' => "English", 'Bn' => "Bangla"];
                foreach ($SearchData as $Data) {
                    $Sl++;
                    ?>
                    <tr>
                        <td>
                            <?php
                            if (empty($Data->deleted_at)) {
                                ?>
                                <a href="{{route('Content.edit',['Content'=>$Data->id])}}"><i class="fas fa-pencil-alt"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
                                <a href="{{route('Content.show',['Content'=>$Data->id])}}" class="text-dark"><i class="fas fa-eye"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
                                <a data-id="{{$Data->id}}" class="text-danger delete"><i class="fas fa-times"></i></a>
                                <?php
                            }
                            ?>
                        </td>
                        <td>{{$Sl}}</td>
                        <td>{{$Data->type}}</td>
                        <td>{{$Language[$Data->language]}}</td>
                        <td>{{$Data->title}}</td>
                        <td>{{$Data->getCategory->category_name}} ({{$Data->getCategory->category_name_en}})</td>
                        <td>{{$Data->display_order}}</td>
                        <td>{{$Data->display}}</td>
                        <td>{{$Data->featured}}</td>
                        <td>
                            <?php
                            if (!empty($Data->cover_image) || !empty($Data->cover_image_resized)) {
                                $Image = !empty($Data->cover_image_resized) ? $Data->cover_image_resized : $Data->cover_image;
                                ?>
                                <img src="{{\Storage::url($Image)}}" style="width: 200px;border: solid lightgray 1px" class="img-fluid">
                                <?php
                            }

                            if (!empty($Data->cover_image_en) || !empty($Data->cover_image_resized_en)) {
                                $Image = !empty($Data->cover_image_resized_en) ? $Data->cover_image_resized_en : $Data->cover_image_en;
                                ?>
                                <br/><br/><img src="{{\Storage::url($Image)}}" style="width: 200px;border: solid lightgray 1px" class="img-fluid">
                                <?php
                            }
                            ?>
                        </td>
                        <td>
                            Created: {{$Data->createdBy->name}} <br/>
                            {{date("d-M-Y h:i:sA",strtotime($Data->created_at))}}<br/>
                            Updated: {{$Data->updatedBy->name}}<br/>
                            {{date("d-M-Y h:i:sA",strtotime($Data->updated_at))}}
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