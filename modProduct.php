<?php
require_once("bootstrap.php");
if ($dbh->isSeller($_SESSION['email'])){
    $oldProduct = $dbh->getProductById($_POST['idprodotto'])[0];
    if ($_FILES["imgProdotto"]['size']>0) {
        list($result, $msg) = uploadImage(UPLOAD_DIR, $_FILES["imgProdotto"]);
    }
    else
        $msg = $oldProduct['nomeimmagine'];
            $dbh->updateProduct($_POST['idprodotto'],
            $_POST['categoria'],
            $_POST['nomeProdotto'],
            (double)$_POST['costo'],
            (double)$_POST['costoSpedizione'],
            $msg,
            $_POST['descrizione'],
            (int)$_POST['quantitaDisponibile']);
    $templateParams["product"] = $dbh->getProductById($_POST["idprodotto"])[0];
    $templateParams["title"] = "Prodotto";
    $templateParams["content"] = "product-section.php";
    $templateParams["header"] = "headerSeller.php";
    require("template/base.php");
}
else {
    require('index.php');
}
