<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ViewUser</title>
</head>
<body style="background-color:rgba(12, 16, 19, 0.8) ;">
   
   
<nav class="navbar navbar-expand-lg  bg-dark navbar-dark " style="background-color: #e3f2fd;">
  <div class="container-fluid">
  <a class="navbar-brand" href="/ecom/products/view.php">Ecom</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            

        
      
      <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Products
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="../products/insert.php">Add New Products</a></li>
            <li><a class="dropdown-item"  href="../products/view.php">View Products</a></li>
          </ul>
        </li>
  
 
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Charts
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href='../chartOfPrice.php'>Chart Of Prices</a></li>
            <li><a class="dropdown-item" href='../chartOfWeight.php'>Chart Of Weights</a></li>
          </ul>
        </li>
        
          
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Export
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href='../exportCSV.php'>Export Products In CSV</a></li>
            <li><a class="dropdown-item"  href='../exportXLSX.php'>Export Products In XLSX</a></li>
          </ul>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Users
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="./insertUserAdmin.php">Add New User</a></li>
            <li><a class="dropdown-item" href="./viewUsers.php">View Users</a></li>

          </ul>
        </li>
      

      </ul>
      <div class="d-flex">
          <div class="m-2">
            <a href='../email.php'><button class="btn btn-warning" type="submit">Email</button></a>
            <a href="../users/viewUser.php"><button style="color:white ; background-color: rgba(0, 187, 249, 0.8);" class="btn " type="submit">Profile</button></a>            
            <a href="../users/insertUser.php"><button class="btn btn-success" type="submit">SignUp</button></a>
            <a href="../logout.php"><button class="btn btn-danger" type="submit">Logout</button></a>
            </div>      
    </div>
    </div>
  </div>
</nav>
    






 
<link href="../bootstrap-5.1.3/css/bootstrap.css" rel="stylesheet" >
<script src="../bootstrap-5.1.3/js/bootstrap.js"></script>




</body>
</html>

<?php 


    require_once("../session.php");
    require_once("../admin.php");


    try{
    $cn=new mysqli("localhost",'root','',"ecom");
    $SQL="select * from users where active=1";
    $r=$cn->query($SQL);

    echo
    
    " 
    <div class=' m-3 table-responsive'>
    <table class='table table-dark table-hover'> 
    <tr>
        <th>#</th>
        <th>Username</th>
        <th>Email</th>
        <th>Password</th>
        <th>Address</th>
        <th>ItemsInCart</th>
        <th>Admin</th>
        <th>Options</th>
    </tr>";

    while ($data=$r->fetch_assoc()) 
    {
        //CLEAR CAART FUN
        echo 
        "<tr>
        <td>$data[id]</td>
        <td>$data[username]</td>
        <td>$data[email]</td>
        <td>$data[password]</td>
        <td>$data[address]</td>
        <td>$data[itemsInCart]</td>
        <td>$data[admin]</td>
        
        <td>
            <a href='userEditAdmin.php?id=$data[id]'>
            <button type='button' class='btn btn-block btn-warning'>Edit</button>
            </a>

            <a href='userDelete.php?id=$data[id]'>
            <button type='button' class='btn btn-block btn-danger'>Delete</button>
            </a>

            <a href='clearCart.php?userId=$data[id]'>
            <button type='button' class='btn btn-block btn-primary'>ClearCart</button>
            </a>

        </td>
        
        </tr>";


    }
    echo "
    </div>
    </table>";
    //Close Connection
    mysqli_close($cn);

  }catch (Throwable $th) {
    l1:echo "
    <h1>ERROR</h1>
     <h1>오류</h1>
     <h1>エラー</h1>
     <h1>错误</h1>
     ";
  }
  
  
?>

