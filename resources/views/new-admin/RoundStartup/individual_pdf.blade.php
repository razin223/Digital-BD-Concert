<!DOCTYPE html>
<html lang="en">
    <head>
        <title>{{$title}}</title>
        <meta charset="utf-8">




        <style>
            table tbody tr td:first-child{
                font-weight: 800;
            }


            @font-face {
                font-family: 'Bangla';
                src: url(/Bangla_Font/SolaimanLipi_20-04-07.ttf);
            }

            body{
                font-family: 'Bangla', sans-serif;
                font-weight: 500;
            }

            table tr td{
                text-align: justify;
                border-bottom: solid lightgray 1px;
                padding: 5px;
            }

            table tr td:nth-child(1) {
                font-weight: bold;
                font-size: 10pt;
                text-align: left;
                vertical-align: top;
            }

            table tr td:nth-child(2) {
                font-size: 9pt;
                font-weight: normal;
            }

            .text-center{
                text-align: center;
            }

            @page { margin-left: 0.75in; margin-right: 0.75in }
            body { margin: 0px; }




        </style>
    </head>
    <body style=" width: 210mm;">


        <?php
        $Data = \App\RoundStartup::find($id);

        $Round = $Data->getRound;
        $Chapter = $Round->getChapter;
        $Startup = $Data->getStartup;
        ?>

        <table cellpadding="0" cellspacing="0" border="0" style="width: 7in; table-layout:fixed">
            <tbody>
                <tr>
                    <td style="width: 20%">
                        <img src="{{(!empty($Startup->startup_logo) && file_exists(public_path('startup_content/'.$Startup->startup_logo)))? public_path('startup_content/'.$Startup->startup_logo):public_path('assets/img/no-image.png')}}" style="max-width: 1in; max-height: 1in"/>
                    </td>
                    <td>
                        <h1 class="text-center">{{$Startup->startup_name}}</h1>
                        <h5 class="text-center">{{$Chapter->chapter_name}}</h5>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">&nbsp;</td>
                </tr>
                <tr>
                    <td align="center" colspan="2">
                        <h3>Startup Profile</h3>
                    </td>
                </tr>
                <tr>
                    <td style="width: 2in">Category: </td>
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
                            <img src="{{(!empty($Startup->startup_cover) && file_exists(public_path('startup_content/'.$Startup->startup_cover)))? public_path('startup_content/'.$Startup->startup_cover):public_path('assets/img/no-image.png')}}" class="rounded" style="max-width: 2in;max-height: 2in"/><br/>
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
                                <img src="{{(!empty($Startup->startup_poster) && file_exists(public_path('startup_content/'.$Startup->startup_poster)))? public_path('startup_content/'.$Startup->startup_poster):public_path('assets/img/no-image.png')}}" class="rounded" style="max-width: 2in; max-height: 2in"/><br/>

                                <?php
                            } else {
                                ?>
                                PDF<br/>
                                <a href="{{asset('startup_content/'.$Startup->startup_poster)}}" target='_blank' class='btn btn-primary'>{{asset('startup_content/'.$Startup->startup_poster)}}</a>
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
                            <img src="{{(!empty($Startup->startup_poster) && file_exists(public_path('startup_content/'.$Startup->group_picture)))? public_path('startup_content/'.$Startup->group_picture):public_path('assets/img/no-image.png')}}" class="rounded" style="width: 300px"/><br/>

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
                <tr >
                    <td colspan="2"><div style=" page-break-after: always">&nbsp;</div></td>
                </tr>
                <tr>
                    <td colspan="2" class="text-center">
                        <h3>Team Member Details</h3>
                    </td>
                </tr>

                <?php
                foreach ($Startup->getStartupTeamMember as $TeamMember) {

                    if ($TeamMember->user_id != NULL) {
                        $Member = $TeamMember->getMember;
                    } else {
                        $Member = $TeamMember;
                    }
                    ?>

                    <tr>
                        <td><img src="{{(!empty($Member->picture) && file_exists(public_path('profile_pictures/'.$Member->picture)))? public_path('profile_pictures/'.$Member->picture): public_path('assets/img/no-image.png')}}" style="max-width: 1in; max-height: 1in;"/></td>
                        <td class="text-center"><h4>{{$Member->first_name}} {{$Member->last_name}}</h4> <h5>{{$TeamMember->position_name}}</h5></td>
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


                    <?php
                }
                ?>
            </tbody>
        </table>

    </body>
</html> 