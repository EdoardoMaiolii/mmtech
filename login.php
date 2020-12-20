<?php
require_once 'bootstrap.php';

if(isset($_POST["username"]) && isset($_POST["password"])){
    $login_result = $dbh->checkLogin($_POST["username"], $_POST["password"]);
    if(count($login_result)==0){
        //Login fallito
        $templateParams["errorelogin"] = "Errore! Controllare username o password!";
    }
    else{
        registerLoggedUser($login_result[0]);
    }
}

if(isUserLoggedIn()){
    $templateParams["title"] = "Home - ".$_SESSION['name'];
    $templateParams["content"] = "home.php";
    $templateParams["header"] = "headerLogged.php";
}
else{
    $templateParams["title"] = "Login";
    $templateParams["content"] = "login-form.php";
    $templateParams["header"] = "headerUnlogged.php";
}

require 'template/base.php';
?>