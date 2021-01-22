<?php
require_once("bootstrap.php");
if (isUserLoggedIn()) {
    $templateParams["ordineEffettuato"] = false;
    $templateParams["cartproducts"] = $dbh->getCartProducts($_SESSION['email']);
    if (isset($_POST['order'])) {
        $dbh->addOrder($_SESSION['email']);
        $templateParams["ordineEffettuato"] = true;
    }
    if (isset($_GET['action']) && isset($_GET['idprodotto'])) {
        $dbh->removeProductFromCart($_SESSION['email'], (int)$_GET['idprodotto']);
        $result = $dbh->getTotalPrice($_SESSION['email'])[0]['totalprice'];
        echo empty($result) ? 0 : $result;
    } elseif (isset($_GET['productid']) && isset($_GET['newquantity'])) {
        $dbh->updateQuantity($_GET['newquantity'], $_SESSION['email'], $_GET['productid']);
        echo $dbh->getTotalPrice($_SESSION['email'])[0]['totalprice'];
    } else {
        $templateParams["title"] = "Carrello -" . $_SESSION['nome'];
        $templateParams["content"] = "cart-section.php";
        $templateParams["header"] = "headerLogged.php";
        $templateParams["cartproducts"] = $dbh->getCartProducts($_SESSION['email']);
        require 'template/base.php';
    }
} else {
    require('index.php');
}
