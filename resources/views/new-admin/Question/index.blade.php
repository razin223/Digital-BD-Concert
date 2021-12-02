@extends("new-admin-template")

@section("content")

<script type="text/javascript">
    $(document).ready(function () {
        $(".delete").click(function () {
            if (confirm("Do you really want to delete this?")) {
                var ID = $(this).data('id');
                $.ajax({
                    url: "/Question/" + ID,
                    method: "DELETE",
                    success: function (data) {
                        $("#row_" + ID).hide().remove();
                    },
                    error: function (data) {
                        alert(data.responseText);
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


                        <div class="col-md-4" >
                            <b>Group</b>
                            <select name="group" class="form-control">
                                <option value="">(select)</option>
                                <?php
                                foreach (['Ka', 'Kha','Ga'] as $value) {
                                    echo "<option value='{$value}'";
                                    echo ($value == request()->input('group')) ? "selected" : "";
                                    echo ">{$value}</option>";
                                }
                                ?>
                            </select>
                        </div>

                        
                        <div class="col-md-4">
                            <b>Question Text</b>
                            <input type="text" name="question" value="{{request()->input('question')}}" class="form-control"/>
                        </div>

                        <div class="col-12 text-center">
                            <input type="submit" value="Search" class="btn btn-primary"/>
                        </div>
                    </div>

                </div>
            </div>
        </form>

        <div class="card card-success">
            <div class="card-header"><h5>Result</h5></div>
            <div class="card-body">
                <table class="table table-condensed">
                    <thead>
                        <tr>
                            <th>Action</th>
                            <th>#</th>
<!--                            <th>Category</th>
                            <th>Language</th>-->
                            <th>Group</th>
                            <th>Question & Options</th>
                            <th>Modification</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $Sl = ($SearchData->currentPage() - 1) * $SearchData->perPage();
                        $Language = ['En' => "English", 'Bn' => "Bangla"];
                        foreach ($SearchData as $Data) {


                            $Sl++;
                            ?>
                            <tr id="row_{{$Data->id}}">
                                <td>
                                    <a href="{{route('Question.edit',['Question'=>$Data->id])}}"><i class="fas fa-pencil-alt"></i></a> &nbsp;&nbsp;&nbsp;&nbsp;
                                    <a href="javascript:;" data-id='{{$Data->id}}' class="text-danger delete"><i class="fas fa-times"></i></a>
                                </td>
                                <td>{{$Sl}}</td>
                                <td>{{$Data->group}}</td>
    <!--                                <td>{{!empty($Data->category_id)?$Data->getCategory->category_name:"-"}}</td>
                                <td>{{!empty($Data->language)?$Language[$Data->language]:"-"}}</td>-->
                                <td>
                                    <b>Question</b><br/>
                                    {{$Data->question}}<br/><br/>
                                    <b>Options</b><br/>
                                    <?php
                                    foreach (range(1, 4) as $value) {
                                        $Parameter = "option_" . $value;
                                        ?>
                                        {!! ($Data->answer == $value)? "<i class='fas fa-check text-success'></i>":"&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"!!} {{$value}}. {{$Data->$Parameter}}<br/>
                                        <?php
                                    }
                                    ?>
                                </td>
                                <td>
                                    Created: {{$Data->createdBy->name}} {{date("d-M-Y h:i:sA",strtotime($Data->created_at))}}<br/>
                                    Updated: {{$Data->updatedBy->name}} {{date("d-M-Y h:i:sA",strtotime($Data->updated_at))}}<br/>
                                </td>
                            </tr>

                            <?php
                        }
                        ?>
                    </tbody>
                </table>

                {{$SearchData->withQueryString()->links()}}
            </div>
        </div>




    </div>

</div>
@endsection