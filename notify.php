<?php
require_once("bootstrap.php");
if (isUserLoggedIn()) {
    $templateParams["title"] = "Notifiche -" . $_SESSION['nome'];
    $templateParams["content"] = "notify.php";
    if (isset($_GET['idnot'])){
        $dbh->deleteNotification($_SESSION['email'],$_GET['idnot']);
    }
    if ($dbh->isSeller($_SESSION['email']))
        $templateParams["header"] = "headerSeller.php";
    else
        $templateParams["header"] = "headerLogged.php";
    $templateParams["nofifications"] = $dbh->getNotifications($_SESSION['email']);
    require("template/base.php");
    foreach($templateParams["nofifications"] as $not) {
        $dbh->visualizeNotification($_SESSION['email'], $not['idnotifica']);
    }
} else {
    require('index.php');
}
?>
