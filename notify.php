<?php
require_once("bootstrap.php");
if (isUserLoggedIn()) {
    $templateParams["title"] = "Notifiche -" . $_SESSION['nome'];
    $templateParams["content"] = "notify.php";
    if ($dbh->isSeller($_SESSION['email']))
        $templateParams["header"] = "headerSeller.php";
    else
        $templateParams["header"] = "headerLogged.php";
    $templateParams["nofifications"] = $dbh->getNotifications($_SESSION['email']);
    require("template/base.php");
} else {
    require('index.php');
}
?>
