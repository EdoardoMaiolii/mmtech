<?php
function registerLoggedUser($user){
    $_SESSION["Email"] = $user["Email"];
    $_SESSION["Password"] = $user["Password"];
	$_SESSION["Nome"] = $user["Nome"];
	$_SESSION["NumeroCarta"] = $user["NumeroCarta"];
    $_SESSION["DataScadenza"] = $user["DataScadenza"];
	$_SESSION["CvvCarta"] = $user["CvvCarta"];
}

function isUserLoggedIn(){
    return !empty($_SESSION["Email"]);
}

?>