<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="style.css">

</head>

<body>
    <div class="center">
        <h1>Login</h1>
        <form method="POST" id="myForm2">
            <div class="txt_field">
                <input type="text" required id="name2" name="username">
                <span></span>
                <label>Username</label>
            </div>
            <div class="txt_field">
                <input type="password" required id="pw" name="passwor">
                <span></span>
                <label>Password</label>
            </div>
            <div class="pass">Forgot Password?</div>
            <input type="submit" value="Login" name="login" id="sub2">
            <div class="signup_link">
                Not a member? <a href="signup.php">Signup</a>
            </div>
        </form>
    </div>

</body>
</html>
<?php
include('connect.php');
if(isset($_POST['login'])){
  $username=$_POST['username'];
  $pw=$_POST['passwor'];
  
  $sql = "SELECT * FROM student WHERE name='$username' AND password='$pw'";
  $result=pg_query($dbcon4,$sql);
  $total=pg_num_rows($result);
  $row=pg_fetch_row($result);
  //echo $total;
  if($total==1){
    $_SESSION['user_name']=$username;
    $_SESSION['user_email']=$row[2];
    $_SESSION['user_phone']=$row[3];
    $_SESSION['user_address']=$row[4];
    $_SESSION['user_image']=$row[6];
    
   header('location:dashboard.php');
  }
}
?>