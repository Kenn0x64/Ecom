<?php
    
    //Session Related Code
    require_once("../session.php");
 
try {
    
    if ( $_POST['username']  AND $_POST['password'] AND $_POST['email'] !=NULL){
        
        //Create a connection
        $cn= new mysqli('localhost','root','','ecom');
        
        //Getting the Varablues
        
        $ID=_No_SQL_Injection($cn,$_POST['id']);
        $UN=_No_SQL_Injection($cn,$_POST['username']);
        $E=_No_SQL_Injection($cn,$_POST['email']);
        $P=_No_SQL_Injection($cn,$_POST['password']);
        $A=_No_SQL_Injection($cn,$_POST['address']);
        
        //Define the query
        $SQL="update `users` set 
        username='$UN',
        email='$E',
        password='$P',
        address='$A'
        where `id`=$ID ";
        
        //Query The Database
        $cn->query($SQL)?
        //If true do this
        print("Inserted"):
        //If Not do this
        print("Not Inserted");

        //Redirecting and Refreshing 
        header("Location:viewUsers.php");
       
        //Close Connection
        mysqli_close($cn);
        
    }
    else
    { 
        echo"No Data to insert";
        header("Location:viewUsers.php");
    }
}catch (Throwable $th) {
    l1:echo "
    <h1>ERROR</h1>
     <h1>오류</h1>
     <h1>エラー</h1>
     <h1>错误</h1>
     ";
  }
  

?>