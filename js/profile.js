function switchModify(){
    if (document.getElementById('profile-nome').disabled==true) {
        document.getElementById('profile-nome').disabled=false;
        document.getElementById('profile-password').disabled=false;
        document.getElementById('profile-numerocarta').disabled=false;
        document.getElementById('profile-scadenzacarta').disabled=false;
        document.getElementById('profile-cvv').disabled=false;
        document.getElementById('btn').disabled=false;
    } else {
        document.getElementById('profile-nome').disabled=true;
        document.getElementById('profile-password').disabled=true;
        document.getElementById('profile-numerocarta').disabled=true;
        document.getElementById('profile-scadenzacarta').disabled=true;
        document.getElementById('profile-cvv').disabled=true;
        document.getElementById('btn').disabled=true;
    }
}