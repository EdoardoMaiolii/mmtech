<?php
require_once("bootstrap.php");
if (isset($_POST['quantita'])) {
    if ($_POST['quantita'] <= $dbh->getProductQuantity((int)$_POST['idprodotto'])) {
        $dbh->addItemToCart($_SESSION['email'], (int)$_POST['idprodotto'], $_POST['quantita']);
    }
}
if (isUserLoggedIn()) {
    $templateParams["title"] = "Home - " . $_SESSION['nome'];
    $templateParams["content"] = "home.php";
    if ($dbh->isSeller($_SESSION['email']))
        $templateParams["header"] = "headerSeller.php";
    else
        $templateParams["header"] = "headerLogged.php";
    $templateParams["chrono"] = $dbh->chronologyUser($_SESSION['email']);
} else {
    $templateParams["title"] = "Home";
    $templateParams["content"] = "home.php";
    $templateParams["header"] = "headerUnlogged.php";

}
$templateParams["mostviewed"] = $dbh->orderedProducts();
$templateParams["bestseller"] = $dbh->bestSeller();
$templateParams["lessavailable"] = $dbh->lessAvailable();
require("template/base.php");
