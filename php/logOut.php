
<?php
    session_start();
    if(session_destroy()){
        header("Location: ../html/Welcome_Page.php");
    }
?>
