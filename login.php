<?php
require_once 'bootstrap.php';

if (isset($_POST["email"]) && isset($_POST["password"])) {
    $login_result = $dbh->checkLogin($_POST["email"], $_POST["password"]);
    if ($login_result) {
        //Login riuscito
        $card = $dbh->getCard($_POST["email"]);
        registerLoggedUser($dbh->getUserInfo($_POST['email']));   
    } else {
        //Login fallito
        $templateParams["errorelogin"] = "Errore! Controllare email o password!";
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
