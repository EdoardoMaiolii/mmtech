<?php
    $templateParams["title"] = "Carrello -" . $_SESSION['nome'];
    $templateParams["content"] = "cart-section.php";
    $templateParams["header"] = "headerLogged.php";
    $templateParams["cartproducts"] = $dbh->getCartProducts($_SESSION['email']);
    if(isset($_GET['action'])){
        $dbh->removeProductFromCart($_SESSION['email'])
    }
    unset($templateParams["errorelogin"]);
    unset($templateParams["erroreregster"]);
require 'template/base.php';
?>