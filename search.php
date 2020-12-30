<?php
require_once("bootstrap.php");

if(isset($_GET['searchbar'])){
    $templateParams["content"] = "search-section.php";
    $templateParams["searchproducts"] = $dbh->searchProducts($_GET['searchbar']);
}
else{
    $templateParams["content"] = "home.php";
    $templateParams["mostviewed"] = $dbh->orderedProducts();
}
if(isset($_GET["categoria"])){
    $templateParams["content"] = "search-section.php";
    $templateParams["searchproducts"] = $dbh->getProductsByCategory($_GET['categoria']);
}
if (isUserLoggedIn()) {
    if ($dbh->isSeller($_SESSION['email']))
    $templateParams["header"] = "headerSeller.php";
else
    $templateParams["header"] = "headerLogged.php";
}
else {
    $templateParams["header"] = "headerUnlogged.php";
}
require 'template/base.php';
?>