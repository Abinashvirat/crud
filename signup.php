<?php
include 'connect.php';

if(isset($_POST['submit2'])){
    $name=$_POST["name2"];
    $email=$_POST["email2"];
    $phone=$_POST["phone2"];
    $address=$_POST["address2"];
    $password=$_POST["password2"];
   // $cpassword=$_POST["password3"];
    $dob=$_POST["dob"];
    $gender=$_POST["gender"];

    $image_name=$_FILES['image']['name'];
    $temp_name=$_FILES['image']['tmp_name'];
    $folder="/xampp/htdocs/MyProjects/task11/image/".$image_name;
    $id=$_POST['hidden'];
    move_uploaded_file($temp_name,$folder);

    $hobbies = array(); // Array to store selected hobbies
 if(isset($_POST['hobby1'])) {
     $hobbies[] = $_POST['hobby1']; // Add 'reading' to hobbies array if selected
 }
 if(isset($_POST['hobby2'])) {
     $hobbies[] = $_POST['hobby2']; // Add 'sports' to hobbies array if selected
 }

 $hobbies_str = implode(', ', $hobbies);


    $sql="insert into student (name,email,phone,address,password,gender,image,dob,hobby) values ('$name','$email','$phone','$address','$password','$gender','$image_name','$dob','$hobbies_str')";
    $result=pg_query($dbcon4,$sql);

    if($result!=false){
        header('location:index2.php');
        exit; // Terminate script execution after redirection
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.datatables.net/2.0.4/css/dataTables.dataTables.min.css">
    <style>
    .center {
        border: 100px;
        max-width: 500px;
        margin: auto;
    }
    </style>
    <title>Hello, world!</title>
</head>

<body style="background-color: bisque;">

    <div class="center" style="background-color: aquamarine; margin-top: 5%;">
    <div style="text-align: center;"><h3>Sign-Up Form</h3></div>
        <form class="container" action="#" method="POST" name="myform" id="myForm" enctype="multipart/form-data">
            <input type="hidden" name="hidden" id="hiddenId">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name2" name="name2" placeholder="Enter Name">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email2" name="email2" placeholder="Enter Email">
            </div>
            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="tel" class="form-control" id="phone2" name="phone2" placeholder="Enter Phone">
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <textarea class="form-control" id="address" rows="3" id="address2" name="address2"></textarea>
            </div>
            <div class="form-group">
                <label for="name">Password</label>
                <input type="password" class="form-control" id="password2" name="password2"
                    placeholder="Enter Password">
            </div>
            <div class="form-group">
                <label for="name">Confirm Password</label>
                <input type="password" class="form-control" id="password3" name="password3"
                    placeholder="Re-Enter Password">
            </div>
            <div class="form-group">
                <label>Gender</label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" id="male" value="male">
                    <label class="form-check-label" for="male">Male</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" id="female" value="female">
                    <label class="form-check-label" for="female">Female</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" id="other" value="other">
                    <label class="form-check-label" for="other">Other</label>
                </div>
            </div>

            <div class="form-group">
                <label for="dob">Date of Birth:</label>
                <input type="date" class="form-control" id="dob" name="dob">
            </div>


            <div class="form-group">
                <label>Hobbies</label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="hobby1" value="reading" name="hobby1">
                    <label class="form-check-label" for="hobby1">Reading</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="hobby2" value="sports" name="hobby2">
                    <label class="form-check-label" for="hobby2">Sports</label>
                </div>
                <!-- Add more hobbies as needed -->

            </div>

            <div class="form-group">
                <input type="file" id="image" name="image">
                <img id="imageprev" style="width:50%;height:50%;">
            </div>
    </div>

    <div style="text-align: center;" class="my-2">

        <button type="submit" class="btn btn-primary" name="submit2" id="sub">SUBMIT</button>
    </div>
    </form>

    </div>


</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
    $("#image").change(function () {
        var file = this.files[0];
        if (file) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#imageprev').attr('src', e.target.result);
            }
            reader.readAsDataURL(file);
        }
    });
</script>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
    integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
    integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
</script>


</html>

