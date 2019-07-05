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
            <input type="submit" id="modalBtn" value="duffer" >
        </form>

    </div>
    <div class="image">
        <img  src="img/homer.gif" id="tweetGo">

    </div>


    <!-- The Modal -->
    <div id="myModal" class="modal">

        <!-- Modal content -->
        <div class="modal-content">
            <div class="modal-header">
                <span class="modalclose">&times;</span>

            </div>
            <div class="modal-body">
                <p>trop de tweet, deconnecte toi !!!!</p>

            </div>
            <div class="modal-footer">

            </div>
        </div>
    </div>
    <?php

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
$newnbtweet=file_get_contents("php/comptweet.txt");

    if ($newnbtweet == 5){
        file_put_contents("php/comptweet.txt",1);
        file_put_contents("php/newtaille.txt",270);
    }
    else{

        file_put_contents("php/comptweet.txt",@file_get_contents("php/comptweet.txt")+1);
        $nbtweet = fopen('php/comptweet.txt', 'r+');
        $newnbtweet= fgets($nbtweet); // lis les lignes du fichier()
        fclose($nbtweet);
        file_put_contents("php/newtaille.txt",@file_get_contents("php/newtaille.txt")+40);
        $newtailleLecture = fopen('php/newtaille.txt', 'r+');
        $newtaille = fgets($newtailleLecture); // lis les lignes du fichier()
        fclose($newtailleLecture);
    }
    ?>

    <script>
        var nbtweet = <?php echo json_encode($newnbtweet); ?>;
        console.log (nbtweet);
        var myImg = document.getElementById("tweetGo");
        var newtaille = <?php echo json_encode($newtaille); ?>;

        myImg.style.width= newtaille + "px";
        myImg.style.height= newtaille + "px" ;
        if(nbtweet==6){
            reinit();
        }

        function reinit(){

            var currHeight = myImg.clientHeight;
            var currWidth = myImg.clientWidth;
            var debHeight = 270;
            var debWidth = 270;
            myImg.style.height= (debHeight) + "px"
            myImg.style.width= (debWidth) + "px"
            myImg.style.display="flex";
            myImg.style.justifyContent="center";
            myImg.style.width= "240px";
            myImg.style.height= "136px" ;


        }

        // Get the modal
        var modal = document.getElementById("myModal");

        // Get the button that opens the modal
        var btn = document.getElementById("modalBtn");
        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("modalclose")[0];



        // bouton qui permet d'ouvrir le modal aprés n tweets
        btn.onclick = function() {

            if (nbtweet == 5){
                modal.style.display = "block";
            }
        }

        // bouton qui permet de fermer le modal
        span.onclick = function() {
            modal.style.display = "none";
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>
</body>
</html>
