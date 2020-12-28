<?php
require_once("bootstrap.php");

if (isUserLoggedIn()) {
    $templateParams["header"] = "headerLogged.php";
} else {
    $templateParams["header"] = "headerUnlogged.php";
}
$templateParams["title"] = "Prodotto";
$templateParams["content"] = "product-section.php";
if($dbh->checkProduct($_GET["productid"])){
    $templateParams["product"] = $dbh->getProductById($_GET["productid"])[0];
    $dbh->visualizeProduct($_SESSION['email'],$_GET["productid"]);
}
require("template/base.php");