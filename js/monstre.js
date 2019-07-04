
var myImg = document.getElementById("tweetGo");
var tweet = document.getElementById("go");




function verif(){
    if(tweet){
      zoomin();
    }else{
      alert('erreur');
    }
}

function zoomin(){

    var currHeight = myImg.clientHeight;
    var currWidth = myImg.clientWidth;
    var debHeight = 270;
    var debWidth = 270;
		if(currHeight >= 600){


		} else{
            myImg.style.height = (currHeight + 15) + "px";
            myImg.style.width = (currWidth + 15) + "px";
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
