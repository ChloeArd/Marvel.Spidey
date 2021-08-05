let win = 0;
let score = document.getElementById("score");
let cards = document.getElementsByClassName("case");
let cardss = ["case1", "case2", "case3", "case4", "case5", "case6", "case7", "case8", "case9", "case10", "case11", "case12"];
let images = [
    "https://i.pinimg.com/564x/17/8c/28/178c289efad2ff338bb625e93acce07f.jpg", //image spider-man
    "https://i.pinimg.com/564x/17/8c/28/178c289efad2ff338bb625e93acce07f.jpg", //image spider-man
    "https://i.pinimg.com/564x/17/8c/28/178c289efad2ff338bb625e93acce07f.jpg", //image spider-man
    "https://i.pinimg.com/564x/17/8c/28/178c289efad2ff338bb625e93acce07f.jpg", //image spider-man
    "https://i.pinimg.com/564x/54/e9/e8/54e9e8c840e45fa37ac976bd267d1727.jpg", //image miles morales
    "https://i.pinimg.com/564x/54/e9/e8/54e9e8c840e45fa37ac976bd267d1727.jpg", //image miles morales
    "https://i.pinimg.com/564x/54/e9/e8/54e9e8c840e45fa37ac976bd267d1727.jpg", //image miles morales
    "https://i.pinimg.com/564x/54/e9/e8/54e9e8c840e45fa37ac976bd267d1727.jpg", //image miles morales
    "https://i.pinimg.com/564x/e3/a8/7a/e3a87ac7335ea605b28899be6b66f3f5.jpg", //image spider man rouge / noir
    "https://i.pinimg.com/564x/e3/a8/7a/e3a87ac7335ea605b28899be6b66f3f5.jpg", //image spider man rouge / noir
    "https://i.pinimg.com/564x/e3/a8/7a/e3a87ac7335ea605b28899be6b66f3f5.jpg", //image spider man rouge / noir
    "https://i.pinimg.com/564x/e3/a8/7a/e3a87ac7335ea605b28899be6b66f3f5.jpg", //image spider man rouge / noir
    "https://image.tmdb.org/t/p/original/fmjCL1PCAqO5kr8ztOT5UXTouVw.jpg", //image ultimate spider-man
    "https://image.tmdb.org/t/p/original/fmjCL1PCAqO5kr8ztOT5UXTouVw.jpg", //image ultimate spider-man
    "https://image.tmdb.org/t/p/original/fmjCL1PCAqO5kr8ztOT5UXTouVw.jpg", //image ultimate spider-man
    "https://image.tmdb.org/t/p/original/fmjCL1PCAqO5kr8ztOT5UXTouVw.jpg", //image ultimate spider-man
    "https://i.pinimg.com/564x/80/75/54/807554696e5f7893a335e54d922d83dc.jpg", //image the amazing spider-man
    "https://i.pinimg.com/564x/80/75/54/807554696e5f7893a335e54d922d83dc.jpg", //image the amazing spider-man
    "https://i.pinimg.com/564x/80/75/54/807554696e5f7893a335e54d922d83dc.jpg", //image the amazing spider-man
    "https://i.pinimg.com/564x/80/75/54/807554696e5f7893a335e54d922d83dc.jpg", //image the amazing spider-man
    "https://i.pinimg.com/564x/d4/ac/c8/d4acc863d31ab88d4a508976c22162de.jpg", //image spider-man 1
    "https://i.pinimg.com/564x/d4/ac/c8/d4acc863d31ab88d4a508976c22162de.jpg", //image spider-man 1
    "https://i.pinimg.com/564x/d4/ac/c8/d4acc863d31ab88d4a508976c22162de.jpg",  //imagespider-man 1h
    "https://i.pinimg.com/564x/d4/ac/c8/d4acc863d31ab88d4a508976c22162de.jpg"  //image spider-man 1
];
let randomCardss;
let randomImages;
let image = document.getElementsByTagName("img");
let nbClick = 1;

clickCards(0);
clickCards(1);
clickCards(2);
clickCards(3);
clickCards(4);
clickCards(5);
clickCards(6);
clickCards(7);
clickCards(8);
clickCards(9);
clickCards(10);
clickCards(11);

//place the pictures randomly in the 12 cards
//create an image with a url in a cards randomly and delete the id on cardss, for no repeat
for(let i = 0; i < cards.length; i++){
    randomCardss = cardss[Math.floor(Math.random() * cardss.length)];
    randomImages = images[i];
    let createimg = document.createElement("img");
    createimg.src = randomImages;
    createimg.id = "imageMarvel"+[i];
    let indexCardss = cardss.indexOf(randomCardss);
    let indexImages = images.indexOf(randomImages);
    document.getElementById(randomCardss).append(createimg);
    //delete the word on array cardss
    cardss.splice(indexCardss, 1);
    images.splice(indexImages, 1);

    //You can click on all the cards
    cards[i].addEventListener("click", function () {
        //if all the images are in display = "block", then we make the game disappear, we display the score, and the replay button
        if (document.getElementById("imageMarvel0").style.display === "block" && document.getElementById("imageMarvel1").style.display === "block" && document.getElementById("imageMarvel2").style.display === "block" && document.getElementById("imageMarvel3").style.display === "block" && document.getElementById("imageMarvel4").style.display === "block" && document.getElementById("imageMarvel5").style.display === "block" && document.getElementById("imageMarvel6").style.display === "block" && document.getElementById("imageMarvel7").style.display === "block" && document.getElementById("imageMarvel8").style.display === "block" && document.getElementById("imageMarvel9").style.display === "block" && document.getElementById("imageMarvel10").style.display === "block" && document.getElementById("imageMarvel11").style.display === "block"){
            setTimeout(function () {
                document.getElementById("game").style.display = "none";
                document.getElementById("window").style.display = "flex";
                score.innerHTML = 6;
            }, 2000);
        }
        if (nbClick < 2){
            nbClick++;
            clickCards(0);
            clickCards(1);
            clickCards(2);
            clickCards(3);
            clickCards(4);
            clickCards(5);
            clickCards(6);
            clickCards(7);
            clickCards(8);
            clickCards(9);
            clickCards(10);
            clickCards(11);
        }
        else if(nbClick === 2 ) {
            for (let i = 0; i < image.length; i++) {
                // Check if the 2 images are in display = "block" and if so, they disappear definitively, if they are not the same, they disappear but not definitively.
                if (document.getElementById("imageMarvel0").style.display === "block" && document.getElementById("imageMarvel1").style.display === "block") {
                    conditionDubleCase("imageMarvel0", "imageMarvel1");
                }
                if (document.getElementById("imageMarvel2").style.display === "block" && document.getElementById("imageMarvel3").style.display === "block") {
                    conditionDubleCase("imageMarvel2", "imageMarvel3");
                }
                if (document.getElementById("imageMarvel4").style.display === "block" && document.getElementById("imageMarvel5").style.display === "block") {
                    conditionDubleCase("imageMarvel4", "imageMarvel5");
                }
                if (document.getElementById("imageMarvel6").style.display === "block" && document.getElementById("imageMarvel7").style.display === "block") {
                    conditionDubleCase("imageMarvel6", "imageMarvel7");
                }
                if (document.getElementById("imageMarvel8").style.display === "block" && document.getElementById("imageMarvel9").style.display === "block") {
                    conditionDubleCase("imageMarvel8", "imageMarvel9");
                }
                if (document.getElementById("imageMarvel10").style.display === "block" && document.getElementById("imageMarvel11").style.display === "block") {
                    image[i].style.display = "none";
                    conditionDubleCase("imageMarvel10", "imageMarvel11");
                }
                //Otherwise the images will disappear in 1s
                else {
                    setTimeout(function () {
                        image[i].style.display = "none";
                        nbClick = 1;
                    }, 1000);
                }
            }
        }
    });
}

//replay the memory
document.getElementById("replay").addEventListener("click", function (){
    window.location.reload();
})

// when you click on a card, its image appears
function clickCards(index){
    for (let i = index; i < cards.length; i++){
        cards[index].addEventListener("click", function () {
            for (let i = index; i < image.length; i++) {
                image[index].style.display = "block";
            }
        });
    }
}

//if 2 images are identical then they remain displayed, ie in display = "block".
//I put a time interval of 1ms so that my images always remain displayed
function conditionDubleCase(id1, id2) {
    setInterval(function () {
        document.getElementById(id1).style.display = "block";
        document.getElementById(id2).style.display = "block";
    }, 1);
}