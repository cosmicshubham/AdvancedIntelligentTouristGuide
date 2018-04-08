<?php include( "userDashboardHeader.php" );
$client_key="JPBEZAJ1STTXOB0BLE5FQTA0A421K2HMBA1IHKDLGPDPDHCM";
$client_secret = "OFLMCJQZYOZXMLDAAMD4K1SP20LH0D0H4DB3F4BU4I5YRDR1";
function callGetApi($url) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $output = curl_exec($ch);
    curl_close($ch);
    $output = json_decode($output, true);
    // echo "dadada";
    return $output;
}

function getPhotos($venueIDs) {
    global $client_key, $client_secret;
    $photos = array();
    $i = -1;
    foreach ($venueIDs as $venueId) {

        $url = "https://api.foursquare.com/v2/venues/" . $venueId['id'] . "/photos?&limit=1&client_id=" . $client_key . "&client_secret=" . $client_secret . "&v=20180317";

        $output = callGetApi($url);

        if ($output['response']['photos']['count'] >= 1) {
            $photos[++$i] = $output['response']['photos']['items'][0]['prefix'] . '500x500' . $output['response']['photos']['items'][0]['suffix'];

            //echo "url = ".$venueList[$i]['photo']."\n";
        } else {
            //echo "No Photo";
            $photos[++$i] = '';
        }
    }

    return $photos;
}

function getPhotoSingle($venueID) {
    global $client_key, $client_secret;
    $photos = array();
        $url = "https://api.foursquare.com/v2/venues/" . $venueID . "/photos?&limit=1&client_id=" . $client_key . "&client_secret=" . $client_secret . "&v=20180317";

        $output = callGetApi($url);

        if ($output['response']['photos']['count'] >= 1) {
            $photos[0] = $output['response']['photos']['items'][0]['prefix'] . '400x300' . $output['response']['photos']['items'][0]['suffix'];

            //echo "url = ".$venueList[$i]['photo']."\n";
        } else {
            //echo "No Photo";
            $photos[0] = '';
        }
    

    return $photos[0];
}

function getVenuesListUsingLatLng($lat, $lng, $radius = 20000) {
    global $client_key, $client_secret;
    $url = "https://api.foursquare.com/v2/venues/explore?ll=" . $lat . "," . $lng . "&radius=" . $radius . "&limit=10&client_id=" . $client_key . "&client_secret=" . $client_secret . "&v=20180317";
    $output = callGetApi($url);
    $venueList = array();
    //echo "<pre>";
    foreach ($output['response']['groups'][0]['items'] as $i) {
        $venue = array();
        if (isset($i['venue']['id']))
            $venue['id'] = $i['venue']['id'];
        if (isset($i['venue']['name']))
            $venue['name'] = $i['venue']['name'];
        if (isset($i['venue']['location']['address']))
            $venue['address'] = $i['venue']['location']['address'];
        if (isset($i['venue']['location']['city']))
            $venue['city'] = $i['venue']['location']['city'];
        if (isset($i['venue']['location']['state']))
            $venue['state'] = $i['venue']['location']['state'];
        if (isset($i['venue']['location']['country']))
            $venue['country'] = $i['venue']['location']['country'];
        if (isset($i['venue']['location']['lat']))
            $venue['lat'] = $i['venue']['location']['lat'];
        if (isset($i['venue']['location']['lng']))
            $venue['lng'] = $i['venue']['location']['lng'];
        if (isset($i['tips'][0]['text']))
            $venue['description'] = $i['tips'][0]['text'];
        if (isset($i['venue']['rating']))
            $venue['rating'] = $i['venue']['rating'];
        if (isset($i['venue']['hours']['status']))
            $venue['status'] = $i['venue']['hours']['status'];
        if (isset($i['venue']['url']))
            $venue['url'] = $i['venue']['url'];
        //$venue['photos'] = '';
        //print_r($venue);
        array_push($venueList, $venue);
    }
    //getPhotos($venueList);
    return $venueList;
    //echo "</pre>";
}


?>

    
    <?php
        
        $resultFrom4s = getVenuesListUsingLatLng(41.9028, 12.4964, 20000);
        foreach($resultFrom4s as $i) {
            //$resultFromPhotos = getPhotos($i['id']);
            //echo($resultFromPhotos);
            echo ("         <div class='col-xl-4 col-lg-3'>
        <div class='card'>
            <div class='card-body'>
                <div class='stat-widget-one'>
                    <div>");
                    echo ("         <div class='stat-text '><h6><strong>" . $i['name'] . "<strong></h6></div><br>");
                    echo ("         <div><img alt='image' src='" . getPhotoSingle($i['id']) . "'/></div><br/>");
                    echo("</div>
                    <div class='stat-content dib'>");
            if(isset($i['address'])){
                echo ("         <div class='stat-text '><strong>Address : </strong></div>");
                $add = $i["address"];
            }
                
            else
                $add = "<br>";
           
          
            
             echo ("         <div class='stat-text'><mark>" . $add ."<mark></div>");
            echo ("         <div class='stat-text '><strong> Ratings : </strong></div>");
             echo ("         <div class='stat-text'><mark>" . $i['rating'] . "<mark></div>");
            echo ("
                        
                    </div>
                </div>
            </div>
        </div>
    </div>");
            
            
            
            
            
        }
    
    ?>
    
    
    
<!-- /#right-panel --> 
<?php include( "userDashboardFooter.php" ); ?>