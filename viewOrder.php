<?php
require_once("bootstrap.php");

if (isUserLoggedIn()) {
    $templateParams["title"] = "Profilo -" . $_SESSION['nome'];
    $templateParams["content"] = "profile.php";
    $templateParams["header"] = "headerLogged.php";
    $templateParams["order-products"] = $dbh->getProductsByOrder($_GET['idorder']);
    include("profile.php/profile-section=2");
} else {
    $templateParams["title"] = "Home";
    $templateParams["content"] = "home.php";
    $templateParams["header"] = "headerUnlogged.php";
    $templateParams["mostviewed"] = $dbh->orderedProducts();
}
require("template/base.php");
