<?php

session_start();

if (getenv('ENV_MODE') == 'dev'){
  require_once 'common_local.php';
}else{
  require_once 'common_server.php';
}

require_once 'twitteroauth/autoload.php';

use Abraham\TwitterOAuth\TwitterOAuth;

$access_token = $_SESSION['access_token'];

$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $access_token['oauth_token'], $access_token['oauth_token_secret']);

$user = $connection->get("account/verify_credentials");

var_dump($user);