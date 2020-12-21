<?php
require_once 'bootstrap.php';

if (isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["nome"])) {
        $result = $dbh->register(
            $_POST["email"],
            $_POST["nome"],
            $_POST["password"],
            ($_POST["numerocarta"]!="") ? $_POST["numerocarta"] : NULL,
            ($_POST["datascadenza"]!="") ? $_POST["datascadenza"] : NULL,
            ($_POST["cvvcarta"]!="") ? $_POST["cvvcarta"] : NULL);
        if ($result){
            //Register riuscito, proseguo con il login
            $login_result = $dbh->checkLogin($_POST["email"], $_POST["password"]);
            $card = $dbh->getCard($_POST["email"]);
            registerLoggedUser(array_merge($login_result[0], $card[0]));
        } else {
            //Register fallito
            $templateParams["erroreregster"] = "Errore! Email gia\' in uso!";
    }
}

if (isUserLoggedIn()) {
    $templateParams["title"] = "Home - " . $_SESSION['nome'];
    $templateParams["content"] = "home.php";
    $templateParams["header"] = "headerLogged.php";
    unset($templateParams["errorelogin"]);
    unset($templateParams["erroreregster"]);
    $templateParams["mostviewed"] = $dbh->orderedProducts();
    $templateParams["chrono"] = $dbh->chronologyUser($_SESSION['email']);
} else {
    $templateParams["title"] = "Register";
    $templateParams["content"] = "register-form.php";
    $templateParams["header"] = "headerUnlogged.php";
    $templateParams["mostviewed"] = $dbh->orderedProducts();
}

require 'template/base.php';
?>