<?php
require_once("bootstrap.php");

if (isUserLoggedIn()) {
    $result = $dbh->modifyUser($_SESSION['email'],$_POST['profile-email'],$_POST['profile-nome'],$_POST['profile-password'],$_POST['profile-numerocarta'],$_POST['profile-scadenzacarta'],$_POST['profile-cvv']);
    include("profile.php/profile-section=1");
} else {
    $templateParams["title"] = "Home";
    $templateParams["content"] = "home.php";
    $templateParams["header"] = "headerUnlogged.php";
    $templateParams["mostviewed"] = $dbh->orderedProducts();
}
require("template/base.php");
