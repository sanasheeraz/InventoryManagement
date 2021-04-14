<?php
session_start();
if(!in_array($_GET['id'],$_SESSION['cart']))
{
	array_push($_SESSION['cart'], $_GET['id']);
	array_push($_SESSION['qty_array'],1);
	$_SESSION['message']='Success! Product added to the cart';
	header('location:shop.php');
}
else
{
	$_SESSION['message']='Product already in cart';
	header('location:shop.php');
}

?>