
var myImg = document.getElementById("tweetGo");
var tweets = <?php echo json_encode($number); ?>;


function zoomin(){

    var currHeight = myImg.clientHeight;
    var currWidth = myImg.clientWidth;
    var debHeight = 270;
    var debWidth = 270;
            myImg.style.height = tweets + "px";
            myImg.style.width = tweets + "px";
            alert("akert")
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
