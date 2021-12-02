<!DOCTYPE html>
<html lang="en">
    <head>
        <title>{{$title}}</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


        <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&family=Lato:wght@300;400;700;900&display=swap" rel="stylesheet">


        <style>
            table tbody tr td:first-child{
                font-weight: 800;
            }


            @font-face {
                font-family: 'Bangla';
                src: url(/Bangla_Font/SolaimanLipi_20-04-07.ttf);
            }

            body{
                font-family: 'DM Sans','Bangla', sans-serif;
                font-weight: 500;
            }


        </style>
    </head>
    <body>


        <?php
        $Data = \App\RoundStartup::find($id);

        $Round = $Data->getRound;
        $Chapter = $Round->getChapter;
        $Startup = $Data->getStartup;
        ?>

        <div class="container">
            <div class="row">
                <div class="col-md-2">

                    <img src="{{(!empty($Startup->startup_logo) && file_exists(public_path('startup_content/'.$Startup->startup_logo)))? asset('startup_content/'.$Startup->startup_logo):asset('assets/img/no-image.png')}}" style="max-width: 200px; max-height: 200px"/>
                </div>
                <div class="col-md-10">
                    <h1 class="text-center">{{$Startup->startup_name}}</h1>
                    <h5 class="text-center">{{$Chapter->chapter_name}}</h5>
                </div>
            </div>

            <div class="row">&nbsp;</div>
            <div class="row">&nbsp;</div>

            <div class="row">
                <div class="col-md-12">
                    <h3>Startup Profile</h3>

                    <table class="table startup">
                        <tbody>
                            <tr>
                                <td style="width: 160px">Category: </td>
                                <td>{{$Startup->getStartupCategory->startup_category_name}}</td>
                            </tr>
                            <tr>
                                <td>Startup Details: </td>
                                <td>{{str_replace('\n','<br/>',$Startup->startup_details)}}</td>
                            </tr>
                            <tr>
                                <td>Intro Video: </td>
                                <td>
                                    <a href="{{$Startup->startup_intro_video}}" target="_blank">{{$Startup->startup_intro_video}}</a>
                                </td>
                            </tr>
                            <tr>
                                <td>Website: </td>
                                <td>
                                    <?php
                                    if (!empty($Startup->startup_website)) {
                                        ?>
                                        <a href="{{$Startup->startup_website}}" target="_blank">{{$Startup->startup_website}}</a>
                                        <?php
                                    } else {
                                        echo "Not Given.";
                                    }
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td>Cover</td>
                                <td>
                                    <?php
                                    if (!empty($Startup->startup_cover)) {
                                        ?>
                                        Cover<br/>
                                        <img src="{{(!empty($Startup->startup_cover) && file_exists(public_path('startup_content/'.$Startup->startup_cover)))? asset('startup_content/'.$Startup->startup_cover):asset('assets/img/no-image.png')}}" class="rounded" style="width: 300px"/><br/>
                                        <br/>
                                        <?php
                                    }
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td>Poster/Pitch Deck</td>
                                <td>
                                    <?php
                                    if (!empty($Startup->startup_poster)) {
                                        $ExtensionArray = explode('.', $Startup->startup_poster);
                                        if (strtolower(end($ExtensionArray)) == 'jpeg' || strtolower(end($ExtensionArray)) == 'jpg' || strtolower(end($ExtensionArray)) == 'png') {
                                            ?>
                                            <img src="{{(!empty($Startup->startup_poster) && file_exists(public_path('startup_content/'.$Startup->startup_poster)))? asset('startup_content/'.$Startup->startup_poster):asset('assets/img/no-image.png')}}" class="rounded" style="width: 300px"/><br/>

                                            <?php
                                        } else {
                                            ?>

                                            <a href="{{asset('startup_content/'.$Startup->startup_poster)}}" target='_blank' class='btn btn-primary'>Open PDF</a>
                                            <?php
                                        }
                                    }
                                    ?>

                                </td>
                            </tr>
                            <tr>
                                <td>Group Picture</td>
                                <td>
                                    <?php
                                    if (!empty($Startup->group_picture)) {
                                        ?>
                                        <img src="{{(!empty($Startup->startup_poster) && file_exists(public_path('startup_content/'.$Startup->group_picture)))? asset('startup_content/'.$Startup->group_picture):asset('assets/img/no-image.png')}}" class="rounded" style="width: 300px"/><br/>

                                        <?php
                                    }
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td>Address: </td>
                                <td>
                                    <?php
                                    if (!empty($Startup->business_address)) {
                                        ?>
                                        {{$Startup->business_address}}
                                        <?php
                                    } else {
                                        echo "Not Given.";
                                    }

                                    if (!empty($Startup->city_id)) {
                                        ?>
                                        <br/>{{$Startup->getCity->name}}, {{$Startup->getCity->getState->name}}, {{$Startup->getCity->getState->getCountry->name}}
                                        <?php
                                    }
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td>Startup Stage: </td>
                                <td>{{$Startup->stage}}</td>
                            </tr>
                            <tr>
                                <td>Revenue: </td>
                                <td>{{(!empty($Startup->revenue))? $Startup->revenue." USD":'N/A'}} </td>
                            </tr>
                            <tr>
                                <td>Target Market: </td>
                                <td>{{str_replace('\n','<br/>',$Startup->target_market)}}</td>
                            </tr>
                            <tr>
                                <td>Business Strategy: </td>
                                <td>{{str_replace('\n','<br/>',$Startup->business_strategy)}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-md-12">&nbsp;</div>
                <div class="col-md-12">&nbsp;</div>
                <div class="col-md-12">
                    <h3>Team Member Details</h3>
                    <?php
                    foreach ($Startup->getStartupTeamMember as $TeamMember) {

                        if ($TeamMember->user_id != NULL) {
                            $Member = $TeamMember->getMember;
                        } else {
                            $Member = $TeamMember;
                        }
                        ?>
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td colspan="2" class="text-center"><img src="{{(!empty($Member->picture) && file_exists(public_path('profile_pictures/'.$Member->picture)))? asset('profile_pictures/'.$Member->picture):asset('assets/img/no-image.png')}}" style="max-width: 100px; max-height: 100px; float: left"/> <h4>{{$Member->first_name}} {{$Member->last_name}}</h4> <h5>{{$TeamMember->position_name}}</h5></td>
                                </tr>
                                <tr>
                                    <td>Qualification being In this position: </td>
                                    <td>{{str_replace("\n","<br/>",$TeamMember->about_yourself)}}</td>
                                </tr>
                                <tr>
                                    <td>Email: </td>
                                    <td>{{$Member->email}}</td>
                                </tr>
                                <tr>
                                    <td>Mobile: </td>
                                    <td>{{$Member->mobile}}</td>
                                </tr>
                                <tr>
                                    <td>Education: </td>
                                    <td>
                                        {{$Member->getEducationLevel->education_level_name}}<br/>
                                        {{$Member->last_degree_name}} ({{$Member->last_degree_passing_year}})
                                    </td>


                                </tr>
                                <tr>
                                    <td>Date of Birth: </td>
                                    <td>
                                        {{(!empty($Member->date_of_birth))? date("d-M-Y",strtotime($Member->date_of_birth)):"N/A"}}
                                    </td>
                                </tr>
                                <tr>
                                    <td>Gender: </td>
                                    <td>{{$Member->gender}}</td>
                                </tr>
                                <tr>
                                    <td>Address: </td>
                                    <td>
                                        {{$Member->address}}<br/>
                                        {{$Member->getCity->name}}, {{$Member->getCity->getState->name}}, {{$Member->getCity->getState->getCountry->name}}
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                        <?php
                    }
                    ?>
                </div>
            </div>


        </div>

    </body>
</html> 