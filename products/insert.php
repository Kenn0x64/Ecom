<link href="../bootstrap-5.1.3/css/bootstrap.css" rel="stylesheet" >

<?php

try {

    //Session Related Code
    require_once("../session.php");
    
    //Checking For Sumbtion
    if (isset($_POST['x'])) {

        if ( $_POST['name'] AND $_POST['price'] AND $_POST['weight'] !=false){
            
            //Create a connection
            $cn= new mysqli('localhost','root','','ecom');

            $N=_No_SQL_Injection($cn,$_POST['name']);
            $P=_No_SQL_Injection($cn,$_POST['price']);
            $W=_No_SQL_Injection($cn,$_POST['weight']);

                
            //Define the query
            $SQL="
            INSERT INTO `products`( `name`, `price`, `weight`) 
            VALUES ('$N',$P,$W)";

           
           
            // //Query The Database
            $cn->query($SQL)?
            //If true do this
            print("Inserted"):
            //If Not do this
            print("Not Inserted");

            //Redirecting and Refreshing 
            header("Location:view.php");
            
            //Close Connection
            mysqli_close($cn);

        }else
        {
            echo"No Data To Insert You Can Go Back To <a href='view.php'>View</a>";
            //header("Location:view.php");
        }
}



echo 
"
<div style='color:white; color:black ;background-color:rgb(244, 246, 247) ;'>
    <div class='card-header'>
    <h2>New Product</h2> 
    </div>
<div class='card-body'>
  
<form class='  needs-validation' method='post' novalidate>

<div class= 'col-md-4 mb-2'>
<label for='productName' class='form-label'>ProductName </label>
<input id='productName' class='form-control' type='text' name='name' required><br>
<div class=' valid-feedback'>Looks Good!</div>
</div>

<div class='col-md-4 mb-2'>
<label for='productName' class='form-label'>ProductPrice</label>
<input id='productName' class='form-control' type='number' name='price' required ><br>
<div class=' valid-feedback'>Looks Good!</div>
</div>


<div class= ' col-md-4 mb-2'>
<label for='productWeight' class='form-label'>ProductWeight</label>
<input type='number' id='productName' class='form-control' name='weight' required ><br>
<div class=' valid-feedback'>Looks Good!</div>
</div>



<input type='button' class='btn btn-danger' value='Cancel' onclick='history.back()'>
<button type='submit' name='x' class='btn btn-success'>Add New Product</button>

</form>
</div>
</div>

";
} catch (Throwable $th) {
  l1:echo "
  <h1>ERROR</h1>
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

<script src="../bootstrap-5.1.3/js/bootstrap.js"></script>

