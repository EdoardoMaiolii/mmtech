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
    require('index.php');
} else {
    $templateParams["title"] = "Login";
    $templateParams["header"] = "headerUnlogged.php";
    $templateParams["content"] = "login-form.php";
    require 'template/base.php';
}
?>
