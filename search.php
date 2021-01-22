<?php
require_once("bootstrap.php");

if(isset($_GET['searchbar'])){
    $templateParams['search'] = $_GET['searchbar'];
    $templateParams["content"] = "search-section.php";
    if(!empty($_GET['searchbar'])){
        $templateParams["searchproducts"] = $dbh->searchProducts($_GET['searchbar']);
    }
}
else{
    $templateParams["content"] = "home.php";
    $templateParams["mostviewed"] = $dbh->orderedProducts();
}
if(isset($_GET["categoria"])){
    $templateParams["content"] = "search-section.php";
    $templateParams["searchproducts"] = $dbh->getProductsByCategory($_GET['categoria']);
    $templateParams["categoria"] = $_GET["categoria"];
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
$templateParams["title"] = 'Ricerca';
require 'template/base.php';
?>