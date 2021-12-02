@extends("new-admin-template")

@section("content")


<style>


    .list-group-item{
        font-size: 1.2rem;
    }

    .badge-pill{
        font-size: 1.5rem;
    }
</style>

<div class="row">
    <div class="col-md-2 mr-2 mt-2">
        <div class="row p-2 bg-info">
            <h5 class="w-100 border-bottom border-white">Registered (Total)</h5>
            <?php
            $User = \App\User::where('user_type', 'User')->count();
            ?>
            <h6>{{$User}}</h6>
        </div>
    </div>

    <div class="col-md-2 mr-2 mt-2">
        <div class="row p-2 bg-warning ">
            <h5 class="w-100 border-bottom border-white">Email Verified (Total)</h5>
            <?php
            $User = \App\User::where('user_type', 'User')->whereNotNull('email_verified_at')->count();
            ?>
            <h6>{{$User}}</h6>
        </div>
    </div>



</div>

@endsection