@extends("landing_template_2")

@section("content")

<style>

    #accordion .card{
        margin: 10px 0px;
        border: none;
    }

    #accordion .card .card-header{
        background-color: rgb(255,255,255);
        border-bottom: none;
    }

    #accordion .card .card-header .card-link{
        color: #000;
        font-weight: bold;
        margin-right: 25px;
    }

    #accordion .card .card-header .card-link::before{
        content: "\2192";
        font-size: 1.2rem;
    }

    #accordion .card .card-header .sign{

        float: right;
        color: #000;
    }

    #accordion .card .card-header .sign:hover{
        text-decoration: none;
    }

    #accordion .card .card-header .sign::after{
        content: "\271A";
        color: #000;
    }

    #accordion .card .card-body{
        font-weight: 500;
        color: gray;
        padding-left: 40px;
    }

</style>


<section class="before-footer section-bg">
    <div class="container">
        <div class="row" style="padding-top: 0.5em; ">
            <div class="col-md-8 offset-md-2 text-center">
                <img src="assets/img/faq.png" style="width: 100%; max-width: 450px; display: none" />
                <h1 style=" margin: 40px 0px">REGISTRATION</h1>
            </div>


            <div class="col-12 col-md-8 col-xl-8 offset-md-2 offset-xl-2">


                <?php if (Session::has('success')): ?>
                    <div class="alert alert-success">{{request()->session()->pull('success', 'default')}}</div>
                <?php endif; ?>

                <?php if (Session::has('error')): ?>
                    <div class="alert alert-danger">{{request()->session()->pull('error', 'default')}}</div>
                <?php endif; ?>

                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif


                <form action="{{route('register_new')}}" method="POST">
                    @csrf

                    <div class="form-group">
                        <div class="row">
                            <label class="col-sm-3 col-md-3 col-form-label">Email <span class="text-danger">*</span></label>
                            <div class="col-sm-9 col-md-9">
                                <input type="email" name="email" value="{{old('email')}}" class="form-control" placeholder="abc@big.org.bd" required/>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <label class="col-sm-3 col-md-3 col-form-label">Password <span class="text-danger">*</span></label>
                            <div class="col-sm-9 col-md-9">
                                <input type="password" name="password" value="" class="form-control" placeholder="Password"/>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <label class="col-sm-3 col-md-3 col-form-label">Confirm Password <span class="text-danger">*</span></label>
                            <div class="col-sm-9 col-md-9">
                                <input type="password" name="password_confirmation" value="" class="form-control" placeholder="Confirm password"/>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <label class="col-sm-3 col-md-3 col-form-label">Captcha <span class="text-danger">*</span></label>
                            <div class="col-sm-9 col-md-9">

                                <img src="{{captcha_src()}}" id="captcha_img" style="width: 200px;border: solid #000 1px"/>


                                <a href="javascript:;" id="captcha"><i class="icofont-refresh"></i> Get new image</a>
                                <br/><br/>

                                <input type="text" name="captcha" value="" class="form-control" placeholder="Captcha text"/>
                            </div>
                        </div>
                    </div>

                    <div class=" form-group">
                        <div class="row">
                            <div class="col-sm-3 col-md-3 col-form-label">&nbsp;</div>

                            <div class="col-sm-9 col-md-9">
                                <div class="form-check">
                                    <label>
                                        <input type="checkbox" name="agree" value="1" class="" style="border: solid gray 1px" required/> I agree to all Terms & Conditions
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-12 text-center" style="margin-bottom: 60px">
                                <input type="submit" value="Register" class="btn btn-info"/>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</section>


<script type="text/javascript">
    $(document).ready(function () {
        $("#captcha").click(function () {
            $.ajax({
                url: "/captcha_img",
                data: {},
                success: function (data) {
                    console.log(data);
                    $("#captcha_img").attr("src", data.src);
                },
                error: function (error) {
                    alert(error.responseText);
                }
            });
        });
    });
</script>







@endsection