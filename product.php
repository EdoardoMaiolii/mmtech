<?php
require_once("bootstrap.php");

if (isUserLoggedIn()) {
    $templateParams["header"] = "headerLogged.php";
    if($dbh->checkProduct($_GET["productid"])){
        $templateParams["product"] = $dbh->getProductById($_GET["productid"])[0];
        $dbh->visualizeProduct($_SESSION['email'],$_GET["productid"]);
    }
} else {
    $templateParams["header"] = "headerUnlogged.php";
    if($dbh->checkProduct($_GET["productid"])){
        $templateParams["product"] = $dbh->getProductById($_GET["productid"])[0];
    }
}
$templateParams["title"] = "Prodotto";
$templateParams["content"] = "product-section.php";

require("template/base.php");