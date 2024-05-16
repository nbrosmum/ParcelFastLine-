<?php
include 'db.php';

$id = $_GET['id'];

if(isset($_POST['btnUpdate'])){
    $ItemID =$_POST['txtItem_ID'];
    $Item =$_POST['txtShipping_Item'];
    $Weight =$_POST['txtWeight'];
    $Address =$_POST['txtAddress'];
    $DateTime =$_POST['txtDT'];
    $Status =$_POST['txtStatus'];
    $Estimate =$_POST['txtED'];
    $DeliveryMethod =$_POST['txtDM'];
    $Staff =$_POST['txtStaff_ID'];
    $User =$_POST['txtUser_ID'];

    $query = "UPDATE `inventory_record` SET `Item_ID`='$ItemID',`Shipping_Item`='$Item',`Item_Weight`='$Weight',`Shipping_Address`='$Address',
	`Date&Time`='$DateTime',`Status`='$Status',`Estimate_Duration`='$Estimate',`Delivery_Method`='$DeliveryMethod',
	`Staff_ID`='$Staff',`User_ID`=' $User' WHERE Item_ID = $id";
    if(mysqli_query($connection, $query)){
        echo 'Information has been updated';
        header("Location:Admin.php");
    }else{
        echo 'Sorry record was not successful in updating';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Page</title>
	<link rel = "icon" href = "https://upload.wikimedia.org/wikipedia/commons/2/21/Eo_circle_pink_letter-p.svg" type = "image/x-icon">
		<link rel="stylesheet" href="AdminPage.css">
</head>
<body style="background-color: #2f323a;">
<header>
	<div class="top">
		<h1>Parcel<span>Fastline</span></h1>
	</div>
</header>
    <?php
    $query = "SELECT * FROM `inventory_record` WHERE Item_ID = '$id'";
    $results = mysqli_query($connection, $query);
    $row = mysqli_fetch_assoc($results);
    ?>
		<div id="editdetail">
			<h2>Edit Detail</h2>
			<form action="#" method = 'post'>
				<Table class="detaillist">
					<tr>
						<td>Item ID: </td>
						<td><input type="text" value="<?php echo $row['Item_ID']; ?>" name="txtItem_ID"></td>
					</tr>
					<tr>
						<td>Shipping Item: </td>
						<td><input type="text" value="<?php echo $row['Shipping_Item']; ?>" name="txtShipping_Item"></td>
					</tr>   
					<tr>
						<td>Item Weight: </td>
						<td><input type="text" value="<?php echo $row['Item_Weight']. ' Kg'; ?>" name="txtWeight"></td>
					</tr>        
					<tr>
						<td>Shipping Address: </td>
						<td><input type="text" value="<?php echo $row['Shipping_Address']; ?>" name="txtAddress"></td>
					</tr>        
					<tr>
						<td>Date&time: </td>
						<td><input type="datetime-local" value="<?php echo $row['Date&Time']; ?>" name="txtDT"></td>
					</tr>        
					<tr>
						<td>Status: </td>
						<td><?php $Status = $row['Status']; ?>
							<label>
									<input type="radio" name="txtStatus" <?php if($Status == "Pending") echo "checked"; ?> value = "Pending">Pending
							</label>
							<label>
									<input type="radio" name="txtStatus" <?php if($Status == "Shipped") echo "checked"; ?> value = "Shipped">Shipped
							</label>
							<label>
									<input type="radio" name="txtStatus" <?php if($Status == "Deliverd") echo "checked"; ?> value = "Deliverd">Deliverd
							</label>
						</td>
					</tr>        
					<tr>
						<td>Estimate Duration: </td>
						<td><input type="text" value="<?php echo $row['Estimate_Duration']. ' Day'; ?>" name="txtED"></td>
					</tr>        
					<tr>
						<td>Delivery Method: </td>
						<td><?php $DeliveryMethod = $row['Delivery_Method']; ?>
							<label>
									<input type="radio" name="txtDM" <?php if($DeliveryMethod != "By Ship") echo "checked"; ?> value = "By Plane">By Plane
							</label>
							<label>
									<input type="radio" name="txtDM" <?php if($DeliveryMethod != "By Plane") echo "checked"; ?> value = "By Ship">By Ship
							</label>
						</td>
					</tr>        
					<tr>
						<td>Staff ID: </td>
						<td><input type="text" value="<?php echo $row['Staff_ID']; ?>" name="txtStaff_ID"></td>
					</tr>
					<tr>
						<td>User ID: </td>
						<td><input type="text" value="<?php echo $row['User_ID']; ?>" name="txtUser_ID"></td>
					</tr>
					<tr>
						<td><b><a href="Admin.php">Back to Item list</a></b></td> 	
						<td><button class="Update" type="submit" value="Update" name="btnUpdate"><span class="send-text">UPDATE</span></button></td> 	
					</tr>
			</form>
		</div>
</body>
</html>