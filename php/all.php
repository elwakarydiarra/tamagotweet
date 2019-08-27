<?php

require_once("php/tweeter.php");
tweet("$_POST[tweet]");

$newnbtweet=file_get_contents("php/comptweet.txt");
$variable = 5;

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
