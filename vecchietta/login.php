<?php 
$host = 'localhost'; 
$user = 'root';
$pass = '';
$database   = 'progettowebax';
$db = new mysqli($host, $user, $pass, $database);

if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

if (!isset($_POST["username"]) || !isset($_POST["password"])) {
    die("Must enter both A and B parameters!");
}

$username = $_POST["username"];
$password = $_POST["password"];
echo($username);
echo($password);
$query = $db->prepare("SELECT * FROM Iscritto where username=? and password=?");
$query->bind_param("ss",$username,$password);
$query->execute();
$result = $query->get_result();
echo ($result->num_rows);
if ($result->num_rows > 0) {
	header("Location: HomeLogged.html");
}
else {
	die("MARONNE NON E' COSI' LA PASSWARD");
}
$db->close();
?>