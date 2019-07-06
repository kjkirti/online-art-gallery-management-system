<?php
include("includes/db.php");

if(isset($_GET['delete_artist'])){

$delete_id=$_GET['delete_artist'];

$delete_artist="delete from artist where artist_id='$delete_id'";
$run_delete = mysqli_query($con,$delete_artist);
if($run_delete){
echo "<script>alert('artist deleted!')</script>";
echo "<script>window.open('index.php?view_artist','_self')</script>";

}

}





?>