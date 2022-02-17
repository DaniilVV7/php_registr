<?php
if(isset($_REQUEST['reg1']))
{
    $host="localhost";
    $user="root";
    $pass="";
    $db="users";

    $con=mysqli_connect($host, $user, $pass) or die("no connection");
    mysqli_select_db($con, $db) or die("no db");

    $s="SELECT * FROM `user` WHERE `login`='".$_REQUEST['login']."'";
    $res=mysqli_query($con, $s);
    $user=mysqli_fetch_assoc($res);
    if(empty($user))
    {
        $login = $_REQUEST['login'];
        $password = $_REQUEST['password'];

        $s = "INSERT INTO `user` (`id`, `login`, `password`) VALUES (NULL, '$login', '$password')";
        mysqli_query($con, $s) or die("Dont send1");
        header('Location: index.php');
    }
    else
    {
        print("Пользователь уже есть");
    }
}
?>

<?php
require("header.html");
require("menu.html");
?>
    <div>
        <form action="#">
            <input type="text" name="login" placeholder="login" required>
            <input type="password" name="password" required>

            <input type="submit" name="reg1" class="sub" value="Регистрация">
        </form>
    </div>
<?php
require("footer.html");
?>