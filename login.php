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

    <div class="modal modal-signin position-static d-block bg-secondary py-5" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content rounded-5 shadow" >
                <div class="modal-header p-5 pb-4 border-bottom-0">
                    <h2 class="fw-bold mb-0">Ты заходи если чё</h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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
                        <input type="submit" name="send" class="w-100 mb-2 btn btn-lg rounded-4 btn-primary" value="Авторизация">
                        <small class="text-muted">Нажмите чтобы войти</small>
                        <input type="submit" name="reg" class="w-100 mb-2 btn btn-lg rounded-4 btn-primary" value="Регистрация">
                        <small class="text-muted">Нажмите чтобы зарегестрироваться</small>
                    </form>
                </div>
            </div>
        </div>
    </div>

</main>