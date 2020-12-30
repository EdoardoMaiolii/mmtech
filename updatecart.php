<?php
require_once("bootstrap.php");
$templateParams["cartproducts"] = $dbh->getCartProducts($_SESSION['email']);
if(isset($_GET['order'])){
    $dbh->addOrder($_SESSION['email']);
}
if (isset($_GET['action']) && isset($_GET['idprodotto'])) {
    $dbh->removeProductFromCart($_SESSION['email'], (int)$_GET['idprodotto']);
}
foreach($templateParams["cartproducts"] as $product){
    if(isset($_GET['quantita-'.$product['idprodotto']]) && $_GET['quantita-'.$product['idprodotto']] != $product['quantita'] ){
        $dbh->updateQuantity($_GET['quantita-'.$product['idprodotto']], $_SESSION['email'], $product['idprodotto']);
    }
}
$templateParams["title"] = "Carrello -" . $_SESSION['nome'];
$templateParams["content"] = "cart-section.php";
$templateParams["header"] = "headerLogged.php";
$templateParams["cartproducts"] = $dbh->getCartProducts($_SESSION['email']);
require 'template/base.php';
?>