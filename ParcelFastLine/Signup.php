<?php
    session_start();
    include 'db.php';
    if (isset($_GET['btnResgister'])){
        $Name = $_GET['Name'];
        $Email = $_GET['Email'];
        $Contact = $_GET['Contact'];
        $Address = $_GET['Address'];
        $Password = $_GET['Password'];
        $CPassword = $_GET['CPassword'];
        $query = "INSERT INTO `user_account` (`UName`, `Email`, `Password`,`UContact_Number`, `Address`)  VALUES ('$Name','$Email','$Password' ,'$Contact','$Address')";
        if (mysqli_query($connection, $query)){
                $_SESSION["username"] = $row['Email'];
                $_SESSION['name']= $row['UName'];
                header('Location:Login.php');
            } else {
                echo'records not inserted successfully';
            }
        }
 
    mysqli_close($connection)
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Registration Page</title>
        <link rel = "icon" href = "https://upload.wikimedia.org/wikipedia/commons/2/21/Eo_circle_pink_letter-p.svg" type = "image/x-icon">
        <link rel="stylesheet" href="LSStyle.css">
    </head>
    <body>
        <div class="wrapper">
            <h1>Sign up</h1>
                <form action="Signup.php" method= "get" name = 'SUForm' onsubmit = "return SignupValidate()" >
                    <input type="text"  placeholder="Name" name = "Name">
                    <input type="email"  placeholder="Email" name = "Email">
                    <input type="tel"  placeholder="Contact number" name = "Contact">
                    <input type="text"  placeholder="Address" name = "Address" >
                    <input type="password"  placeholder="Password" name = "Password" >
                    <input type="password"  placeholder="Re-Enter Password" name = "CPassword" >
                    <button type = "submit" name = "btnResgister">Sign Up</button>
                </form>
            <div class="terms">
                <input type="checkbox" required  id="checkbox">
                <label for="checkbox">I agree to these <a href="#">Terms & Condition</a></label>
            </div>
            <div class="member">
                Already a member? <a href="Login.php">Login here</a>
            </div>
        </div>
        <script src = Validate.JS></script>
    </body>
</html>

