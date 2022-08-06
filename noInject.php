<?php 

function _No_SQL_Injection($con,$string)
{
    return mysqli_real_escape_string($con,$string);
}

?>