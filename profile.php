<?php
require_once("bootstrap.php");

if (isUserLoggedIn()) {
    // 1) Modifying the profile
    if (isset($_POST["profile-nome"])){
        $result = $dbh->modifyUser($_SESSION['email'],
                                   $_POST['profile-nome'],
                                   $_POST['profile-password'],
                                   $_POST['profile-numerocarta'],
                                   $_POST['profile-scadenzacarta'],
                                   $_POST['profile-cvv']);
        registerLoggedUser(array(
        "email" =>$_SESSION['email'],
        "nome" =>$_POST['profile-nome'],
        "password" =>$_POST['profile-password'],
        "numerocarta" =>$_POST['profile-numerocarta'],
        "scadenzacarta" => $_POST['profile-scadenzacarta'],
        "cvvcarta" =>$_POST['profile-cvv']));
    }
    // 2) Opening profile
    $templateParams["title"] = "Profilo -" . $_SESSION['nome'];
    $templateParams["content"] = "profile.php";
    $templateParams["header"] = "headerLogged.php";
    if (isset($_GET["profile-section"])) {
        $templateParams["profile-section"] = $_GET["profile-section"];
    } else {
        $templateParams["profile-section"] = "1"; // Default value
    }
    unset($templateParams["errorelogin"]);
    unset($templateParams["erroreregster"]);
    $templateParams["orders"] = $dbh->getOrders($_SESSION['email']);
    $templateParams["products-orders"] = array();
    $i = 0;
    foreach ($templateParams["orders"] as $order) {
        $templateParams["products-orders"][$i] = $dbh->getProductsByOrder($order['idordine']);
        $i++;
    }
} else {
    $templateParams["title"] = "Home";
    $templateParams["content"] = "home.php";
    $templateParams["header"] = "headerUnlogged.php";
    $templateParams["mostviewed"] = $dbh->orderedProducts();
}
require("template/base.php");
