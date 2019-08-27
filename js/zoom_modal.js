// !!!!!!!!!!! POUR RECUP MES VARIABLES PHP EN JS JE SUIS OBLIGÉ D'UTILISER ECHO ET JSON_ENCODE !!!!!!!
var myImg = document.getElementById("tweetGo");

myImg.style.width= newtaille + "px"; //j'applique ma variable newtaille au style en HTML a myImg
myImg.style.height= newtaille + "px" ;
if(nbtweet==8){
    reinit();
}


function reinit(){
    myImg.src="../img/homer.gif"
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

    if (nbtweet == 7){
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


if(nbtweet==7){
  myImg.src="img/hvomit.gif";
}
