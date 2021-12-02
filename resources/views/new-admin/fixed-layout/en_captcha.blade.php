<div class="form-group" style="position: relative; border: solid #c9c8c8 1px;">
    <div id="captcha_zone" style="position:  relative; top: 0; left: 0; width: 100%;">
        <img src="{{captcha_src()}}" id="captcha_img" style="width: 85%; height: 70px;"/>
        <a href="javascript:;" style="position:  relative; margin-top: 20px;" id="captcha"> <img src="{{asset('assets/icon/refresh.png')}}" style="width: 12%" class="rounded-circle"/></a>
    </div>
    <input type="text" name="captcha" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Enter the letters shown in the above image">
</div>