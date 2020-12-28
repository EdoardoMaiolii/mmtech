<?php
require_once 'bootstrap.php';
$templateParams["title"] = "Home";
$templateParams["content"] = "home.php";
$templateParams["header"] = "headerLogged.php";
$templateParams["mostviewed"] = $dbh->orderedProducts();
$dbh->addItemToCart($_SESSION['email'],(int)$_GET['idprodotto'],$_GET['quantita']);
require 'template/base.php';
?>