<?php
require_once("bootstrap.php");

if (isUserLoggedIn()) {
    $templateParams["title"] = "Home -". $_SESSION['nome'];
    $templateParams["content"] = "home.php";
    $templateParams["header"] = "headerLogged.php";
    unset($templateParams["errorelogin"]);
    unset($templateParams["erroreregster"]);
} else {
    $templateParams["title"] = "Home";
    $templateParams["content"] = "Home.php";
    $templateParams["header"] = "headerUnlogged.php";
}
require("template/base.php");
?>