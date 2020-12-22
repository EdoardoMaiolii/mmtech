<?php
require_once("bootstrap.php");

if (isUserLoggedIn()) {
    $templateParams["title"] = "Home -". $_SESSION['nome'];
    $templateParams["header"] = "headerLogged.php";
    unset($templateParams["errorelogin"]);
    unset($templateParams["erroreregster"]);
} else {
    $templateParams["title"] = "Home";
    $templateParams["header"] = "headerUnlogged.php";
}
$templateParams["content"] = "search-section.php";
$templateParams["searchproducts"] = $dbh->searchProducts($_GET['searchbar']);
require("template/base.php");
?>