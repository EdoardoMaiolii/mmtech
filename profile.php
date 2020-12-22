<?php
require_once("bootstrap.php");

if (isUserLoggedIn()) {
    $templateParams["title"] = "Profilo -". $_SESSION['nome'];
    $templateParams["content"] = "profilo.php";
    $templateParams["header"] = "headerLogged.php";
    unset($templateParams["errorelogin"]);
    unset($templateParams["erroreregster"]);
} else {
    $templateParams["title"] = "Home";
    $templateParams["content"] = "error.html";
    $templateParams["header"] = "headerUnlogged.php";
}
require("template/base.php");
?>