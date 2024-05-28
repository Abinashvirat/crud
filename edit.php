<?php

$host = 'localhost';
$dbname = 'myproject';
$username = 'postgres';
$password = '12345';

// Connect to PostgreSQL database
$dsn = "pgsql:host=$host;dbname=$dbname;user=$username;password=$password";
$dbh = new PDO($dsn);
 $data=stripslashes(file_get_contents("php://input"));
 $mydata =json_decode($data,true);
// Query to select data from a table
$id=$mydata['sid'];

$query = "SELECT * FROM student where id=$id";

$statement = $dbh->prepare($query);
$statement->execute();

// Fetch data as associative array
$data = $statement->fetchAll(PDO::FETCH_ASSOC);

// Convert data to JSON format
$json_data = json_encode($data);

// Set HTTP header to specify JSON content type
header('Content-Type: application/json');

// Output JSON data
echo $json_data;


?>