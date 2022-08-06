<?php

    if ($_SESSION['admin']!=1) {
        header("Location:../products/view.php");
    }
    ?>