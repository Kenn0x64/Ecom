<?php
//Session Related Code
require_once("../session.php");
require_once("../admin.php");

try {
//create a connection
$cn=new mysqli("localhost","root","","ecom");

//getting the variable
$id=_No_SQL_Injection($cn,$_GET['id']);

//Defining the query
$SQL_Remove_Query="update users set active=0 where id=$id ";

//Querying the database
$r=$cn->query($SQL_Remove_Query);

//Close Connection
mysqli_close($cn);

//Redirecting 
header("Location:/ecom/users/viewUsers.php");

}catch (Throwable $th) {
    l1:echo "
    <h1>ERROR</h1>
     <h1>오류</h1>
     <h1>エラー</h1>
     <h1>错误</h1>
     ";
  }
  

?>