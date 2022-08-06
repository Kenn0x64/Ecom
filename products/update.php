<?php
    
    //Session Related Code
    require_once("../session.php");
    
    try {

    if ( $_POST['id'] OR $_POST['name'] OR $_POST['price'] OR $_POST['weight'] OR $_POST['inStock']  !=false){
        
        //Create a connection
        $cn= new mysqli('localhost','root','','ecom');
         
        //Getting the Varablues
        $ID=_No_SQL_Injection($cn,$_POST['id']);
        $N=_No_SQL_Injection($cn,$_POST['name']);
        $P=_No_SQL_Injection($cn,$_POST['price']);
        $W=_No_SQL_Injection($cn,$_POST['weight']);
        $S=_No_SQL_Injection($cn,$_POST['inStock']);


        //Define the query
        $SQL="update products set name='$N'
        ,price='$P',weight='$W', inStock='$S'
        where `id`=$ID ";
        
       
       
       try {
           $cn->query($SQL);
           
       } catch (Throwable $e) {
           //echo "ERROR OCURED"."<br>".$e->getMessage();
           goto l1;
        }
        
        //Redirecting and Refreshing 
        header("refresh:1","Location:view.php");

        //Close Connection
        mysqli_close($cn);

}else
    {
        echo"No Data to insert";
        header("Location:view.php");
    }
} catch (Throwable $th) {
    l1:echo "
    <h1>ERROR</h1>
     <h1>오류</h1>
     <h1>エラー</h1>
     <h1>错误</h1>
     ";
  }
?>