let buttonDisplay = document.getElementById("buttonDisplay");
let awards = document.getElementById("awards");
let nbClick = 0;

// Display a awards of actor
if (buttonDisplay) {
    buttonDisplay.addEventListener("click",function (){
        if (nbClick === 0) {
            awards.style.display = "block";
            nbClick++;
            console.log(nbClick);
        }
        else {
            awards.style.display = "none";
            nbClick = 0;
        }
    });
}

if (document.getElementById("menuMobile")) {
    let click = 0;
    document.getElementById("logoMenu").addEventListener("click", function () {
        if (click === 0) {
            document.getElementById("subMenu").style.display = "flex";
            click++;
        }
        else {
            document.getElementById("subMenu").style.display = "none";
            click = 0;
        }
    });
}

