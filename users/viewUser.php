<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Profile</title>
    </head>
    
    <body style="background-color:rgba(12, 16, 19, 0.8) ;">
    
    <div style="color:white; background-color:rgba(12, 16, 19, 0.8) ;" class="card text-center">
    <div class="card-header">
    <h2>
        Profile
    </h2> 
    </div>
    <div class="card-body">

    <?php 

require_once("../session.php");

try{
$id=$_SESSION["id"];
$cn=new mysqli("localhost",'root','',"ecom");
$SQL="select * from users where active=1 and id=$id";

if ($cn->query($SQL)) {
    $r=$cn->query($SQL);
    $data=$r->fetch_row();
    $labels=array(
        "ID",
        "UserName",
        "Email",
        "Password",
        "Address",
        "Items In Cart"
        );
    for ($i=0; $i <count($labels) ; $i++) { 
            echo "<h5 class='card-title'>
            $labels[$i] : $data[$i]
            </h5>";
            
        }
        echo "
        <a class='btn btn-danger' href='/ecom/users/clearCart.php?userId=$data[0]'>Clear Cart</a>
        <a class='btn btn-warning' href='/ecom/users/userEdit.php?userId=$data[0]'>Edit</a>
        <a class='btn btn-success' href='/ecom/products/view.php'>Home</a>  ";

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
    
    </div>
</div>

</body>

<link href="../bootstrap-5.1.3/css/bootstrap.css" rel="stylesheet" >
<script src="../bootstrap-5.1.3/js/bootstrap.js"></script>

</html>
