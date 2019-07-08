var myImg = document.getElementById("tweetGo");
var tweet = document.getElementById("go");






function zoomin(){

    var currHeight = myImg.clientHeight;
    var currWidth = myImg.clientWidth;
    var debHeight = 270;
    var debWidth = 270;
		if(currHeight <= 600){
            myImg.style.height = (currHeight + 15) + "px";
            myImg.style.width = (currWidth + 15) + "px";

		} else{

             reinit()
		}
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
        myImg.style.width= "100px";
        myImg.style.height= "100px" ;
}

// modal
var modal = document.getElementById("myModal");
var compteur = 0;

// Get the button that opens the modal
var btn = document.getElementById("modalBtn");
var affiche = document.getElementById("affichage");
// Get the <span> element that closes the modal
var span = document.getElementsByClassName("modalclose")[0];




 // bouton qui permet d'ouvrir le modal aprés n tweets
btn.onclick = function() {
  compteur++;

  if (compteur ==5){
  modal.style.display = "block";
  compteur=0;

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
