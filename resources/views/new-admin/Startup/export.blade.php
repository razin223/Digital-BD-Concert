<table>
    <thead>
        <tr>
            <th>#</th>
            <td>Startup</td>
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
                    <td>{{htmlentities($Data->startup_name)}}</td>
                    <td>{{htmlentities($Data->getStartupCategory->startup_category_name)}}</td>
                    <td>{{$Data->startup_details}}</td>
                    <td>{{$Data->startup_intro_video}}</td>
                    <td>{{$Data->startup_website}}</td>
                    <td>
                        <?php
                        if (!empty($Data->business_address)) {
                            ?>
                            {{htmlentities($Data->business_address)}}
                            <?php
                        } else {
                            ?>
                            {{'Not Given'}}
                                <?php
                        }

                        if (!empty($Data->city_id)) {
                            ?>
                            <br/>{{$Data->getCity->name}}, {{$Data->getCity->getState->name}}, {{$Data->getCity->getState->getCountry->name}}
                            <?php
                        }
                        ?>
                    </td>
                    <td>{{$Data->stage}}</td>
                    <td>{{(!empty($Data->revenue))? $Data->revenue:'N/A'}}</td>
                    <td>{{$Data->target_market}}</td>
                    <td>{{$Data->business_strategy}}</td>
                    <td>{{$Data->getUser->first_name}} {{$Data->getUser->last_name}}</td>
                    <td>{{$Data->getUser->email}}</td>
                    <td>{{$Data->getUser->mobile}}</td>
                    <td>{{$Data->getStartupTeamMember->count()}}</td>
                </tr>
                <?php
            }
        }
        ?>
    </tbody>
</table>