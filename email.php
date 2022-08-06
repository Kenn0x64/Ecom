

<?php 

require_once("./session.php");

require 'includes/PHPMailer.php';
require 'includes/SMTP.php';
require 'includes/Exception.php';


use PHPMailer\PHPMailer\PHPMailer;

use PHPMailer\PHPMailer\Exception;


try {
    if ( (isset($_POST['submit']) and 
    (
        $_POST['email'] and
        $_POST['password'] and
        $_POST['fromName']) and
        $_POST['targetEmail'] and
        $_POST['subject'] and
        $_POST['message']
        )!=null
    )
    {
    $cn= new mysqli('localhost','root','','ecom');


    $mail = new PHPMailer(true);


    $e=_No_SQL_Injection($cn,$_POST['email']);
    $p=_No_SQL_Injection($cn,$_POST['password']);
    $FN=_No_SQL_Injection($cn,$_POST['fromName']);
    $TE=_No_SQL_Injection($cn,$_POST['targetEmail']);
    $S=_No_SQL_Injection($cn,$_POST['subject']);
    $M=_No_SQL_Injection($cn,$_POST['message']);

    $mail->smtpClose();
    $mail->isSMTP();                                            
    $mail->Host= 'smtp.gmail.com';                    
    $mail->SMTPAuth   = true;                             
    $mail->Username   = $e;                 
    $mail->Password   = $p;                       
    $mail->SMTPSecure = 'ssl';                              
    $mail->Port       = 465;  
    
    $mail->setFrom($e,$FN);
    
    $mail->addAddress($TE);
    
    $mail->isHTML(true);     

    $mail->Subject=$S;
    $mail->Body= $M;
    $mail->send();
    
    
    $mail->smtpClose();

    echo "<script>
    document.location.href='products/view.php'
    </script>";
    // header("Location:products/view.php");    
      
    }
}catch (Throwable $th) {
     echo $th->getMessage();
  }
  
  
    ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email</title>
</head>
<body>

<link href="bootstrap-5.1.3/css/bootstrap.css" rel="stylesheet" >
<script src="/bootstrap-5.1.3/js/bootstrap.js"></script>



<div style=' color:black ;background-color:rgb(244, 246, 247) ;'>
    <div class='card-header'>
    <h2>Send Email</h2>
    </div>


<div class='card-body'>


<form  class='needs-validation' method='post' novalidate>    
    <div class= 'col-md-4 mb-2'>
    
    <label for='email' class='form-label'>Gmail Address</label>
    <input  class='form-control' id='email' type="text" name="email" required> <br>
    <div class=' valid-feedback'>Looks Good!</div>
    
    
    <label for='password' class='form-label'>Password</label>
    <input  class='form-control' id='password' type="password" name="password" srequired> <br>
    <div class=' valid-feedback'>Looks Good!</div>
    

    <label for='fromName' class='form-label'>From Who? Enter A Name</label>
    <input  class='form-control' type="text" id='fromName' name="fromName"required> <br>
    <div class=' valid-feedback'>Looks Good!</div>
    
    <label for='targetEmail' class='form-label'>To Who? Enter A Email</label>
    <input  class='form-control' type="text" id='targetEmail' name="targetEmail"required> 
    <div class=' valid-feedback'>Looks Good!</div>
    
    
    <label for='subject' class='form-label'>Subject</label>
    <input  class='form-control' type="text" id='subject' name="subject"required> <br>
    <div class=' valid-feedback'>Looks Good!</div>
    
    <label for='message' class='form-label'>Message</label><br>
    <textarea  class='form-control' name="message" id='message' style="width:250px;height:150px;"required></textarea><br>
    <div class=' valid-feedback'>Looks Good!</div>
    
    <br>
    <a class='btn btn-danger' href='/ecom/products/view.php'>Cancel</a>
    <button type='submit' name="submit" class='btn btn-success'>Send</button>

</div>
</form>

</div>
</div> 




</body>
</html>
