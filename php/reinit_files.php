<?php
function reinit($comptweet,$newtaille)
{
    file_put_contents("php/comptweet.txt", $comptweet);
    file_put_contents("php/newtaille.txt", $newtaille);
}
?>