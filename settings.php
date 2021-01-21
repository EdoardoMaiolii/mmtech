<?php
require_once("bootstrap.php");
if (isUserLoggedIn()) {
    if (isset($_GET["settings-section"])) {
        $templateParams["settings-section"] = $_GET["settings-section"];
    } else {
        $templateParams["settings-section"] = "1"; // Default value
    }
    if ($templateParams["settings-section"] == "2") {
        $templateParams["orders"] = $dbh->getAllOrders();
    }
    if ($templateParams["settings-section"] == "update") {
        $templateParams["settings-section"] = "2";
        $dbh->updateOrderState($_GET['idordine']);
        $templateParams["orders"] = $dbh->getAllOrders();
    }
    if (isset($_GET['view-ordine'])) {
        $templateParams["settings-section"] = "2";
        $templateParams['order-products'] = $dbh->getProductsByOrder($_GET['view-ordine']);
    }
    if (isset($_POST['nomeProdotto'])) {
        list($result, $msg) = uploadImage(UPLOAD_DIR, $_FILES["imgProdotto"]);
            $dbh->insertProduct($_POST['categoria'],
            $_POST['nomeProdotto'],
            (double)$_POST['costo'],
            (double)$_POST['costoSpedizione'],
            $msg,
            $_POST['descrizione'],
            (int)$_POST['quantitaDisponibile']);
    }
    $templateParams["title"] = "Impostazioni -" . $_SESSION['nome'];
    $templateParams["content"] = "settings.php";
    $templateParams["header"] = "headerSeller.php";
    require("template/base.php");
} else {
    require('index.php');
}
?>
