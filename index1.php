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
require_once("php/tweeter.php");
tweet("$_POST[tweet]");

$newnbtweet=file_get_contents("php/comptweet.txt");


    if ($newnbtweet == 8){
        require_once("php/reinit_files.php");
        reinit(0,230);
    }
    else if ($newnbtweet == 7){
        require_once("php/recup_tweet.php");
        recupTweet("wakary11",5);

        $vomiTXT = fopen('php/vomi.txt', 'r+'); /* ouvre le fichier comptuer.txt en mode r+ et range le dans la variable $compteur */

        while (!feof($vomiTXT)) /* tant que le pointeur n'est pas a la fin du fichier () */
        {
            $vomi = fgets($vomiTXT); // lis les lignes du fichier()
            require_once("php/tweeter.php");
            tweet("$vomi");
        }

        ftruncate($vomiTXT,0); // efface le contenu du fichier apres avoir tweeter le vomi afin de repartir sur un fichier vide pour le prochain vomi
        fclose($vomiTXT);

        require_once("php/reinit_files.php");
        reinit(0,230);
    }
    else{
        file_put_contents("php/comptweet.txt",@file_get_contents("php/comptweet.txt")+1);//je put dans le fichier php/comptweet.txt le contenu de php/comptweet.txt (je lis le fichier avec file_get_contents) incementer de 1
        $nbtweet = fopen('php/comptweet.txt', 'r+');
        $newnbtweet= fgets($nbtweet); // lis les lignes du fichier()
        fclose($nbtweet);

        file_put_contents("php/newtaille.txt",@file_get_contents("php/newtaille.txt")+40);//pareil qu'avec comptweet.txt sauf que la je l'incremente de 40 a chaque fois
        $newtailleLecture = fopen('php/newtaille.txt', 'r+');
        $newtaille = fgets($newtailleLecture); // lis les lignes du fichier()
        fclose($newtailleLecture);
    }
    ?>

    <script>
        // !!!!!!!!!!! POUR RECUP MES VARIABLES PHP EN JS JE SUIS OBLIGÉ D'UTILISER ECHO ET JSON_ENCODE !!!!!!!
        var nbtweet = <?php echo json_encode($newnbtweet); ?>;// je recup ma variable php $newnbtweet et je le mets dans ma var JS nbtweet
        var myImg = document.getElementById("tweetGo");
        var newtaille = <?php echo json_encode($newtaille); ?>; // pareil que nbtweet

        myImg.style.width= newtaille + "px"; //j'applique ma variable newtaille au style en HTML a myImg
        myImg.style.height= newtaille + "px" ;
        if(nbtweet==8){
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
        }

        var modal = document.getElementById("myModal");

        // Get the button that opens the modal
        var btn = document.getElementById("modalBtn");
        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("modalclose")[0];



        // bouton qui permet d'ouvrir le modal aprés n tweets
        btn.onclick = function() {

            if (nbtweet >= 5){
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
