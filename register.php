<?php
require_once 'bootstrap.php';

if (isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["nome"])) {
    $result = $dbh->register(
        $_POST["email"],
        $_POST["nome"],
        $_POST["password"],
        ($_POST["numerocarta"] != "") ? $_POST["numerocarta"] : NULL,
        ($_POST["datascadenza"] != "") ? $_POST["datascadenza"] : NULL,
        ($_POST["cvvcarta"] != "") ? $_POST["cvvcarta"] : NULL
    );
    if ($result) {
        //Register riuscito, proseguo con il login
        $login_result = $dbh->checkLogin($_POST["email"], $_POST["password"]);
        if ($login_result) {
            //Login riuscito
            $card = $dbh->getCard($_POST["email"]);
            registerLoggedUser($dbh->getUserInfo($_POST['email']));
        } else {
            //Login fallito
            $templateParams["errorelogin"] = "Errore! Controllare email o password!";
        }
    } else {
        //Register fallito
        $templateParams["erroreregster"] = "Errore! Email gi&agrave; in uso!";
    }
}

if (isUserLoggedIn()) {
    unset($templateParams["errorelogin"]);
    unset($templateParams["erroreregster"]);
    require_once('index.php');
} else {
    $templateParams["header"] = "headerUnlogged.php";
    $templateParams["title"] = "Register";
    $templateParams["content"] = "register-form.php";
    require 'template/base.php';
}

