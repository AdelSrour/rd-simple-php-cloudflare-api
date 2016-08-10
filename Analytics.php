<?php

//Setup date settings
$since = '2016-07-03T00:00:00Z';
$until = '2016-08-03T00:00:00Z';
$date = "since=$since"."&until=$untile";

//Your account email address
$email = 'example@example.com';

//Account API Key. you can get it from account settings
$key = 'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX';

//Domain identifier. you can get it by clicking on domain name then go to DNS page for example and right click on page
//and click get page source and search for {"zones" then you will find [{"id":"XXXXX". XXXXX is the zone identifier
$zone_identifier = 'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX';

$req = array(
  'http'=>array(
    'ignore_errors' => true,
    'method'=>"GET",
    'header'=>
    "X-Auth-Email: $email\r\n" .
    "X-Auth-Key: $key\r\n" .
    "Content-Type: application/json\r\n"
  )
);

$context = stream_context_create($req);

$response = file_get_contents('https://api.cloudflare.com/client/v4/zones/'.$zone_identifier.'/analytics/dashboard?'.$date.'&continuous=true', false, $context);

//print response
echo $response;

?>
