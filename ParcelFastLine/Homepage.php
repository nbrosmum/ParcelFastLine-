<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel = "icon" href = "https://upload.wikimedia.org/wikipedia/commons/2/21/Eo_circle_pink_letter-p.svg" type = "image/x-icon">
    <link rel="stylesheet" href="HPStyle.css">
	<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
</head>
<body>
<header>
  <div class="top">
    <h1>Parcel<span>Fastline</span></h1>
  </div>
  <div class="topstuff">
    <?php if (!empty($_SESSION['username'])){?>
    | <a href="ForgetPassword.php">Change Password</a> |
    <a href="Logout.php">logout</a> |
    <?php }else{ ?>
    | <a href="Login.php">Login</a> |
    <a href="Signup.php">Signup</a> |
    <a href="StaffLogin.php">Staff Login</a> |

    <?php } ?>
  </div>

</header>

<!-- Welcome  -->
<?php
if (!empty($_SESSION["username"])){
     $Username =  $_SESSION["name"] ;
}else{
     $Username = "Customer" ;
}
?>
<div class="title">
    <h1>Welcome to <br> Parcel FastLine <br> <span><?php echo "$Username";?></span></h1>
</div>

<!-- SEARCH BAR -->

<div id="searchbar">
    <form action="" method = "get">
        <label>Tracking Item</label>
        <div class="search_wrap">
            <div class="search_box">
                <input name="txtSearch" type="text" class="input" placeholder="Item ID....">
                    <button class="btn btn_common" name="btnSearch" onclick="document.location='#searchbar'">
                        <i class="fas fa-search"></i>
				    </button>
                </a>
            </div>
        </div>		
    </form>
</div>
<div id="tracking">
        <?php
        include "db.php";
        if(isset($_GET["btnSearch"])) {
            $Search = $_GET["txtSearch"];
            $query = "SELECT * FROM `inventory_record` WHERE  Item_ID = '$Search'";
            $results = mysqli_query($connection, $query);
            if(mysqli_num_rows($results) > 0){
                //display your data
        ?>
    <table border = 1 class="trackingtable">
            <tr>
                <th>ID</th>
                <th>Item</th>
                <th>Weight</th>
                <th>Address</th>
                <th>Date&Time Send</th>
                <th>Estimate Arrived</th>
                <th>Delivary By</th>
                <th><label for= "Status">Status Process</label></th>
            </tr>
            <?php while ($row = mysqli_fetch_assoc($results)){ ?>
            <tr>
                <td><?php echo $row["Item_ID"]; ?> </td>
                <td><?php echo $row["Shipping_Item"]; ?></td>
                <td><?php echo $row["Item_Weight"]. "Kg"; ?></td>
                <td><?php echo $row["Shipping_Address"]; ?></td>
                <td><?php echo $row["Date&Time"]; ?></td>
                <td><?php echo $row["Estimate_Duration"]. " Day";?></td>
                <td><?php echo $row["Delivery_Method"]; ?></td>
                <td>
                    <?php echo $Status = $row["Status"];
                        if ($Status == "Pending"){
                            $Process = 0;
                        }elseif($Status == "Shipped"){
                            $Process = 50;
                        }else{
                            $Process = 100;
                        }   
                    ?>
                    <progress id="Status" value=<?php echo "$Process"?> max="100"></progress>
                </td>
            </tr>
            <?php } ?>
        </table>
        <div class="nothing">
            <?php
                }else{
                    echo 'no records found';
                }
            }
            ?>
         
        </div>

</div>
    <!-- Team -->

<div id="team">
  <h1>Our Team</h1>
  <div class="team">
  <!-- M 1-->
    <div class="team_member">
      <div class="team_img">
        <img src="img/ChoonJie.jpg">
      </div>
      <h3>Mum Choon Jie</h3>
      <p class="role">Group Member</p>
    </div>
  <!-- M 2-->
    <div class="team_member">
      <div class="team_img">
        <img src="img/LerkAnn.jpg">
      </div>
      <h3>Lee Lerk Ann</h3>
      <p class="role">Leader</p>
    </div>
  <!-- M 3 -->
    <div class="team_member">
      <div class="team_img">
        <img src="img/ChuiTeng.jpg">
      </div>
      <h3>Lee Chui Teng</h3>
      <p class="role">Group Member</p>
    </div>
  </div>
</div>

<!-- FEEDBACK -->
<?php
    include 'db.php';
    if (isset($_GET['submit'])){
        $name = $_GET['name'];
        $email = $_GET['email'];
        $message = $_GET['message'];

        $query = "INSERT INTO `feedback`(`Name`, `Email`, `Feedback`)  VALUES ('$name', '$email', '$message')";
        if (mysqli_query($connection, $query)){
            echo 'record inserted successfully';
            header('Location: TQ4F.php');
        } else {
            echo 'records not inserted successfully';
        }
    }
    mysqli_close($connection)
?>

<div id="feedback">
	<h1 class="section-header">Feedback</h1>
	<div class="feedback-wrapper">		  
		<form id="contact-form" class="form-horizontal" role="form">
			<div class="form-group">
				<div class="col-sm-12">
					<input type="text" class="form-control" id="name" placeholder="Name" name="name" value="" required>
			  </div>
			</div>
			<div class="form-group">
			  <div class="col-sm-12">
					<input type="email" class="form-control" id="email" placeholder="Email" name="email" value="" required>
			  </div>
			</div>
			<textarea class="form-control" rows="10" placeholder="Message" name="message" required></textarea>
			<button class="btn btn-primary send-button" id="submit" Name = "submit" type="submit" value="SEND"><span class="send-text">SEND</span></button>
		</form>
	</div>
</div>

<!-- CONTACT -->

<div id="Contact">
	<h1 class="section-header">Contact Info</h1>
	<div class="contact-wrapper">
	<div>
	  <form  id="contact-form" class="form-horizontal" role="form">
		<ul class="contact-list">
		<li class="list-item"><i class="fa fa-map-marker fa-2x"><span class="contact-text place">Jalan Teknologi 5, Taman Teknologi Malaysia, 57000 Kuala Lumpur, Wilayah Persekutuan Kuala Lumpur</span></i></li>
		
		<li class="list-item"><i class="fa fa-phone fa-2x"><span class="contact-text phone"><a href="tel:1-212-555-5555" title="Give me a call">(212) 555-2368</a></span></i></li>
		
		<li class="list-item"><i class="fa fa-envelope fa-2x"><span class="contact-text gmail"><a href="mailto:#" title="Send me an email">parcelfastline@gmail.com</a></span></i></li>
		
	  </ul>
	</form>
	</div>
</div>

<!-- FOOTER -->


<footer class="footer-basic">
	<ul class="list-inline">
		<li class="list-inline-item"><a href="#searchbar">Tracking</a></li>
		<li class="list-inline-item"><a href="#feedback">Feedback</a></li>
		<li class="list-inline-item"><a href="#Contact">Contact</a></li>
		<li class="list-inline-item"><a href="#">Terms</a></li>
		<li class="list-inline-item"><a href="#">Privacy Policy</a></li>
	</ul>
	<p class="copyright">parcelfastline © 2021</p>
</footer>
