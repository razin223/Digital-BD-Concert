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
        <div class="row p-2 bg-purple">
            <h5 class="w-100 border-bottom border-white">Registered (Ka)</h5>
            <?php
            $User = \App\User::where('user_type', 'User')->where('group', 'Ka')->count();
            ?>
            <h6>{{$User}}</h6>
        </div>
    </div>

    <div class="col-md-2 mr-2 mt-2">
        <div class="row p-2 bg-green">
            <h5 class="w-100 border-bottom border-white">Registered (Kha)</h5>
            <?php
            $User = \App\User::where('user_type', 'User')->where('group', 'Kha')->count();
            ?>
            <h6>{{$User}}</h6>
        </div>
    </div>
    
    <div class="col-md-2 mr-2 mt-2">
        <div class="row p-2 bg-gradient-indigo">
            <h5 class="w-100 border-bottom border-white">Registered (Ga)</h5>
            <?php
            $User = \App\User::where('user_type', 'User')->where('group', 'Ga')->count();
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

    <div class="col-md-2 mr-2 mt-2">
        <div class="row p-2 bg-indigo  ">
            <h5 class="w-100 border-bottom border-white">Email Verified (Ka)</h5>
            <?php
            $User = \App\User::where('user_type', 'User')->where('group', 'Ka')->whereNotNull('email_verified_at')->count();
            ?>
            <h6>{{$User}}</h6>
        </div>
    </div>

    <div class="col-md-2 mr-2 mt-2">
        <div class="row p-2 bg-olive disabled  ">
            <h5 class="w-100 border-bottom border-white">Email Verified (Kha)</h5>
            <?php
            $User = \App\User::where('user_type', 'User')->where('group', 'Kha')->whereNotNull('email_verified_at')->count();
            ?>
            <h6>{{$User}}</h6>
        </div>
    </div>
    
     <div class="col-md-2 mr-2 mt-2">
        <div class="row p-2 bg-lightblue disabled  ">
            <h5 class="w-100 border-bottom border-white">Email Verified (Ga)</h5>
            <?php
            $User = \App\User::where('user_type', 'User')->where('group', 'Ga')->whereNotNull('email_verified_at')->count();
            ?>
            <h6>{{$User}}</h6>
        </div>
    </div>

    <div class="col-md-2 mr-2 mt-2">
        <div class="row p-2 bg-primary">
            <h5 class="w-100 border-bottom border-white">Profile Updated (Total)</h5>
            <?php
            $User = \App\User::where('user_type', 'User')->whereNotNull('class')->count();
            ?>
            <h6>{{$User}}</h6>
        </div>
    </div>

    <!-- <div class="col-md-2 mr-2 mt-2">
        <div class="row p-2 bg-success">
            <h5 class="w-100 border-bottom border-white">Practice Exam Taken</h5>
    <?php
    $User = \App\TemporaryExam::count();
    ?>
            <h6>{{$User}}</h6>
        </div>
    </div> -->

    <div class="col-md-2 mr-2 mt-2">
        <div class="row p-2 bg-dark">
            <h5 class="w-100 border-bottom border-white">Exam Taken (Total)</h5>
            <?php
            $User = \App\Exam::count();
            ?>
            <h6>{{$User}}</h6>
        </div>
    </div>
    
    <div class="col-md-2 mr-2 mt-2">
        <div class="row p-2 bg-orange">
            <h5 class="w-100 border-bottom border-white">Exam Taken (Ka)</h5>
            <?php
            $User = \App\Exam::join('users','exams.user_id','users.id')->where('users.group','=','Ka')->count();
            ?>
            <h6>{{$User}}</h6>
        </div>
    </div>
    
    <div class="col-md-2 mr-2 mt-2">
        <div class="row p-2 bg-pink">
            <h5 class="w-100 border-bottom border-white">Exam Taken (Kha)</h5>
            <?php
            $User = \App\Exam::join('users','exams.user_id','users.id')->where('users.group','=','Kha')->count();
            ?>
            <h6>{{$User}}</h6>
        </div>
    </div>
    
    <div class="col-md-2 mr-2 mt-2">
        <div class="row p-2 bg-navy">
            <h5 class="w-100 border-bottom border-white">Exam Taken (Ga)</h5>
            <?php
            $User = \App\Exam::join('users','exams.user_id','users.id')->where('users.group','=','Ga')->count();
            ?>
            <h6>{{$User}}</h6>
        </div>
    </div>



</div>

@endsection