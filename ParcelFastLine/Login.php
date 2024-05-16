<?php

session_start();
include 'db.php';

if(isset($_POST['btnLogin'])){
    $email = $_POST['Username'];
    $password = $_POST['Password'];
    $query = "SELECT * FROM `user_account` WHERE Email ='$email' AND Password ='$password'";
    $results = mysqli_query($connection, $query);
    $row = mysqli_fetch_assoc($results);
    $count = mysqli_num_rows($results);
    if($count == 1 ){
        $_SESSION["username"] = $row['Email'];
        $_SESSION['name']= $row['UName'];
        echo 'login successful!';
        header('Location:Homepage.php'); 
    }else{
        echo 'invalid credentials';
    }
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login Page</title>
    <link rel = "icon" href = "https://upload.wikimedia.org/wikipedia/commons/2/21/Eo_circle_pink_letter-p.svg" type = "image/x-icon">
    <link rel="stylesheet" href="LSStyle.css">
  </head>
  <body>
    <div class="wrapper">
        <h1>Login</h1>
        <form action ="" method="post">
            <input type="text"  name="Username" required placeholder="Username" >
            <input type="password" name ="Password" required placeholder="Password">               
        <div class="pass"><a href="ResetPassword.php">Forgot Password?</a></div>
        <button input type="submit" name= "btnLogin">Login</button>
        <div class="signup_link">
          Not a member? <a href="Signup.php">Signup</a>
        </div>
        </form>
    </div>
  </body>
</html>