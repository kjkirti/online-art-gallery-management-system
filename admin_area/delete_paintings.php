<?php
include("includes/db.php");

if(isset($_GET['delete_paintings'])){

$delete_id=$_GET['delete_paintings'];

$delete_paintings="delete from painting where painting_id='$delete_id'";
$run_delete = mysqli_query($con,$delete_paintings);
if($run_delete){
echo "<script>alert('painting deleted!')</script>";
echo "<script>window.open('index.php?view_paintings','_self')</script>";

}

}





?>