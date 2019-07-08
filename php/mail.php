<?php
  ini_set("SMTP","smtp.gmail.com");
  $destinataire ="meganzsave@gmail.com,devdominiquepieton@gmail.com";
  $sujet="confirme le tweet";
  $mess="j'ai bien reçu le tweet,bois une duff";

     mail($destinataire,$sujet,$message);
?>
