<?php
session_start();
include 'db.php';
$query = "SELECT `Item_ID`,`Shipping_Item`,`Item_Weight`,`Shipping_Address`,`Date&Time`,
`Status`,`Estimate_Duration`,`Delivery_Method`,`Name`,`UName`,`UContact_Number` FROM inventory_record 
INNER JOIN staff_account ON inventory_record.Staff_ID = staff_account.Staff_ID 
INNER JOIN user_account ON inventory_record.User_ID = user_account.User_ID;";
$results = mysqli_query($connection, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
	<link rel = "icon" href = "https://upload.wikimedia.org/wikipedia/commons/2/21/Eo_circle_pink_letter-p.svg" type = "image/x-icon">
    <link rel="stylesheet" href="AdminPage.css">
</head>
<body>
<header>
	<div class="top">
		<h1>Parcel<span>Fastline</span></h1>
	</div>
	<div class="topstuff">
	|<a href="StaffForgetPassword.php">Change Password</a>
	|<a href="Logout.php">logout</a>|
	</div>
</header>

<div id="itemlist">
	<h1>&nbsp<?php echo "  Weclome Back ".$_SESSION['name']. " !!!";?></h1>
		<h2>Item list</h2>
		<table class="itemlist">
				<tr class="top table">
						<th>Item ID</th>
						<th>Shipping Item</th>
						<th>Item Weight</th>
						<th>Shipping Address</th>
						<th>Date & Time</th>
						<th>Status</th>
						<th>Estimate Duration</th>
						<th>Delivery Method</th>
						<th>P.I.C</th>
						<th>Customer Name</th>
						<th>Customer Contact_Number</th>
						<th>Edit/Delete</th>
				</tr>
				<?php while($row = mysqli_fetch_assoc($results)){?>
						<tr class="table content">
								<td><?php  echo $row['Item_ID'] ;?></td>
								<td><?php  echo $row['Shipping_Item'] ;?></td>
								<td><?php  echo $row['Item_Weight']. " kg" ;?></td>
								<td><?php  echo $row['Shipping_Address'] ;?></td>
								<td><?php  echo $row['Date&Time'] ;?></td>
								<td><?php  echo $row['Status'] ;?></td>
								<td><?php  echo $row['Estimate_Duration']. " Day" ;?></td>
								<td><?php  echo $row['Delivery_Method'];?></td>
								<td><?php  echo $row['Name'];?></td>
								<td><?php  echo $row['UName'];?></td>
								<td><?php  echo $row['UContact_Number'];?></td>
								<td class="editdelete">
										<a href = "EditDetail.php?id=<?php echo $row['Item_ID'];?>">Edit</a> |
										<a href = "Delete.php?id=<?php echo $row['Item_ID'];?>">Delete</a> 
								</td>
						</tr>
				<?php } ?>    
		</table>
</div>		

<?php
include "db.php";
$query = "SELECT * FROM `feedback` ORDER BY Feedback_ID DESC";
$result = mysqli_query($connection, $query);
?>


<div id="displayfeedback">
	<h2>Messages from Client</h2>
        <div class= "feedback">
            <table>
							<tr>
								<th>Name</th>
								<th>Email</th>
								<th>Feedback</th>
							</tr>
              <?php while ($row = mysqli_fetch_assoc($result)) {?>
							<tr>
                <td><?php echo $row['Name'];?></td>
                <td><?php echo $row['Email'];?></td>
                <td><?php echo $row['Feedback'];?></td>
              </tr>
							<?php }
  						mysqli_close($connection)?>
            </table>
        </div>
        <br>

</div>

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
</body>
</html>

