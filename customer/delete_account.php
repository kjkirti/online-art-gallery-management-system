<br>


<h2 style="text-align:center;">Do you really want to DELETE your account?</h2>

<form action="" method="post">

<br>
<input type="submit" name="yes" value="Yes I Want" />
<input type="submit" name="no" value="No I Don't Want To" />





</form>

<?php
include("includes/db.php");

    $user=$_SESSION['customer_email'];

    if(isset($_POST['yes'])){
	
	$delete_customer="delete from customer where customer_email='$user'";
	$run_customer=mysqli_query($con,$delete_customer);
	
	echo"<script>alert('Your Account Has Been Deleted')</script>";
	echo"<script>window.open('../index.php','_self')</script>";
	
   }

   if(isset($_POST['no'])){
	   
	   
	 echo"<script>alert('You'll be directed to your account page!')</script>";
	echo"<script>window.open('my_account.php','_self')</script>";  
	   
	   
   }
   
?>