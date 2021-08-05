let buttonDisplay = document.getElementById("buttonDisplay");
let awards = document.getElementById("awards");
    let nbClick = 0;
    console.log(nbClick);
    buttonDisplay.addEventListener("click",function (){
        if (nbClick === 0) {
            awards.style.display = "block";
            nbClick++;
            console.log(nbClick);
        }
        else {
            awards.style.display = "none";
            nbClick = 0;
            console.log(nbClick);
        }
    });
