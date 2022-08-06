<?php
try{

if (isset($_POST['x']) AND ($_POST['email'] AND $_POST['password']!=NULL)) 
{
    
    //start a session
    session_start();
    
    //Create a connection
    $cn= new mysqli('localhost','root','','ecom');
    
    //SQL INJECTION 
    $E=mysqli_real_escape_string($cn,$_POST['email']);
    $P=mysqli_real_escape_string($cn,$_POST['password']);
    
    //Define the query
    $SQL="select * from users where email='$E' and password='$P' and active=1";
    
    
    //Query The Database
    $R=$cn->query($SQL);
    
    
    if (mysqli_num_rows($R)==0) 
    {
        isset($_SESSION['count'])
        ?:$_SESSION['count']=0;

        echo "Wrong Email or Password or Deleted Account!";           
        $_SESSION['count']++;
        if ($_SESSION['count']>2) {
            $_SESSION['count']=0;
            sleep(10);
            header("refresh:2");
            echo "<br>10 second TimeOut After Every 3 attempts";
        }
    }
    else 
    {
        //Getting The Data
        $row=$R->fetch_assoc();
        //Setting The session Id
        $_SESSION['id']=$row['id'];
        //Setting The session for admin  
        $_SESSION['admin']=$row['admin'];
        
        require_once("./setCookie.php");
        //Redirecting
        header("Location:products/view.php");
    }

    //Close Connection
    mysqli_close($cn);

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

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
    
<link href="./bootstrap-5.1.3/css/bootstrap.css" rel="stylesheet" >
<script src="./bootstrap-5.1.3/js/bootstrap.js"></script>


<div style=' color:black ;background-color:rgb(244, 246, 247) ;'>
    <div class='card-header'>
    <h2>Login</h2> 
    </div>

    <div class='card-body'>

    <form class='needs-validation' method='post' novalidate>
    <div class= 'col-md-4 mb-2'>
        
    <label for='email' class='form-label'>Email </label>
    <input type="email" class='form-control' id="email" name="email" required><br>
    <div class=' valid-feedback'>Looks Good!</div>
    
    <label for='password ' class='form-label'>Password </label>    
    <input type="password" class='form-control' id='password' name="password" required><br>
    <div class=' valid-feedback'>Looks Good!</div>
    
    
    <a class='btn btn-Primary' href="/ecom/users/insertUser.php">Sign Up</a>
    <button type='submit'  name="x" class='btn btn-success'>Login</button>

    
    </div>
    </form>
    </div>
    </div>
    

</body>
</html>