

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<script src="Chart.js"> </script>    

<?php
require_once("./session.php");

try{
$cn=new mysqli("localhost",'root','',"ecom");
$SQL="select weight,name from products where inStock=1";
$r=$cn->query($SQL);


$w=[""];
$n=[""];
for ($i=0;$data=$r->fetch_assoc() ; $i++) { 
    $w[$i]="$data[weight]";
    $n[$i]="$data[name]";
}

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



<h1 style="text-align:center;">Weight Chart</h1>

<canvas id="myChart" width="400" height="400"></canvas>

<script>

const ctx = document.getElementById('myChart').getContext('2d');

const myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: [
            <?php 
            for ($i=0; $i <count($n) ; $i++) { 
                echo "'$n[$i]',";
            }
            ?>
        ],
        datasets: [{
            label: 'Weight',
            data: 
            [
                <?php 
                for ($i=0; $i <count($w) ; $i++) { 
                    echo "'$w[$i]',";
                }
                ?>                     
            ],
            backgroundColor: [
                <?php
                for ($i=0; $i <count($w) ; $i++) { 
                    $r=rand(5,220);
                    $g=rand(5,220);
                    $b=rand(5,220);
                    echo "'rgba($r,$g,$b,0.7)',";
                }
                ?>
            ],
            borderColor: [
                <?php
                for ($i=0; $i <count($w) ; $i++) { 
                    $r=rand(5,220);
                    $g=rand(5,220);
                    $b=rand(5,220);
                    echo "'rgba($r,$g,$b,0.7)',";
                }
                ?>
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
</script>
</body>
</html>