var showcase = document.querySelector(".showpart");
var hidecase = document.querySelector(".hidepart");
function show(){
    showcase.classList.add("show");
    hidecase.classList.add('hide');
    document.querySelector(".hides").style.display="none";
    var choice = document.getElementById("choice");
    choice.style.gridTemplateColumns = "repeat(auto-fit,minmax(20rem,1fr))";
    }
function hide(){
    showcase.classList.remove("show")
    hidecase.classList.remove('hide');
    document.querySelector(".hides").style.display="block";
    choice.style.gridTemplateColumns = "repeat(auto-fit,minmax(12rem,1fr))";
    }