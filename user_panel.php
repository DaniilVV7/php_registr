<?php
    session_start();
    if(isset($_REQUEST['exit']))
    {
        session_destroy();
        header("Location: index.php");
        exit;
    }
    if(!empty($_SESSION["login"]))
    {

        require("header.html");
        require("menu.html");
        require("content.php");
        require("footer.html");
    }
    else
    {
        header("Location: index.php");
    }
?>