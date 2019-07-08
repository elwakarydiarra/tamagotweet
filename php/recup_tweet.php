<?php
function recupTweet($screen_name,$nbOfTweet)
{
$i=5;
    require_once("php/TwitterAPIExchange.php");
    $setting = [
        'oauth_access_token' => "1145641431433961472-sOcxN8ZiWGfG2bAvIpmr7yf0kJOLjS",
        'oauth_access_token_secret' => "zxPAWefsxUFxJmrS3vwtj2C6hAAWdB9vFy9kUM5A2fZY8",
        'consumer_key' => "HRDNlYLaVOSBc5y1BEQU7n0gY",
        'consumer_secret' => "APXkrk69tt3NVxtWGXHwOYawhYT9SVm7d5xJq3Ht3NfSwfX8t6"
    ];


    $url = "https://api.twitter.com/1.1/statuses/user_timeline.json";
    $requestMethod = "GET";
    $getfield = "?screen_name=$screen_name&count=$nbOfTweet";
    $twitter = new TwitterAPIExchange($setting);
    $str = json_decode(
        $twitter->setGetfield($getfield)
            ->buildOauth($url, $requestMethod)
            ->performRequest(),
        true);
    foreach ($str as $key => $value) {
        $compteur = fopen('php/vomi.txt', 'a+'); // on ouvre le fichier
        $tweet = $str[$key]["text"];

        $word = explode(" ", $tweet);//On explose notre string en prenant comme delimiter l'espace et ça nous sort un tableau

        $words = $word[$i] . " "; /* On écrit le contenu que l'on veut (\r\n c'est CRLF) ecrire a la fin */
        fputs($compteur, $words); // fonction permet l'ecriture
        fclose($compteur);// on ferme le fichier
        $i--;
    }

}

?>