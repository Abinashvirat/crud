 <?php
   include('connect.php');
// Extracting values from the form submission
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$gender = $_POST['gender'];
$image_name = $_FILES['image']['name'];
$temp_name = $_FILES['image']['tmp_name'];
$dob = $_POST['dob'];
$country = $_POST['countrySelect']; // Assuming this is where you get the country value from the form
$state = $_POST['stateSelect'];
$folder = "/xampp/htdocs/MyProjects/task11/image/" . $image_name;
$id = $_POST['hidden'];

// Move uploaded image to the specified folder
move_uploaded_file($temp_name, $folder);

$hobbies = array(); // Array to store selected hobbies
if(isset($_POST['hobby1'])) {
    $hobbies[] = $_POST['hobby1']; // Add 'reading' to hobbies array if selected
}
if(isset($_POST['hobby2'])) {
    $hobbies[] = $_POST['hobby2']; // Add 'sports' to hobbies array if selected
}

$hobbies_str = implode(', ', $hobbies);

// Prepare SQL query
if($id != "") {
    // If $id is not empty, update the existing record
    $sql = "UPDATE student SET name='$name', email='$email', phone='$phone', address='$address', gender='$gender', image='$image_name', dob='$dob', hobby='$hobbies_str', country='$country', state='$state' WHERE id='$id'";
} else {
    // If $id is empty, insert a new record
    $sql = "INSERT INTO student (name, email, phone, address, gender, image, dob, hobby, country,state) VALUES ('$name', '$email', '$phone', '$address', '$gender', '$image_name', '$dob', '$hobbies_str', '$country','$state')";
}

// Execute the SQL query
$result = pg_query($dbcon4, $sql);

// Check if the query was executed successfully
if($result) {
    echo "Record inserted/updated successfully.";
} else {
    echo "Error executing query: " . pg_last_error($dbcon4);
}


?>