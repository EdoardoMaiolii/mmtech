<?php
require_once 'bootstrap.php';
if($_GET['quantita'] <= $dbh->getProductQuantity((int)$_GET['idprodotto'])){
    $dbh->addItemToCart($_SESSION['email'],(int)$_GET['idprodotto'],$_GET['quantita']);
}
require('index.php');
?>