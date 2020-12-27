<?php
function registerLoggedUser($user){
    $_SESSION["email"] = $user["email"];
    $_SESSION["password"] = $user["password"];
	$_SESSION["nome"] = $user["nome"];
	$_SESSION["numerocarta"] = $user["numerocarta"];
    $_SESSION["scadenzacarta"] = $user["scadenzacarta"];
	$_SESSION["cvvcarta"] = $user["cvvcarta"];
}

function isUserLoggedIn(){
    return !empty($_SESSION["email"]);
}

function logOutUser(){
    session_unset();
    session_destroy();
}

?>