<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$database   = 'progettowebax';
$db = new mysqli($host, $user, $pass, $database);

if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

if (!isset($_POST["username"]) || !isset($_POST["email"]) || !isset($_POST["password"])) {
    die("Must enter both A and B parameters!");
}

$username = $_POST["username"];
$password = $_POST["password"];
$email = $_POST["email"];
$query = $db->prepare("SELECT * FROM Iscritto where email=?");
$query->bind_param("s", $email);
$query->execute();
$result = $query->get_result();
if ($result->num_rows > 0) {
    die("ERRORE: EMAIL GIA' UTILZZATA");
} else {
    $query = $db->prepare("INSERT INTO iscritto VALUES (?,?,?)");
    $query->bind_param("sss", $username,$password,$email);
    $query->execute();
    $result = $query->get_result();
    header("Location: HomeLogged.html");
}
$db->close();
