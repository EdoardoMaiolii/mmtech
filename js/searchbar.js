$(document).ready(function(){
    $("#searchbar").keypress(function(event) { 
        if (event.keyCode === 13) { 
            alert("Button clicked");  
        } 
    }); 
});