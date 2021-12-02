<table>
    <thead>
        <tr>
            <th>#</th>
            <th>Application Category</th>
            <td>Round</td>
            <td>Startup</td>
            <th>Status</th>
            <th>Status Changed By</th>
            <th>Startup Category</th>
            <th>Startup Details</th>
            <th>Intro Video</th>
            <th>Website</th>
            <th>Address</th>
            <th>Startup Stage</th>
            <th>Revenue (USD)</th>
            <th>Target Market</th>
            <th>Business Strategy</th>
            <th>Team Leader</th>
            <th>Email</th>
            <th>Mobile</th>
            <th>Total Member</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if ($SearchData->count()) {
            $Sl = 0;
            foreach ($SearchData as $Data) {
                $Sl++;
                ?>
                <tr>
                    <td>{{$Sl}}</td>
                    <td>{{$Data->getRound->getChapter->chapter_name}}</td>
                    <td>{{$Data->getRound->round_name}}</td>
                    <td>{{$Data->getStartup->startup_name}}</td>
                    <td>{{$Data->status != NULL ? $Data->status: '-' }}</td>
                    <td>{{$Data->status != NULL ? $Data->getStatusChangedBy->first_name." ".$Data->getStatusChangedBy->last_name: '-' }}</td>
                    <td>{{$Data->getStartup->getStartupCategory->startup_category_name}}</td>
                    <td>{{str_replace('\n','<br/>',$Data->getStartup->startup_details)}}</td>
                    <td>{{$Data->getStartup->startup_intro_video}}</td>
                    <td>{{$Data->getStartup->startup_website}}</td>
                    <td>
                        <?php
                        if (!empty($Data->getStartup->business_address)) {
                            ?>
                            {{$Data->getStartup->business_address}}
                            <?php
                        } else {
                            echo "Not Given.";
                        }

                        if (!empty($Data->getStartup->city_id)) {
                            ?>
                            <br/>{{$Data->getStartup->getCity->name}}, {{$Data->getStartup->getCity->getState->name}}, {{$Data->getStartup->getCity->getState->getCountry->name}}
                            <?php
                        }
                        ?>
                    </td>
                    <td>{{$Data->getStartup->stage}}</td>
                    <td>{{(!empty($Data->getStartup->revenue))? $Data->getStartup->revenue:'N/A'}}</td>
                    <td>{{str_replace('\n','<br/>',$Data->getStartup->target_market)}}</td>
                    <td>{{str_replace('\n','<br/>',$Data->getStartup->business_strategy)}}</td>
                    <td>{{$Data->getStartup->getUser->first_name}} {{$Data->getStartup->getUser->last_name}}</td>
                    <td>{{$Data->getStartup->getUser->email}}</td>
                    <td>{{$Data->getStartup->getUser->mobile}}</td>
                    <td>{{$Data->getStartup->getStartupTeamMember->count()}}</td>
                </tr>
                <?php
            }
        }
        ?>
    </tbody>
</table>