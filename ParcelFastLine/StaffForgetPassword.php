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
    <title>Staff Forget password page</title>
    <link rel = "icon" href = "https://upload.wikimedia.org/wikipedia/commons/2/21/Eo_circle_pink_letter-p.svg" type = "image/x-icon">
    <link rel="stylesheet" href="LSStyle.css">
</head>
<body>
    <?php
        if (isset($_POST['btnUpdate'])){
            $email = $_SESSION["username"];
            $pass = $_POST["txtPassword"];
            $query = "UPDATE `staff_account` SET `password` = '$pass' WHERE email = '$email' ";
            $Password = $_POST['txtPassword'];
            $CPassword = $_POST['txtCPassword'];
            if ($Password != $CPassword){
                echo"Password doesn`t match";
                header("Refresh:3, url= StaffForgetPassword.php");
            }else{
                if (mysqli_query($connection, $query)){
                    echo 'Password has been Updated';
                    header('Refresh:3, url=StaffLogin.php');
                }else{
                    echo 'sry record not successful in updating';
                    header("Refresh:3, url= StaffForgetPassword.php");
                }
            }
        }
    ?>
        <div class="wrapper">
            <h1>Update Password</h1>
                <form action="#" method= "post">
                    <input type="password" required placeholder="Password" name = "txtPassword" id ="txtPassword">
                    <input type="password" required placeholder="Re-Enter Password" name = "txtCPassword" id = "txtCPassword" >
                    <button type = "submit" name = "btnUpdate">Update</button>
                </form>
            <div class="member">
                Back to Login Page <a href="StaffLogin.php">Login here</a>
            </div>
        </div>
    </body>
</html>