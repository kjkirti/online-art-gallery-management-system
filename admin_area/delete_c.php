<?php
include("includes/db.php");

if(isset($_GET['delete_c'])){

$delete_id=$_GET['delete_c'];

$delete_c="delete from customer where customer_id='$delete_id'";
$run_delete = mysqli_query($con,$delete_c);
if($run_delete){
echo "<script>alert('customer deleted!')</script>";
echo "<script>window.open('index.php?view_customers','_self')</script>";

}

}





?>