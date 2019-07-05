<?php
require_once("TwitterAPIExchange.php");
$setting =[
    'oauth_access_token' => "1145641431433961472-sOcxN8ZiWGfG2bAvIpmr7yf0kJOLjS",
    'oauth_access_token_secret' => "zxPAWefsxUFxJmrS3vwtj2C6hAAWdB9vFy9kUM5A2fZY8",
    'consumer_key' => "HRDNlYLaVOSBc5y1BEQU7n0gY",
    'consumer_secret' => "APXkrk69tt3NVxtWGXHwOYawhYT9SVm7d5xJq3Ht3NfSwfX8t6"
];


$url = "https://api.twitter.com/1.1/statuses/user_timeline.json";
$requestMethod = "GET";
$getfield = "?screen_name=wakary11&count=5";
$twitter = new TwitterAPIExchange($setting);
$str = json_decode(
    $twitter->setGetfield($getfield)
        ->buildOauth($url, $requestMethod)
        ->performRequest(),
    true);


foreach ($str as $key => $value) {
    $compteur = fopen('vomi.txt', 'a+'); // on ouvre le fichier
    $tweet = $str[$key]["text"];

    $word = explode(" ", $tweet);//On explose notre string en prenant comme delimiter l'espace et ça nous sort un tableau
    $i=5;
    $words = $word[$i] . " "; /* On écrit le contenu que l'on veut (\r\n c'est CRLF) ecrire a la fin */
    fputs($compteur, $words); // fonction permet l'ecriture
    fclose($compteur);// on ferme le fichier
    $i--;
}
//je lis mon fichier et chaque ligne je le mets dans un tableau puis je tweet le tableau
$vomiTXT = fopen('vomi.txt', 'r+'); /* ouvre le fichier comptuer.txt en mode r+ et range le dans la variable $compteur */


while (!feof($vomiTXT)) /* tant que le pointeur n'est pas a la fin du fichier () */
{
    $vomi = fgets($vomiTXT); // lis les lignes du fichier()
//TWITTER LE VOMI $ligne

    require_once("TwitterAPIExchange.php");
    $settings =[
        'oauth_access_token' => "1145641431433961472-sOcxN8ZiWGfG2bAvIpmr7yf0kJOLjS",
        'oauth_access_token_secret' => "zxPAWefsxUFxJmrS3vwtj2C6hAAWdB9vFy9kUM5A2fZY8",
        'consumer_key' => "HRDNlYLaVOSBc5y1BEQU7n0gY",
        'consumer_secret' => "APXkrk69tt3NVxtWGXHwOYawhYT9SVm7d5xJq3Ht3NfSwfX8t6"
    ];

    $url = "https://api.twitter.com/1.1/statuses/update.json";
    $requestMethod = "POST";
    $postfields = ["status"=> "$vomi"];
    $twitter = new TwitterAPIExchange($settings);
    echo $twitter->buildOauth($url, $requestMethod)
        ->setPostfields($postfields)
        ->performRequest();

}

ftruncate($vomiTXT,0); // efface le contenu du fichier apres avoir tweeter le vomi afin de repartir sur un fichier vide pour le prochain vomi
fclose($vomiTXT); // ferme la variable $compteur qui est défini au début


?>
