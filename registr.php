<?php
session_start();
if(!empty($_SESSION["login"]))
{
    header("Location: user_panel.php");
}
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
    <div tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content rounded-5 shadow" >
                <div class="modal-header p-5 pb-4 border-bottom-0">
                    <h2 class="fw-bold mb-0">Ты заходи если чё</h2>
                </div>
                <div class="modal-body p-5 pt-0">
                    <form class action="#">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control rounded-4" name="login" placeholder="name@example.com">
                            <label for="floatingInput">Login</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control rounded-4" name="password" placeholder="name@example.com">
                            <label for="floatingInput">Password</label>
                        </div>

                        <input type="submit" name="reg1" class="w-100 mb-2 btn btn-lg rounded-4 btn-primary" value="Регистрация">
                        <small class="text-muted">Нажмите чтобы зарегестрироваться</small>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php
require("footer.html");
?>