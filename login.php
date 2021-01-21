<?php
require_once 'bootstrap.php';
if (isset($_GET['newPass'])) {
    $templateParams["newPass"] = false;
}
if (isset($_POST['newemail'])) {
    $user = $dbh->checkEmail($_POST["newemail"]);
    if (!empty($user)) {
        $number = random_int(0, 9) . random_int(0, 9) . random_int(0, 9) . random_int(0, 9) . random_int(0, 9);
        $_SESSION['NewPassCode'] = $number;
        $templateParams["newPass"] = true;
        $templateParams["tmpEmail"] = $_POST["newemail"];
        $dbh->sendMail($_POST["newemail"], "Modifica password", "E' stata richiesta la modifica della password, Inserisci il seguente codice per confermare: " . $number);
    } else {
        $templateParams["newPass"] = false;
        $templateParams["errorelogin"] = "Errore! Controllare email!";
    }
}
if (isset($_POST['newpassword'])){
    var_dump($_POST['codice']);
    var_dump($_SESSION['NewPassCode']);
    if ($_POST['codice']==$_SESSION['NewPassCode']){
        var_dump($_POST['email']);
        var_dump($_POST['newpassword']);
        var_dump($dbh->changePass($_POST['email'],$_POST['newpassword']));    
        $_POST["password"]=$_POST['newpassword'];
    }else {
        $templateParams["errorelogin"] = "Errore! Codice Errato!";
    }
}
else 
if (isset($_POST["email"]) && isset($_POST["password"])) {
    $login_result = $dbh->checkLogin($_POST["email"], $_POST["password"]);
    if ($login_result) {
        //Login riuscito
        $card = $dbh->getCard($_POST["email"]);
        registerLoggedUser($dbh->getUserInfo($_POST['email']));
    } else {
        //Login fallito
        $templateParams["errorelogin"] = "Errore! Controllare email o password!";
    }
}
if (isUserLoggedIn()) {
    require('index.php');
} else {
    $templateParams["title"] = "Login";
    $templateParams["header"] = "headerUnlogged.php";
    $templateParams["content"] = "login-form.php";
    require 'template/base.php';
}
