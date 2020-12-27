<?php
require_once 'bootstrap.php';
$dbh->addItemToCart($_SESSION['email'],$_GET['idprodotto'],1);
require 'template/base.php';
?>