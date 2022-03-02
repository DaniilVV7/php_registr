<?php
$con=mysqli_connect("localhost", "root", "") or die("no connection");
mysqli_select_db($con, "users") or die("no db");

$mysqli = new mysqli("localhost", "root", "", "users");

if ($mysqli -> connect_error) {
    printf("Соединение не удалось: %s\n", $mysqli -> connect_error);
    exit();
};


