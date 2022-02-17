<main>
<?php
session_start();
if(!empty($_SESSION["login"]))
{
    header("Location: user_panel.php");
}
if(isset($_REQUEST['reg']))
{
    header("Location: registr.php");
}
if(isset($_REQUEST['send']))
{
    $host="localhost";
    $user="root";
    $pass="";
    $db="users";
    
    $con=mysqli_connect($host, $user, $pass) or die("no connection");
    mysqli_select_db($con, $db) or die("no db");

    $s="SELECT * FROM `user` WHERE `login`='".$_REQUEST['login']."' AND `password`='".$_REQUEST['password']."'";
    $res=mysqli_query($con, $s);
    $user=mysqli_fetch_assoc($res);
    if(empty($user))
    {
        header("Location: registr.php");
    }
    else
    {
        $_SESSION["login"] = $user["login"];
        $_SESSION["password"]=$user["password"];
        header("Location: user_panel.php");
    }
}  
?>

<div class="container">
    <form class="px-4 py-3">
        <div class="form-group">
            <input type="text" class="form-control" name="login" placeholder="login">
            <input type="password" class="form-control name="password">
            <input type="submit" class="form-control" name="send" class="btn btn-outline-success btn-sm" value="Авторизация">

            <input type="submit" class="form-control" name="reg" class="btn btn-outline-danger btn-sm" value="Регистрация">
        </div>
    </form>
</div>

</main>