<?php
//Session Related Code
require_once("../session.php");


//create a connection
$cn=new mysqli("localhost","root","","ecom");

//getting the variable
$id=_No_SQL_Injection($cn,$_GET['id']);

//Defining the query
$SQL_Remove_Query="update products set inStock=0 where id=$id ";

//Querying the database
$r=$cn->query($SQL_Remove_Query);

//Close Connection
mysqli_close($cn);
//Redirecting 
header("Location:view.php");
?>