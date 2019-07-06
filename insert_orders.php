<?php
$con = mysqli_connect("localhost","root","","project");
if(mysqli_connect_errno())
{
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
function total_prices(){
		$total = 0;
		global $con;
		$ip=getIp();
		$sel_price = "select * from cart where ip_add='$ip'";
		$run_price = mysqli_query($con,$sel_price);
		while($p_price=mysqli_fetch_array($run_price)){
			
			$painting_id = $p_price['painting_id'];
			$painting_price = "select * from painting where painting_id='$painting_id'";
			$run_painting_price = mysqli_query($con,$painting_price);
			while($pp_price = mysqli_fetch_array($run_painting_price)){
				
				$painting_price = array($pp_price['painting_price']);
				$values = array_sum($painting_price);
				
			$total += $values;	
			}
			
		}
		
		
		
		return $total;
		
	}
























?>