function openNav() {
    document.getElementById("mySidebar").style.marginLeft = "0";
    document.getElementById("show").style.display = "none";
    document.getElementById("hide").style.display = "block";
}

function closeNav() {
    document.getElementById("mySidebar").style.marginLeft = "-198px";
    document.getElementById("hide").style.display = "none";
    document.getElementById("show").style.display = "block";
}


let ParentMenus = document.querySelectorAll(".sidemenu>ul>li");
ParentMenus.forEach(function(value, key) {
    // ul>li>a
    if (value.classList.contains('dropdown') && value.classList.contains('active')) {
        value.classList.add("dropdown-open");
        value.children[1].style.height = value.children[1].scrollHeight + "px";
    }
    value.children[0].onclick = (event) => {
        ParentMenus.forEach(function(value2, key2) {
            if (value2.classList.contains('dropdown') && key2 != key) {
                value2.classList.remove("dropdown-open");
                value2.children[1].style.height = "0px";
            }
        });
        if (value.classList.contains('dropdown')) {
            if (value.classList.contains('dropdown-open')) {
                value.classList.remove("dropdown-open");
                value.children[1].style.height = "0px";
            } else {
                value.classList.add("dropdown-open");
                value.children[1].style.height = value.children[1].scrollHeight + "px";
            }
        } else {}
    }
});