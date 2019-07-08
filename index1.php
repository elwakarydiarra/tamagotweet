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
    <div class="image"><!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Gochi+Hand&display=swap" rel="stylesheet">
    <title>TamagoTweet</title>
</head>
<body>

    <div class="header">
        <h1 class="header-title">TamagoTweet</h1>
        <div>
          <form class="tweet" method="post" action="index1.php" >
              <textarea  name="tweet" rows="10" cols="50"></textarea>
              <input type="submit" id="modalBtn" value="duffer" >
          </form>
        </div>
    </div>
    <div class="container">
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
    </div>
    <?php
    require("php/all.php");
    ?>

    <script>
        // !!!!!!!!!!! POUR RECUP MES VARIABLES PHP EN JS JE SUIS OBLIGÉ D'UTILISER ECHO ET JSON_ENCODE !!!!!!!
        var nbtweet = <?php echo json_encode($newnbtweet); ?>;// je recup ma variable php $newnbtweet et je le mets dans ma var JS nbtweet
        var myImg = document.getElementById("tweetGo");
        var newtaille = <?php echo json_encode($newtaille); ?>; // pareil que nbtweet

        myImg.style.width= newtaille + "px"; //j'applique ma variable newtaille au style en HTML a myImg
        myImg.style.height= newtaille + "px" ;
        if(nbtweet==8){
            change();
            reinit();
        }

        function reinit(){
            var currHeight = myImg.clientHeight;
            var currWidth = myImg.clientWidth;
            var debHeight = 270;
            var debWidth = 270;
            myImg.src=img/homer.gif;
            myImg.style.height= (debHeight) + "px"
            myImg.style.width= (debWidth) + "px"
            myImg.style.display="flex";
            myImg.style.justifyContent="center";

        }

        function change(){
          myImg.src=img/hvomi.gif;
        }

        // Get the modal
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

        
