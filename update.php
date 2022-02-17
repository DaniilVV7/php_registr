<?php
require("header.html");
require ("menu.html");

if(isset($_REQUEST['sub']))
{
    $host = "localhost";
    $user = "root";
    $pass = "";
    $db = "users";

    $con = mysqli_connect($host, $user, $pass) or die ("no connection");
    mysqli_select_db($con, $db) or die("no db");


    if(isset($_REQUEST['delo']) && $_REQUEST['delo'] != "") {
        $j = $_REQUEST['delo'];
        $s = "UPDATE `dela` SET `delo` = '$j' WHERE `dela`.`id_delo` =" . $_REQUEST['id_delo'];
        mysqli_query($con, $s);
    }
    header('Location: index.php');
}

?>
<main>
    <div    tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content rounded-5 shadow" >
                <div class="modal-header p-1 pb-4 border-bottom-0"></div>
                <div class="modal-body p-5 pt-0">
                    <form class action="update.php" method="POST" enctype="multipart/form-data">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control rounded-4" placeholder="name@example.com" name="id_delo" readonly value="<?php print($_REQUEST['id_delo']); ?>">
                            <label for="floatingInput">ID: <?php print($_REQUEST['id_delo']); ?></label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control rounded-4" placeholder="name@example.com" name="delo">
                            <label for="floatingInput">Дело: <?php print($_REQUEST['delo']); ?></label>
                        </div>

                        <div class="butts">
                            <input type="submit" class="w-100 mb-2 btn btn-lg rounded-4 btn-primary" name="sub">
                            <a class="link-dark" style="text-decoration-line: none" href="index.php">Вернуться</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
<?php
require("footer.html");
?>
