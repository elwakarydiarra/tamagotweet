// Get the modal
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
