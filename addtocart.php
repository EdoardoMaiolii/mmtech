<?php
require_once 'bootstrap.php';
$dbh->addItemToCart($_SESSION['email'],(int)$_GET['idprodotto'],1);
$templateParams["title"] = "Home";
$templateParams["content"] = "home.php";
$templateParams["header"] = "headerLogged.php";
$templateParams["mostviewed"] = $dbh->orderedProducts();
require 'template/base.php';
?>