@extends("new-admin-template")

@section("content")
<div class="row">
    <div class="col-12">
        <div class="table-responsive">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>&nbsp;</th>
                        <th>#</th>
                        <th>Image</th>
                        <th>Category</th>
                        <th>Serial</th>
                        <th>Display</th>
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
                                <a href="{{route('photo_edit',['id'=>$Data->id])}}"><i class="fas fa-pencil-alt"></i></a>&nbsp; &nbsp;
                                
                                <a onclick="return confirm('Do you really want to delete this photo?')" href="{{route('photo_delete',['id'=>$Data->id])}}" class="text-danger"><i class="fas fa-times"></i></a>
                            </td>
                            <td>{{$Sl}}</td>
                            <td>
                                <img src="{{asset('photo_gallery/'.$Data->file)}}" style="width: 200px;border: solid lightgray 1px" class="img-fluid">
                            </td>
                            <td>{{$Data->getPhotoCategory->photo_category_name}}</td>
                            <td>{{$Data->serial}}</td>
                            <td>{!!($Data->display == 'Yes')? "<h3 class='text-success'>".$Data->display."</h3>":"<h3 class='text-danger'>".$Data->display."</h3>" !!}</td>
                            <td>
                                {{$Data->getUser->first_name}} {{$Data->getUser->last_name}}<br/>
                                Created: {{date("d-M-Y h:i:sA",strtotime($Data->created_at))}}<br/>
                                Updated: {{date("d-M-Y h:i:sA",strtotime($Data->updated_at))}}<br/>
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