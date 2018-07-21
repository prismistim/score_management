<?php

$consumer_key = getenv('consumerKey');
$consumer_secret = getenv('consumerSecret');

define( 'CONSUMER_KEY', $consumer_key);
define( 'CONSUMER_SECRET', $consumer_secret);
define( 'OAUTH_CALLBACK', 'https://score-attack.herokuapp.com/callbackOAuth.php');