
<?php

    require_once("../noInject.php");
    //Checking For Sumbtion
    try {

    if (isset($_POST['x'])) {
        
        if ( $_POST['username'] OR $_POST['email'] OR $_POST['admin'] !=false){
            
            //Create a connection
            $cn= new mysqli('localhost','root','','ecom');
                
            //Getting the Varablues
            $UN=_No_SQL_Injection($cn,$_POST['username']);
            $E=_No_SQL_Injection($cn,$_POST['email']);
            $P=_No_SQL_Injection($cn,$_POST['password']);
            $A=_No_SQL_Injection($cn,$_POST['address']);
            
            //Define the query
            $SQL="
            INSERT INTO `users`(`username`, `Email`, `Password`, `Address`)
            VALUES ('$UN','$E','$P','$A')";
            
            //Query The Database
            $cn->query($SQL)?
            //If true do this
            print("Inserted"):
            //If Not do this
            print("Not Inserted");
            
            //Close Connection
            mysqli_close($cn);
            
            //Redirecting and Refreshing 
            header("Location:viewUsers.php");

        }else
        {
            echo"No Data To Insert You Can Go Back To <a href='viewUsers.php'>View</a>";
            header("Location:viewUsers.php");
        }
}

echo 
"
<div style='color:white; color:black ;background-color:rgb(244, 246, 247) ;'>
    <div class='card-header'>
    <h2>Sign Up</h2> 
    </div>
<div class='card-body'>
  
<form class='needs-validation'  method='post' novalidate>

<div class= 'col-md-4 mb-2'>
<label for='username' class='form-label'>Username</label>
<input id='username' class='form-control' type='text' name='username' required>
<div class=' valid-feedback'>Looks Good!</div>
</div>

<div class= 'col-md-4 mb-2'>
<label for='email' class='form-label'>Email</label>
<input id='email' class='form-control' type='email' name='email' required ><br>
<div class=' valid-feedback'>Looks Good!</div>
</div>

<div class= 'col-md-4 mb-2'>
<label for='password' class='form-label'>Password</label>
<input id='password' class='form-control' type='text' name='password' required ><br>
<div class=' valid-feedback'>Looks Good!</div>
</div>

<div class= 'col-md-4 mb-2'>
<label for='address' class='form-label'>Address</label>
<input id='address' class='form-control' type='text' name='address' required ><br>
<div class=' valid-feedback'>Looks Good!</div>
</div>

<a class='btn btn-danger' href='/ecom/products/view.php'>Cancel</a>
<button name='x' type='submit' class='btn btn-success'>Sign Up</button>

</form>
</div>
</div>

";

// <input type='button' class='btn btn-danger' value='Cancel' onclick='history.back()'>

} catch (Throwable $th) {
    l1:echo "
    <h1>ERROR</h1>
     <h1>오류</h1>
     <h1>エラー</h1>
     <h1>错误</h1>
     ";
  }
?>

<link href="../bootstrap-5.1.3/css/bootstrap.css" rel="stylesheet" >
<script src="../bootstrap-5.1.3/js/bootstrap.js"></script>

