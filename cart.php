<?php
require_once("bootstrap.php");

if (isUserLoggedIn()) {
    echo 'cart';
    $templateParams["title"] = "Carrello -" . $_SESSION['nome'];
    $templateParams["content"] = "cart-section.php";
    $templateParams["header"] = "headerLogged.php";
    $templateParams["cartproducts"] = $dbh->getCartProducts($_SESSION['email']);
    unset($templateParams["errorelogin"]);
    unset($templateParams["erroreregster"]);
} else {
    $templateParams["title"] = "Home";
    $templateParams["content"] = "home.php";
    $templateParams["header"] = "headerUnlogged.php";
    $templateParams["mostviewed"] = $dbh->orderedProducts();
}
require("template/base.php");