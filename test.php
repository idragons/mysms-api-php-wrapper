<?php

session_start;


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

$_SESSION['AuthToken'] = $user_info->authToken; //saving auth Token in session for more calls

$mysms->setAuthToken($user_info->authToken); //setting up auth Token in class (optional)


$req_data = array('authToken' => $_SESSION['AuthToken']); //providing AuthToken as per mysms developer doc
$usercontacts = $mysms->ApiCall('xml', '/user/contact/contacts/get', $req_data); //calling method ->ApiCall

print $usercontacts; //print result




?>