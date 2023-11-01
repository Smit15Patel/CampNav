<?php
    session_start();
        ini_set('error_reporting', 0);
        ini_set('display_errors', 0);
    if($_SESSION["id"] == true){
        session_destroy();
        header('location: /../app/index.php');
    }

?>
