<?php
session_start();
require_once("utils/functions.php");
require_once("db/database.php");
$dbh = new DatabaseHelper("localhost", "root", "", "MMtech");
define("UPLOAD_DIR", "./upload/");
define("MOCKUP_DIR", "./imgMockup/");
$templateParams["categories"] =$dbh->getCategories();
?>