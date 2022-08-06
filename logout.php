<?php
require_once("./delCookie.php");
session_start();

session_unset();
session_destroy();
header("Location:index.php");
?>