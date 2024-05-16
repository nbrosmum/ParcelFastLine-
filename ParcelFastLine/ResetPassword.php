<?php
session_start();
include 'db.php';
if (isset($_POST['btnReset'])){
    $email= $_POST["txtEmail"];
    $query = "SELECT * FROM user_account WHERE email = '$email' ";
    $results = mysqli_query($connection, $query);
    $row = mysqli_fetch_assoc($results);
    $count = mysqli_num_rows($results);
    if ($count == 1){
        echo "record found!";
        $_SESSION["username"] = $email;
        header('Location:ForgetPassword.php');
    }else{
        echo 'record not found!';
    }
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Reset Password Page</title>
        <link rel = "icon" href = "https://upload.wikimedia.org/wikipedia/commons/2/21/Eo_circle_pink_letter-p.svg" type = "image/x-icon">
        <link rel="stylesheet" href="LSStyle.css">
    </head>
    <body>
        <div class="wrapper">
            <h1>Update Password</h1>
                <form action="#" method= "post">
                    <input type="email" required placeholder="Email" name = "txtEmail" >
                    <button type = "submit" name = "btnReset">confrim</button>
                </form>
            <div class="member">
                Back to Login Page <a href="Login.php">Login here</a>
            </div>
        </div>
    </body>
</html>