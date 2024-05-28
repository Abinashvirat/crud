
<?php
include 'connect.php';

// Get data from the request
$data = stripslashes(file_get_contents("php://input"));
$mydata = json_decode($data, true);
$id = $mydata['sid'];
$image = $mydata['image'];

if (!empty($id)) {
    // Delete record from the database
    $sql = "DELETE FROM student WHERE id = $id";
    $result = pg_query($dbcon4, $sql);

    // Delete associated image file
    if (!empty($image)) {
        $imagePath = "image/" . $image;
        if (file_exists($imagePath)) {
            unlink($imagePath); // Delete the image file
        }
    }

    echo "Record deleted successfully.";
} else {
    echo "ID not provided.";
}
?>
