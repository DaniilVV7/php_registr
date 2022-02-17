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
        
        ?>    
        <div class="content">
            <p>Hello World and 
            <?php
                print($_SESSION["login"]);
            ?>
            </p>
            <a class="add" href="?exit">Exit</a>
        </div>
        <?php
        require("footer.html");
        
    }
    else
    {
        header("Location: index.php");
    }
?>