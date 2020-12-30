<?php
require_once("bootstrap.php");
logOutUser();
$templateParams["mostviewed"] = $dbh->orderedProducts();
unset($templateParams["chrono"]);
unset($templateParams["errorelogin"]);
unset($templateParams["erroreregster"]);
require_once('index.php');
?>