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
                            <input type="text" name="ticket" value="" class="form-control"/>
                        </div><br/>
                        <div class="col-md-4 text-center">
                            <input type="submit" value="Search" class="btn btn-primary"/>
                        </div>
                    </div>
                    
                </form>
            </div>
            
            <?php

            ?>
        </div>

    </div>

</div>
@endsection