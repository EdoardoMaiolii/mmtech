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

require("template/base.php");
?>