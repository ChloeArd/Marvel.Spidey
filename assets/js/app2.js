let buttonDisplay = document.getElementById("buttonDisplay");
let awards = document.getElementById("awards");
let nbClick = 0;

// Display a awards of actor
if (buttonDisplay) {
    buttonDisplay.addEventListener("click",function (){
        if (nbClick === 0) {
            awards.style.display = "block";
            document.getElementById("menuAccountMobile2").classList = "fas fa-caret-up";
            nbClick++;
        }
        else {
            awards.style.display = "none";
            document.getElementById("menuAccountMobile2").classList = "fas fa-caret-down";
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

if (document.getElementById("menuAccountMobile")) {
    let click = 0;
    document.getElementById("menuAccountMobile").addEventListener("click", function () {
        if (click === 0) {
            document.getElementById("subMenuAccount").style.display = "flex";
            document.getElementById("menuAccountMobile").classList = "fas fa-caret-up colorWhite";
            click++;
        }
        else {
            document.getElementById("subMenuAccount").style.display = "none";
            document.getElementById("menuAccountMobile").classList = "fas fa-caret-down colorWhite";
            click = 0;
        }
    });
}
