<?php
require_once("bootstrap.php");

if (isUserLoggedIn()) {
    if (isset($_POST["logout"])){
        logOutUser();
        $templateParams["title"] = "Home";
        $templateParams["content"] = "Home.php";
        $templateParams["header"] = "headerUnlogged.php";
        $templateParams["mostviewed"] = $dbh->orderedProducts();
        unset($templateParams["chrono"]);
    }
    else {
        $templateParams["title"] = "Home -". $_SESSION['nome'];
        $templateParams["content"] = "home.php";
        $templateParams["header"] = "headerLogged.php";
        unset($templateParams["errorelogin"]);
        unset($templateParams["erroreregster"]);
        $templateParams["mostviewed"] = $dbh->orderedProducts();
        $templateParams["chrono"] = $dbh->chronologyUser($_SESSION['email']);
    }
} else {
    $templateParams["title"] = "Home";
    $templateParams["content"] = "home.php";
    $templateParams["header"] = "headerUnlogged.php";
    $templateParams["mostviewed"] = $dbh->orderedProducts();
    unset($templateParams["chrono"]);
}
require("template/base.php");
?>