<?php
require_once("bootstrap.php");

if (isUserLoggedIn()) {
    echo 'profile';
    $templateParams["title"] = "Profilo -" . $_SESSION['nome'];
    $templateParams["content"] = "profilo.php";
    $templateParams["header"] = "headerLogged.php";
    if (isset($_GET["profile-section"])) {
        $templateParams["profile-section"] = $_GET["profile-section"];
    } else {
        $templateParams["profile-section"] = "1"; // Default value
    }
    unset($templateParams["errorelogin"]);
    unset($templateParams["erroreregster"]);
} else {
    $templateParams["title"] = "Home";
    $templateParams["content"] = "home.php";
    $templateParams["header"] = "headerUnlogged.php";
    $templateParams["mostviewed"] = $dbh->orderedProducts();
}
require("template/base.php");
