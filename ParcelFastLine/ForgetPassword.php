<?php
session_start();
include 'db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Forget password page</title>
    <link rel = "icon" href = "https://upload.wikimedia.org/wikipedia/commons/2/21/Eo_circle_pink_letter-p.svg" type = "image/x-icon">
    <link rel="stylesheet" href="LSStyle.css">
</head>
<body>
    <?php
        if (isset($_POST['btnUpdate'])){
            $email = $_SESSION["username"];
            $pass = $_POST["txtPassword"];
            $query = "UPDATE `user_account` SET `password` = '$pass' WHERE email = '$email' ";
            $Password = $_POST['txtPassword'];
            $CPassword = $_POST['txtCPassword'];
            if (mysqli_query($connection, $query)){
                 echo 'Password has been Updated';
                header('Refresh:3, url=Login.php');
            }else{
                 echo 'sry record not successful in updating';
                header("Refresh:3, url= ForgetPassword.php");
            }
        }
    ?>
        <div class="wrapper">
            <h1>Update Password</h1>
                <form action="ForgetPassword.php" method= "post" name = "FPForm" onsubmit= "return FPValidate()">
                    <input type="password"  placeholder="Password" name = "txtPassword" id ="txtPassword">
                    <input type="password"  placeholder="Re-Enter Password" name = "txtCPassword" id = "txtCPassword" >
                    <button type = "submit" name = "btnUpdate">Update</button>
                </form>
            <div class="member">
                Back to Login Page <a href="Login.php">Login here</a>
            </div>
        </div>
        <script src = Validate.JS></script>
    </body>
</html>