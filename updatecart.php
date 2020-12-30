<?php
require_once("bootstrap.php");

if(isset($_GET['order'])){
    $dbh->addOrder($_SESSION['email']);
}
if (isset($_GET['action']) && isset($_GET['idprodotto'])) {
    $dbh->removeProductFromCart($_SESSION['email'], (int)$_GET['idprodotto']);
}
if (isset($_GET['quantita'])) {
    $dbh->updateQuantity($_GET['quantita'], $_SESSION['email'], (int)$_GET['idprodotto']);
}
$templateParams["title"] = "Carrello -" . $_SESSION['nome'];
$templateParams["content"] = "cart-section.php";
$templateParams["header"] = "headerLogged.php";
$templateParams["cartproducts"] = $dbh->getCartProducts($_SESSION['email']);
require 'template/base.php';
?>