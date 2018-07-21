<?php

session_start();

if (getenv('ENV_MODE') == 'dev'){
  require_once 'config/common_local.php';
}else{
  require_once 'config/common_server.php';
}

require_once '../twitteroauth/autoload.php';

use Abraham\TwitterOAuth\TwitterOAuth;

$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET);

$request_token = $connection->oauth('oauth/request_token', array('oauth_callback' => OAUTH_CALLBACK));

$_SESSION['oauth_token'] = $request_token['oauth_token'];
$_SESSION['oauth_token_secret'] = $request_token['oauth_token_secret'];

$url = $connection->url('oauth/authenticate', array('oauth_token' => $request_token['oauth_token']));

header('Location: ' . $url);