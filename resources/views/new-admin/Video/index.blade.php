@extends("new-admin-template")

@section("content")
<script type="text/javascript">
    $(document).ready(function () {
        $('.delete').click(function () {
            if (confirm('Do you really want to delete this?')) {
                var Selector = $(this);
                var ID = $(this).data('id');
                $.ajax({
                    url: "{{route('Video.index')}}/" + ID,
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
                            <b>Title</b>
                            <input type="text" name="title" class="form-control" value="{{request()->input('title')}}" placeholder="Title"/>
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
                        <th style="width: 300px">Video</th>
                        <th>Title</th>
                        <th>Title (English)</th>
                        <th>Display Order</th>
                        <th>Display</th>
                        <th>Featured</th>
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
                            <td>
                                <?php
                                if (empty($Data->deleted_at)) {
                                    ?>
                                    <a href="{{route('Video.edit',['Video'=>$Data->id])}}"><i class="fas fa-pencil-alt"></i></a>&nbsp; &nbsp;

                                    <a data-id="{{$Data->id}}" class="text-danger delete"><i class="fas fa-times"></i></a>
                                    <?php
                                }
                                ?>
                            </td>
                            <td>{{$Sl}}</td>

                            <td>
                                <div class="embed-responsive embed-responsive-16by9"><iframe class="embed-responsive-item" src="https://www.youtube.com/embed/{{$Data->link}}" allowfullscreen></iframe></div>
                            </td>

                            <td>{{$Data->title}}</td>
                            <td>{{$Data->title_en}}</td>
                            <td>{{$Data->display_order}}</td>
                            <td>{!!($Data->display == 'Yes')? "<h3 class='text-success'>".$Data->display."</h3>":"<h3 class='text-danger'>".$Data->display."</h3>" !!}</td>
                            <td>{!!($Data->featured == 'Yes')? "<h3 class='text-success'>".$Data->featured."</h3>":"<h3 class='text-danger'>".$Data->featured."</h3>" !!}</td>

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
        {{ $SearchData->withQueryString()->links() }}
    </div>

</div>
@endsection