@extends("new-admin-template")

@section("content")

<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <?php
                $Data = \App\Exam::find($id);
                if ($Data != null) {
                    $User = $Data->getUser;
                    ?>
                    <table class="table">
                        <tr>
                            <td style="width: 100px">প্রাপ্ত নম্বর: </td>
                            <td>{{$Data->mark_obtained}}</td>
                        </tr>
                        <tr>
                            <td>সময়: </td>
                            <td>{{(int)($Data->time_taken/60)}} min {{($Data->time_taken%60)}}sec</td>
                        </tr>
                    </table>
                    <table class="table" style="border: solid lightgray 1px">
                        <tbody>
                            <tr>
                                <td rowspan="4" style="border: solid lightgray 1px" class="text-center">
                                    <?php
                                    if ($User->picture != null) {
                                        ?>
                                        <img src="{{$User->picture}}" style="max-width: 100px; max-height: 100px"/>
                                        <?php
                                    } else {
                                        ?>
                                        <h6>ছবি দেওয়া হয় নাই</h6>
                                        <?php
                                    }
                                    ?>
                                </td>
                                <td>নাম: {{($User->name != null)? $User->name:"দেওয়া হয় নাই"}}</td>
                            </tr>
                            <tr>
                                <td>মোবাইল নং: {{$User->mobile_number != null? $User->mobile_number: "দেওয়া হয় নাই"}}</td>
                            </tr>
                            <tr>
                                <td>ইমেইল: {{$User->email}}</td>
                            </tr>
                            <tr>
                                <td>গ্রুপ: {{$User->group != null? $User->group: "দেওয়া হয় নাই"}}</td>
                            </tr>
                            <tr>
                                <td>ক্লাস: </td>
                                <td>{{$User->class != null? $User->class: "দেওয়া হয় নাই"}}</td>
                            </tr>
                            <tr>
                                <td>ঠিকানা: </td>
                                <td>
                                    <?php
                                    if ($User->address != null) {
                                        ?>
                                        {{$User->address}},
                                        <?php
                                    }
                                    if ($User->district_id != null) {
                                        ?>
                                        {{$User->getDistrict->bn}}, {{$User->getDistrict->getDivision->bn}}, {{$User->getDistrict->getDivision->getCountry->bn}}
                                        <?php
                                    }
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td>জন্ম তারিখ: </td>
                                <td>{{$User->date_of_birth != null ? date("d-M-Y",strtotime($User->date_of_birth)):"দেওয়া হয় নাই"}}</td>
                            </tr>
                            <tr>
                                <td>লিঙ্গ: </td>
                                <td>{{$User->gender != null ? $User->gender:"দেওয়া হয় নাই"}}</td>
                            </tr>
                            <tr>
                                <td>জাতীয়তা: </td>
                                <td>{{$User->nationality != null ? $User->getNationality->name:"দেওয়া হয় নাই"}}</td>
                            </tr>
                        </tbody>
                    </table>

                    <p>&nbsp;</p>

                    <?php
                    $Question = \App\Question::whereIn('id', explode(",", $Data->questions))
                            ->orderByRaw(\DB::raw("FIELD(id, " . $Data->questions . ")"))
                            ->get();
                    $Answer = json_decode($Data->answer_submitted,true);

                    foreach ($Question as $key => $value) {
                        ?>
                        <div class="row">
                            <div class="col-12">{{$key+1}}. {{$value->question}}</div>
                            <div class="col-12">
                                <?php
                                foreach (range(1, 4) as $option) {
                                    $Parameter = "option_" . $option;
                                    $Sign = "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
                                    if (isset($Answer[$value->id])) {
                                        if ($Answer[$value->id] == $option) {
                                            if ($option == $value->answer) {
                                                $Sign = "<i class='fas fa-check text-success'></i>";
                                            } else {
                                                $Sign = "<i class='fas fa-times text-danger'></i>";
                                            }
                                        } else {
                                            if ($option == $value->answer) {
                                                $Sign = "<i class='fas fa-check'></i>";
                                            }
                                        }
                                    } else {
                                        if ($option == $value->answer) {
                                            $Sign = "<i class='fas fa-check'></i>";
                                        }
                                    }
                                    ?>
                                    {!! $Sign !!} {{$option}}. {{$value->$Parameter}}<br/>
                                    <?php
                                }
                                ?>
                            </div>
                        </div>
                        <?php
                    }
                    ?>

                    <?php
                } else {
                    ?>
                    <h4 class="w-100 text-center text-danger">No data found.</h4>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>
</div>
@endsection