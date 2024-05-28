<?php
// Database connection parameters
$host = "localhost"; // Replace with your PostgreSQL host
$port = "5432"; // Replace with your PostgreSQL port (default is 5432)
$dbname = "myproject"; // Replace with your PostgreSQL database name
$user = "postgres"; // Replace with your PostgreSQL username
$password = "12345"; // Replace with your PostgreSQL password

// Establish connection to PostgreSQL database
$conn = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$password");
// Check connection
if (!$conn) {
    die("Connection failed: " . pg_last_error());
}
// Check if the country parameter is set and not empty
if(isset($_POST['country']) && !empty($_POST['country'])) {
    // Prepare SQL statement to fetch states based on the selected country
    $country = $_POST['country'];
    $sql = "SELECT * FROM state WHERE country_id = (
                SELECT id FROM country WHERE name = '$country'
            )";
// Execute SQL query
    $result = pg_query($conn, $sql);

    if ($result) {
        // Fetch states from the result set
        $states = [];
        while($row = pg_fetch_assoc($result)) {
            if(isset($row['s_id']) && isset($row['s_name'])) {
                // Add state ID and name to the states array
                $states[] = [
                    'state_id' => $row['s_id'],
                    'state_name' => $row['s_name']
                ];
            } else {
                // Handle case where 's_id' or 's_name' index is not set
                error_log("Undefined index 's_id' or 's_name' in database result");
            }
        }
        
        // Output JSON encoded array of state objects
        echo json_encode($states);
    } else {
        // Query execution failed
        echo "Failed to fetch states.";
    }
    
} 
// Close database connection
pg_close($conn);
?>