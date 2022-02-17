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
<div class="container">
    <form class="px-4 py-3">
        <div class="form-group">
            <input type="text" class="form-control" name="login" placeholder="login" required>
            <input type="password" class="form-control" name="password" required>

            <input type="submit" class="form-control" name="reg1" class="btn btn-outline-danger btn-sm" value="Регистрация">
        </div>
    </form>
</div>
<?php
require("footer.html");
?>