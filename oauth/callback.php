<?php

session_start();

if (getenv('ENV_MODE') == 'dev'){
  require_once 'config/common_local.php';
}else{
  require_once 'config/common_server.php';
}

require_once '../twitteroauth/autoload.php';

use Abraham\TwitterOAuth\TwitterOAuth;

$request_token = [];
$request_token['oauth_token'] = $_SESSION['oauth_token'];
$request_token['oauth_token_secret'] = $_SESSION['oauth_token_secret'];

if (isset($_REQUEST['oauth_token']) && $request_token['oauth_token'] !== $_REQUEST['oauth_token']) {
  die ('ERROR CONNECTION');
}

$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $request_token['oauth_token'], $request_token['oauth_token_secret']);

//
$_SESSION['access_token'] = $connection->oauth("oauth/access_token", array('oauth_verifier' => $_REQUEST['oauth_verifier']));


session_regenerate_id();

header('location: /dashboard.php');