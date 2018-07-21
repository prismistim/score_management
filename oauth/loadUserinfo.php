<?php

session_start();

if (getenv('ENV_MODE') == 'dev'){
  require_once 'config/common_local.php';
}else{
  require_once 'config/common_server.php';
}

require_once 'twitteroauth/autoload.php';

use Abraham\TwitterOAuth\TwitterOAuth;

$access_token = $_SESSION['access_token'];

$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $access_token['oauth_token'], $access_token['oauth_token_secret']);

$user = $connection->get("account/verify_credentials");
load_userInfo($user);

function load_userInfo($user){
  $name = $user->name;
  $screen_name = $user->screen_name;

  echo '<p>' . $name . '</p>';
  echo '<p>' . $screen_name . '</p>';
}