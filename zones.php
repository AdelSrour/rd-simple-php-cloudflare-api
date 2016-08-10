<?php

//What data you want to get. security_level means the value of my current Security Level.
//check https://api.cloudflare.com/ for more info.
$id = 'security_level';

//Your account email address
$email = 'example@example.com';

//Account API Key. you can get it from account settings
$key = 'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX';

//Domain identifier. you can get it by clicking on domain name then go to DNS page for example and right click on page
//and click get page source and search for {"zones" then you will find [{"id":"XXXXX". XXXXX is the zone identifier
$zone_identifier = 'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX';

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

$response = file_get_contents('https://api.cloudflare.com/client/v4/zones/'.$zone_identifier.'/settings/'.$id, false, $context);

//print response
echo $response;

?>
