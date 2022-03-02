<?php
require("header.html");
require ("menu.html");

if(isset($_REQUEST['sub']))
{
    session_start();
    require_once 'db.php';

    $delo= $_REQUEST['delo'];


    $s = "INSERT INTO `dela` (`id_delo`, `delo`) VALUES (NULL, '$delo')";
    mysqli_query($con, $s) or die("Dont send1");
    header('Location: index.php');
}

?>
<main>
    <div    tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content rounded-5 shadow" >
                <div class="modal-header p-1 pb-4 border-bottom-0"></div>
                <div class="modal-body p-5 pt-0">
                    <form class action="insert.php" method="POST" enctype="multipart/form-data">
                        <div class="form-floating mb-3">
                            <input  type="text" class="form-control rounded-4" placeholder="name@example.com" name="delo" required>
                            <label for="floatingInput">Дело</label>
                        </div>
                        <input type="submit" class="w-100 mb-2 btn btn-lg rounded-4 btn-primary" name="sub" >
                        <a class="link-dark" style="text-decoration-line: none" href="index.php">Вернуться</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
<?php
require("footer.html");
?>
