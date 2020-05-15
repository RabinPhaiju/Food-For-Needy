function show(){
var showcase = document.getElementById("showpart");
var hidecase = document.getElementById("hidepart");
showcase.style.display ="block";
hidecase.style.display ="none";
var choice = document.getElementById("choice");
choice.style.gridTemplateColumns = "repeat(auto-fit,minmax(20rem,1fr))";
}
function hide(){
var showcase = document.getElementById("showpart");
var hidecase = document.getElementById("hidepart");
showcase.style.display ="none";
hidecase.style.display ="block";
choice.style.gridTemplateColumns = "repeat(auto-fit,minmax(12rem,1fr))";
}