mysms-api-php-wrapper
=====================

mysms.com developer API php wrapper class

How to Use
----------

<pre>

<?php

//include mysms class
include_once('class.mysms.php');

//API Key
$api_key = 'REPLACE-WITH-YOURS-API-KEY';

//initialize class with apiKey and AuthToken(if available)
$mysms = new mysms($api_key);

//lets login user to get AuthToken
$login_data = array('msisdn' => '919812345678', 'password' => 'PASSWORD');

$login = $mysms->ApiCall('json', '/user/login', $login_data);  //providing REST type(json/xml), resource from http://api.mysms.com/index.html and POST data

print $login;  //debug login data

$user_info = json_decode($login); //decode json string to get AuthToken

$AuthToken = $user_info->authToken;

?>

</pre>
