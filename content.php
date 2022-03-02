<?php
require_once 'db.php';
?>
<div class="container">
    <a class="link-dark d-flex flex-wrap justify-content-center" style="text-decoration-line: none" href="insert.php">Добавить</a>
    <div class="p-1 pb-4"></div>
        <table class="table table-bordered">
            <tr>
                <td>Дело</td>
                <td>Удалить</td>
                <td>Обновить</td>
            </tr>
        <?php
        $s="select * from dela";
        $res=mysqli_query($con, $s);
        while ($row = mysqli_fetch_row($res))
        {
            print("<tr>");
            print("<td>".$row[1]."</td>");
            print("<td><a class='link-dark d-flex flex-wrap justify-content-center' style='text-decoration-line: none' href='delete.php?id=".$row[0]."'>delete</a></td>");
            $ss = "id_delo=".$row[0]."&delo=".$row[1];
            print("<td><a class='link-dark d-flex flex-wrap justify-content-center' style='text-decoration-line: none'  href='update.php?".$ss."'>Update</a></td>");
            print("</tr>");
        }

        print("</table>");
        ?>
            <div class="p-1 pb-2"></div>
                <a class="link-dark d-flex flex-wrap justify-content-center" style="text-decoration-line: none" href="?exit">Exit</a>
            <div class="p-1 pb-1"></div>
</div>

