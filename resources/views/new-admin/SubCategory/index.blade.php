@extends("new-admin-template")

@section("content")

<script type="text/javascript">
    $(document).ready(function () {
        $('.delete').click(function () {
            if (confirm('Do you really want to delete this?')) {
                var Selector = $(this);
                var ID = $(this).data('id');
                $.ajax({
                    url: "{{route('SubCategory.index')}}/" + ID,
                    method: "DELETE",
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
                            <b>Sub Category Name</b>
                            <input type="text" name='sub_category_name' value="{{request()->input('sub_category_name')}}" class="form-control"/>
                        </div>
                        <div class="col-md-4">
                            <b>Category Name</b>
                            @include('new-admin.fixed-layout.category')
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
                            <b>Deleted</b>
                            <select name="with_deleted" id="with_deleted" class="form-control">
                                <option value="">(select)</option>
                                <option value="Yes" {{request()->input('with_deleted') == 'Yes' ? "selected":""}} >Yes</option>
                                <option value="No" {{request()->input('with_deleted') == 'No' ? "selected":""}}>No</option>
                            </select>
                        </div>

                        <div class="col-12 text-center">
                            <input type="submit" value="Search" class="btn btn-primary"/>
                        </div>
                    </div>

                </div>
            </div>
        </form>

        <div class="table-responsive">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>&nbsp;</th>
                        <th>#</th>
                        <th>Sub Category</th>
                        <th>Category</th>
                        <th>Serial</th>
                        <th>Display</th>
                        <th>Image</th>
                        <th>Modification</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $Sl = ($SearchData->currentPage() - 1) * $SearchData->perPage();
                    foreach ($SearchData as $Data) {
                        $Sl++;
                        ?>
                        <tr>
                            <td><?php
                                if (empty($Data->deleted_at)) {
                                    ?>
                                    <a href="{{route('SubCategory.edit',['SubCategory'=>$Data->id])}}"><i class="fas fa-pencil-alt"></i></a>&nbsp; &nbsp;

                                    <a data-id="{{$Data->id}}" class="text-danger delete"><i class="fas fa-times"></i></a>
                                    <?php
                                }
                                ?>
                            </td>
                            <td>{{$Sl}}</td>

                            <td>{{$Data->sub_category_name}}</td>
                            <td>{{$Data->getCategory->category_name}}</td>
                            <td>{{$Data->sub_category_order}}</td>
                            <td>{!!($Data->display == 'Yes')? "<h3 class='text-success'>".$Data->display."</h3>":"<h3 class='text-danger'>".$Data->display."</h3>" !!}</td>
                            <td>
                                <?php
                                if (!empty($Data->sub_category_image) || !empty($Data->sub_category_image_resized)) {
                                    $Image = !empty($Data->sub_category_image_resized) ? $Data->sub_category_image_resized : $Data->sub_category_image;
                                    ?>
                                    <img src="{{\Storage::url($Image)}}" style="width: 200px;border: solid lightgray 1px" class="img-fluid">
                                    <?php
                                }
                                ?>
                            </td>
                            <td>
                                Created: {{$Data->createdBy->name}} <br/>
                                {{date("d-M-Y h:i:sA",strtotime($Data->created_at))}}<br/>
                                Updated: {{$Data->updatedBy->name}}<br/> {{date("d-M-Y h:i:sA",strtotime($Data->updated_at))}}<br/>
                                <?php
                                if (!empty($Data->deleted_at)) {
                                    ?>
                                    <span class="text-danger">Deleted: {{$Data->deletedBy->name}}<br/> {{date("d-M-Y h:i:sA",strtotime($Data->deleted_at))}}<br/></span>
                                        <?php
                                    }
                                    ?>
                            </td>
                        </tr>


                        <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection