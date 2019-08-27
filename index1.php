<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Gochi+Hand&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/NEWstyle.css">
    <title>TamagoTweet</title>
</head>
<body>
    <div class="header">
        <h1 class="header-title">Tamagotweet</h1>


        <div class="head-form">
          <form class="tweet" method="post" action="index1.php" >
            <textarea  name="tweet" rows="5" cols="33"></textarea>
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
    <?php
    require_once("php/all.php");
    ?>
    <script>
        var nbtweet = <?php echo json_encode($newnbtweet); ?>;// je recup ma variable php $newnbtweet et je le mets dans ma var JS nbtweet
        var newtaille = <?php echo json_encode($newtaille); ?>; // pareil que nbtweet
    </script>
    <script src="js/zoom_modal.js">

    </script>
</body>
</html>
