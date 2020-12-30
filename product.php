<?php
require_once("bootstrap.php");
if (isUserLoggedIn() && $dbh->checkProduct($_GET["productid"]))
    $dbh->visualizeProduct($_SESSION['email'],$_GET["productid"]);
if($dbh->checkProduct($_GET["productid"]))
    $templateParams["product"] = $dbh->getProductById($_GET["productid"])[0];
$templateParams["title"] = "Prodotto";
$templateParams["content"] = "product-section.php";
if (isUserLoggedIn()) {
    if ($dbh->isSeller($_SESSION['email']))
    $templateParams["header"] = "headerSeller.php";
else
    $templateParams["header"] = "headerLogged.php";
}
else {
    $templateParams["header"] = "headerUnlogged.php";
}
require("template/base.php");
?>