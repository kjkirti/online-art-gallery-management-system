<?php
include("includes/db.php");

if(isset($_GET['delete_gallery'])){

$delete_id=$_GET['delete_gallery'];

$delete_gallery="delete from galleries where gallery_id='$delete_id'";
$run_delete = mysqli_query($con,$delete_gallery);
if($run_delete){
echo "<script>alert('gallery deleted!')</script>";
echo "<script>window.open('index.php?view_gallery','_self')</script>";

}

}





?>