const closedNav = document.getElementById("barrette"); 
const openedNav = document.getElementById("mySidenav"); 
closedNav.addEventListener("click", openNav); 
openedNav.addEventListener("click", closeNav); 

function openNav() { 
    document.getElementById("mySidenav").style.width = "250px";
} 
function closeNav() { 
    document.getElementById("mySidenav").style.width = "0px";
}