<?php
try{
   $conn_string = "host=localhost port=5432 dbname=myproject user=postgres password=12345";
    $dbcon4= pg_connect($conn_string);
}
catch(Exception $e){
    echo $e->getMessage();
}
?>


