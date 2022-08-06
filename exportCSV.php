<?php 
 
try {
    $db= new mysqli('localhost','root','','ecom');


$query = $db->query("SELECT * FROM products ORDER BY id ASC"); 
 
if($query->num_rows > 0){ 
    $delimiter = ","; 
    // $filename = "Ecom-" . date('Y-m-d') . ".csv"; 
    $filename = "Ecom-" . date('Y-m-d') . ".csv"; 

     
    // Create a file pointer 
    $f = fopen('php://memory', 'w'); 
     
    // Set column headers 
    $fields = array('ID', 'NAME', 'PRICE','WEIGHT', 'INSTOCK'); 
    fputcsv($f, $fields, $delimiter); 
     
    // Output each row of the data, format line as csv and write to file pointer 
    while($row = $query->fetch_assoc()){ 
        $status = ($row['inStock'] == 1)?'Yes':'No'; 
        $lineData = array($row['id'], $row['name'], $row['price'], $row['weight'], $status); 
        fputcsv($f, $lineData, $delimiter); 
    } 
     
    // Move back to beginning of file 
    fseek($f, 0); 
     
    // Set headers to download file rather than displayed 
    header('Content-Type: text/csv'); 
    header('Content-Disposition: attachment; filename="' . $filename . '";'); 
     
    //output all remaining data on a file pointer 
    fpassthru($f); 
}
    exit; 
} catch (Throwable $e) {
    echo "ERROR EXPORTING"."<br>".$e->getMessage();
}
 
 
?>