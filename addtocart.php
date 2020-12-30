<?php
require_once 'bootstrap.php';
$dbh->addItemToCart($_SESSION['email'],(int)$_GET['idprodotto'],$_GET['quantita']);
require('index.php');
?>