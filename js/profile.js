
function switchModify(){
    if (document.getElementById("profile-email").disabled==true) {
        document.getElementById("profile-email").disabled=false;
        document.getElementById('profile-nome').disabled=false;
        document.getElementById('profile-password').disabled=false;
        document.getElementById('profile-numerocarta').disabled=false;
        document.getElementById('profile-scadenzacarta').disabled=false;
        document.getElementById('profile-cvv').disabled=false;
        document.getElementById('profile-modifyProfile').disabled=false;
    } else {
        document.getElementById("profile-email").disabled=true;
        document.getElementById('profile-nome').disabled=true;
        document.getElementById('profile-password').disabled=true;
        document.getElementById('profile-numerocarta').disabled=true;
        document.getElementById('profile-scadenzacarta').disabled=true;
        document.getElementById('profile-cvv').disabled=true;
        document.getElementById('profile-modifyProfile').disabled=true;
    }
}