<?php
session_start();
require_once 'db.php';

$id = $_REQUEST['id'];

$s = "DELETE FROM `dela` WHERE `dela`.`id_delo` = ".$id;


mysqli_query($con, $s);

header('Location: /php_registr/index.php');
?>
