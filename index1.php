<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>TamagoTweet</title>
</head>
<body>
<div class="container">
    <div class="header">
        <h1 class="header-title">Tamagotweet</h1>
    </div>

    <div>
        <form class="tweet" method="post" action="index1.php" >
            <textarea  name="tweet" rows="5" cols="33"></textarea>
            <input type="submit" value="duffer" onclick="zoomin()">
        </form>

    </div>
    <div class="image">
        <img  src="img/homer.gif" id="tweetGo">

    </div>

    <?php
    $nbtweet=0;
    $taille = 270;
    require_once("php/TwitterAPIExchange.php");
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
    $response = json_encode(
        $twitter ->  buildOauth($url, $requestMethod)
            ->setPostfields($postfields)
            ->performRequest(),true);


    file_put_contents("php/newtaille.txt",@file_get_contents("php/newtaille.txt")+40);

    $newtailleLecture = fopen('php/newtaille.txt', 'r+'); /* ouvre le fichier comptuer.txt en mode r+ et range le dans la variable $compteur */
    $newtaille = fgets($newtailleLecture); // lis les lignes du fichier()
    fclose($newtailleLecture);
    ?>

    <script>
        var nbtweet = <?php echo json_encode($nbtweet); ?>;
        console.log (nbtweet);
        var myImg = document.getElementById("tweetGo");
        var newtaille = <?php echo json_encode($newtaille); ?>;

        var currHeight = myImg.clientHeight;
        var currWidth = myImg.clientWidth;
        var debHeight = 270;
        var debWidth = 270;
        myImg.style.height = (debHeight) + "px";
        myImg.style.width = (debWidth) + "px";
        myImg.style.display="flex";
        myImg.style.justifyContent="center";
        myImg.style.width= newtaille + "px";
        myImg.style.height= newtaille + "px" ;
        if(nbtweet>4){
            reinit();
        }


        function reinit(){

            var currHeight = myImg.clientHeight;
            var currWidth = myImg.clientWidth;
            var debHeight = 150;
            var debWidth = 100;
            myImg.style.height= (debHeight) + "px"
            myImg.style.width= (debWidth) + "px"
            myImg.style.display="flex";
            myImg.style.justifyContent="center";
            myImg.style.width= "40px";
            myImg.style.height= "45px" ;


        }
    </script>
</body>
</html>
