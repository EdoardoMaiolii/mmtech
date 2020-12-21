<?php
require_once 'bootstrap.php';

if (isset($_POST["type"])) {
    if ($_POST["type"] == "Login") {
        $login_result = $dbh->checkLogin($_POST["email"], $_POST["password"]);
        if (count($login_result) == 0) {
            //Login fallito
            $templateParams["errorelogin"] = "Errore! Controllare email o password!";
        } else {
            //Login riuscito
            $card = $dbh->getCard($_POST["email"]);
            registerLoggedUser(array_merge($login_result, $card));
        }
    } else { // $_POST["type"])=="Register"
        $result = $dbh->register(
            $_POST["email"],
            $_POST["nome"],
            $_POST["password"],
            isset($_POST["numerocarta"]) ? $_POST["numerocarta"] : NULL,
            isset($_POST["datascadenza"]) ? $_POST["datascadenza"] : NULL,
            isset($_POST["cvvcarta"]) ? $_POST["cvvcarta"] : NULL
        );
        if ($result){
            //Register riuscito, proseguo con il login
            $login_result = $dbh->checkLogin($_POST["email"], $_POST["password"]);
            $card = $dbh->getCard($_POST["email"]);
            registerLoggedUser(array_merge($login_result, $card));
        } else {
            //Register fallito
            $templateParams["erroreregster"] = "Errore! Email gia\' in uso!";
        }
    }
}

if (isUserLoggedIn()) {
    $templateParams["title"] = "Home - " . $_SESSION['name'];
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
