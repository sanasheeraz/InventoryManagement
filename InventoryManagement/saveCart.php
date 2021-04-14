<?php
session_start();
include 'connection.php';
if(isset($_POST['save']))
{
	$_SESSION['message']='Cart updated successfully';
	foreach($_POST['indexes'] as $key) {
		$sql = "SELECT * FROM shoe WHERE id=".$_SESSION['cart'][$key];
		$result = mysqli_query( $conn, $sql );
		while ($row = mysqli_fetch_assoc( $result))
		{
			$existQuantity=$row['quantity'];
			echo 'exist : '.$existQuantity;
			$quan = $_POST['qty_'.$key];
			echo 'enetr : '.$quan;
			if($quan > $existQuantity)
			{
				$_SESSION['message']='No more products in stock';
				header('location:cart.php');
			}else{
				$_SESSION['qty_array'][$key]=$_POST['qty_'.$key];
				
				//echo $_SESSION['qty_array'][$key];
			}
		}
		//$_SESSION['message']='Cart updated successfully';
		header('location:cart.php');
	}
	
}
?>