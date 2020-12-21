<?php
require_once 'bootstrap.php';


if (isset($_POST["email"]) && isset($_POST["password"])) {
    $login_result = $dbh->checkLogin($_POST["email"], $_POST["password"]);
    if (count($login_result) == 0) {
        //Login fallito
        $templateParams["errorelogin"] = "Errore! Controllare email o password!";
    } else {
        //Login riuscito
        $card = $dbh->getCard($_POST["email"]);
        registerLoggedUser(array_merge($login_result[0], $card[0]));
    }
}

if (isUserLoggedIn()) {
    $templateParams["title"] = "Home - " . $_SESSION['nome'];
    $templateParams["content"] = "home.php";
    $templateParams["header"] = "headerLogged.php";
    unset($templateParams["errorelogin"]);
    unset($templateParams["erroreregster"]);
} else {
    $templateParams["title"] = "Login";
    $templateParams["content"] = "login-form.php";
    $templateParams["header"] = "headerUnlogged.php";
}

require 'template/base.php';
