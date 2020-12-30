<?php
require_once("bootstrap.php");
if (isUserLoggedIn()) {
    $templateParams["title"] = "Carrello -" . $_SESSION['nome'];
    $templateParams["content"] = "cart-section.php";
    $templateParams["header"] = "headerLogged.php";
    $templateParams["cartproducts"] = $dbh->getCartProducts($_SESSION['email']);
    require("template/base.php");
} else {
    require('index.php');
}
?>