<?php

//86400 = 1 day
//86400*30=30 days

setcookie("Ecomerce.com",null,time()-(86400*40),"/");
unset($_COOKIE["Ecomerce.com"]);


?>