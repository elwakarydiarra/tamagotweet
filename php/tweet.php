<?php
$comptweet = 270;
require_once("TwitterAPIExchange.php");
$settings =[
    'oauth_access_token' => "1145641431433961472-sOcxN8ZiWGfG2bAvIpmr7yf0kJOLjS",
    'oauth_access_token_secret' => "zxPAWefsxUFxJmrS3vwtj2C6hAAWdB9vFy9kUM5A2fZY8",
    'consumer_key' => "HRDNlYLaVOSBc5y1BEQU7n0gY",
    'consumer_secret' => "APXkrk69tt3NVxtWGXHwOYawhYT9SVm7d5xJq3Ht3NfSwfX8t6"
];

$url = "https://api.twitter.com/1.1/statuses/update.json";
$requestMethod = "POST";
$postfields = ["status"=> "$_POST[tweet]"];
$twitter = new TwitterAPIExchange($settings);
echo $twitter->buildOauth($url, $requestMethod)
    ->setPostfields($postfields)
    ->performRequest();

$compteur = fopen('comptweet.txt', 'a+'); // on ouvre le fichier
    $comptweet+=150;
    fputs($compteur, $comptweet); // fonction permet l'ecriture
    fclose($compteur);// on ferme le fichier

$comptweetLecture = fopen('comptweet.txt', 'r+'); /* ouvre le fichier comptuer.txt en mode r+ et range le dans la variable $compteur */


$number = fgets($comptweetLecture); // lis les lignes du fichier()
echo $number;
fclose($comptweetLecture); // ferme la variable $compteur qui est défini au début
?>

