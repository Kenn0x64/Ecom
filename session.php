<?php

require_once("noInject.php");
    
         session_start();

        if (!isset($_SESSION['id'])) {
            header("Location:../index.php");
        }
?>
