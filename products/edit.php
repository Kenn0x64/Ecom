<link href="../bootstrap-5.1.3/css/bootstrap.css" rel="stylesheet" >

<?php


//Session Related Code
require_once("../session.php");


try {
  $cn=new mysqli("localhost","root","","ecom");
  $id=_No_SQL_Injection($cn,$_GET['id']);

  if ($id<1) 
  goto l1;
  

  //Defining the query
$SQL_Edit_Query="select * from products where id=$id";

//Querying the database and fetch Assoc()
$r=($cn->query($SQL_Edit_Query))->fetch_assoc();

//Gettint variables from fetch_assoc()
$N=$r['name'];
$P=$r['price'];
$W=$r['weight'];
$S=$r['inStock'];


// <div class=' col-md-12 '>
//make a html form
echo 
"

<div style='color:white; color:black ;background-color:rgb(244, 246, 247) ;'>
    <div class='card-header'>
    <h2>Edit Product</h2> 
    </div>
<div class='card-body'>

<form action='update.php' class=' needs-validation' method='post' novalidate>

<input type='hidden' name='id' value='$id'>

<div class= 'col-md-4 mb-2 '>
<label for='productName' class='form-label'>ProductName </label>
<input type='text' id='productName' name='name' class='form-control'  value='$N' required><br>
<div class=' valid-feedback'>Looks Good!</div>
</div>

<div class= 'col-md-4 mb-2 '>
<label for='ProductPrice' class='form-label'>ProductPrice  </label>
<input id='ProductPrice' type='number' name='price' value='$P' class='form-control'  required ><br>
<div class=' valid-feedback'>Looks Good!</div>
</div>

<div class= 'col-md-4 mb-2'>
<label for='ProductWeight' class='form-label'>ProductWeight </label>
<input type='number'  class='form-control'  id='ProductWeight' name='weight' value='$W' required><br>
<div class=' valid-feedback'>Looks Good!</div>
</div>

<div class= 'col-md-4 mb-3'>
<label for='inStock' class='form-label'>inStock</label>
<input type='number' class='form-control'   id='inStock' name='inStock' value='$S' required>
<div class=' valid-feedback'>Looks Good!</div>
</div>

<br>
<a class='btn btn-danger' href='/ecom/products/view.php'>Cancel</a>
<button type='submit' class='btn btn-success'>Update</button>

</form>



</div>
</div>
";

// <form method='post' action='/ecom/products/view.php'>
// <button class='btn btn-danger' type='submit'>Cancel</button>
// </from>
//Close Connection
mysqli_close($cn);


  //code...
} catch (Throwable $th) {
  l1:echo "
  <h1> ERROR</h1>
   <h1>오류</h1>
   <h1>エラー</h1>
   <h1>错误</h1>
   ";
}





?>
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
<script src="../bootstrap-5.1.3/js/bootstrap.js"></script>
