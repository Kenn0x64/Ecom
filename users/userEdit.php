<?php

//Session Related Code
require_once("../session.php");

try {
//create a connection
$cn=new mysqli("localhost","root","","ecom");

//getting the variable
$id=_No_SQL_Injection($cn,$_GET['userId']);


if ($id<=1 || $id==0) 
goto l1;

//Defining the query
$SQL_Edit_Query="select * from users where id=$id";

//Querying the database and fetch Assoc()
$r=($cn->query($SQL_Edit_Query))->fetch_assoc();

//Gettint variables from fetch_assoc()
$UN=$r['username'];
$E=$r['email'];
$P=$r['password'];
$A=$r['address'];




//make a html form
echo 
"


<div style='color:white; color:black ;background-color:rgb(244, 246, 247) ;'>
    <div class='card-header'>
    <h2>Edit Profile</h2> 
    </div>
<div class='card-body'>

<form class='needs-validation' action='userUpdate.php' method='post' novalidate>


<input type='hidden' name='id' value='$id'>

<div class= 'col-md-4 m-0 '>
<label for='username' class='form-label'>Username</label>
<input type='text'  class='form-control'name='username' value='$UN' required><br>
<div class='valid-feedback'>Looks Good!</div>
</div>


<div class= 'col-md-4 mb-2'>
<label for='email' class='form-label'>Email</label>
<input type='email'  class='form-control'name='email' value='$E' required><br>
<div class=' valid-feedback'>Looks Good!</div>
</div>


<div class= 'col-md-4 mb-2'>
<label for='password' class='form-label'>Password</label>
<input type='text' class='form-control' name='password' value='$P' required><br>
<div class=' valid-feedback'>Looks Good!</div>
</div>


<div class= 'col-md-4 mb-2'>
<label for='address' class='form-label'>Address</label>
<input class='form-control'  type='text' name='address' value='$A' required><br>
<div class=' valid-feedback'>Looks Good!</div>
</div>


<a class='btn btn-danger' href='/ecom/products/view.php'>Cancel</a>
<button type='submit' class='btn btn-success'>Update</button>


</form>
</div>
</div>

";

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

<link href="../bootstrap-5.1.3/css/bootstrap.css" rel="stylesheet" >
<script src="../bootstrap-5.1.3/js/bootstrap.js"></script>


<script>
// Example starter JavaScript for disabling form submissions if there are invalid fields
(function () {
    'use strict'
  
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.querySelectorAll('.needs-validation')
  
    // Loop over them and prevent submission
    Array.prototype.slice.call(forms)
      .forEach(function (form) {
        form.addEventListener('submit', function (event) {
          if (!form.checkValidity()) {
            event.preventDefault()
            event.stopPropagation()
          }
          form.classList.add('was-validated')
        }, false)
      })
  })()

</script>
