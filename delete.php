<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "users";

$con = mysqli_connect($host, $user, $pass) or die ("no connection");
mysqli_select_db($con, $db) or die("no db");

$id = $_REQUEST['id'];

$s = "DELETE FROM `dela` WHERE `dela`.`id_delo` = ".$id;


mysqli_query($con, $s);

header('Location: /php_registr/index.php');
?>
