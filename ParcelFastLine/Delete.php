<?php
include 'db.php';
$id = $_GET['id'];
    $query = "DELETE FROM `inventory_record` WHERE Item_ID='$id'";
    if (mysqli_query($connection, $query)){
        echo 'information has been deleted';
        header('Location: Admin.php');
    }else{
        echo 'Sorry record was not deleted';
    }
?> 
