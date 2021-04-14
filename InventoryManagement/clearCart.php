<?php
session_start();
unset($_SESSION['cart']);
unset($_SESSION['qty_array']);

$_SESSION['message']="Cart Cleard Successfully !";
header("location:Cart.php");
?>