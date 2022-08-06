<?php

//86400 = 1 day
//86400*30=30 days

if (!isset($_COOKIE["Ecomerce.com"])) {
    setcookie("Ecomerce.com",rand(),time()+(86400*30),"/");
}


?>