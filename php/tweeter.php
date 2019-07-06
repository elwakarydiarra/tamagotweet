<?php

function tweet($tweet)
{
    require_once("php/TwitterAPIExchange.php");
    $settings = [
        'oauth_access_token' => "1145641431433961472-sOcxN8ZiWGfG2bAvIpmr7yf0kJOLjS",
        'oauth_access_token_secret' => "zxPAWefsxUFxJmrS3vwtj2C6hAAWdB9vFy9kUM5A2fZY8",
        'consumer_key' => "HRDNlYLaVOSBc5y1BEQU7n0gY",
        'consumer_secret' => "APXkrk69tt3NVxtWGXHwOYawhYT9SVm7d5xJq3Ht3NfSwfX8t6"
    ];

    $url = "https://api.twitter.com/1.1/statuses/update.json";
    $requestMethod = "POST";
    $postfields = ["status" => "$tweet"];
    $twitter = new TwitterAPIExchange($settings);
    $response = json_encode(
        $twitter->buildOauth($url, $requestMethod)
            ->setPostfields($postfields)
            ->performRequest(), true);

}

?>