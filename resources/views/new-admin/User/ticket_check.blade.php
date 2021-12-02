@extends("new-admin-template")

@section("content")
<div class="row">
    <div class="col-12">
        <div class="card card-primary">
            <div class="card-header"><h4>Search</h4></div>
            <div class="card-body">
                <form>
                    <div class="row">
                        <div class="col-md-4">
                            <b>Ticket Code</b>
                            <input type="number" name="ticket" id="ticket" value="" class="form-control"/>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 text-center">
                            <input type="submit" value="Search" class="btn btn-primary"/>
                        </div>
                    </div>

                </form>
            </div>

            <?php
            if (!empty(request()->input('ticket'))) {
                $Class = "bg-danger";
                if ($Data != null) {
                    $Class = "bg-success";
                }
                ?>
                <div class="row">
                    <div class="col-md-4">
                        <table class="table table-bordered table-striped table-condensed">
                            <tbody>
                                <tr>
                                    <td colspan="2" class="text-center">
                                        <h3 class="text-white {{$Class}} ">DBD2021-{{request()->input('ticket')}}</h3>
                                    </td>
                                </tr>
                                <?php
                                if ($Data != null) {
                                    ?>
                                <tr>
                                    <td colspan="2" class="text-white text-center bg-success">
                                        <h2>FOUND!!!</h2>
                                    </td>
                                </tr>
                                    <tr>
                                        <td>Name: </td>
                                        <td>{{$Data->name}}</td>
                                    </tr>
                                    <tr>
                                        <td>Email: </td>
                                        <td>{{$Data->email}}</td>
                                    </tr>
                                    <tr>
                                        <td>Mobile: </td>
                                        <td>{{$Data->mobile_no}}</td>
                                    </tr>
                                    <tr>
                                        <td>Gender: </td>
                                        <td>{{$Data->gender}}</td>
                                    </tr>
                                    <tr>
                                        <td>Occupation: </td>
                                        <td>{{$Data->occupation}}</td>
                                    </tr>
                                    <?php
                                }else{
                                    ?>
                                    <tr>
                                        <td colspan="2" class="text-center text-white bg-danger">
                                            <h1>NOT FOUND</h1>
                                        </td>
                                    </tr>
                                    <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>

    </div>

</div>

<script type="text/javascript">
    $(document).ready(function () {
        $("#ticket").focus();
    });
</script>
@endsection