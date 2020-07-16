<?php

// Memuat Data Yang Dibutuhkan
session_start();
require_once('twitteroauth/twitteroauth.php');

// Konfigurasi
define('CONSUMER_KEY', '5vaXiQfjfKbsWJwtFk9H9s3It'); #consumer key app twitter
define('CONSUMER_SECRET', 'MtERFBzabRqPcmOakrQbT3YWCry5mrHn6iPu3GK88aIKT2KloF'); #consumer secret app twitter
define('access_token', '1047986078-QG1TFSl3VsFpSgr0cV5EaFxOCbyn03UuuzzFLz0'); #access token
define('access_token_secret', '2U9KM3064tpwowoMqSGcqrAlkv4GPEhPXT6c1my9yVz65'); #access token secret

// Pengambilan Text
function randomline( $filename )
{
    $lines = file( $filename );
    return $lines[array_rand( $lines )];
}
$tweet = randomline('status.txt');

// Posting Tweet
$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, access_token, access_token_secret);
$eksekusi = $connection->post('statuses/update', array('status' => $tweet));
if($eksekusi->errors) {
echo "Tweet Gagal Dikirim";
}
else {
echo "Tweet Berhasil Dikirim!";
}

?>