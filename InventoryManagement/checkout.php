<?php
session_start();
$date=date('Y-m-d');
include 'connection.php';
$total_amount = $_SESSION['t'];
$Quantity = $_SESSION['qty_array'];
$q = "INSERT INTO orders(`order_date`, `amount`) VALUES ('$date','$total_amount')";
$index = 0;
$result = mysqli_query( $conn, $q );
if ( $result )
 {
    $sql = 'SELECT * FROM shoe  WHERE id IN ('.implode( ',', $_SESSION['cart'] ).')';
    $result = mysqli_query( $conn, $sql );
    while ( $row = mysqli_fetch_assoc( $result ) )
    {
        $r = mysqli_query( $conn, 'SELECT max(order_id) from orders' );
        $O_Id = mysqli_fetch_row( $r );
        $highest_id = $O_Id[0];
        $id = $row['id'];
        $article = $row['article_number'];
        $name = $row['name'];
        $p = $row['price'];
        //$quan = implode( ',', $Quantity );
        $quan = $_SESSION['qty_array'][$index];
        // echo "<script>alert('$quan')</script>";
        $q1 = "INSERT INTO invoice(`order_id`, `article_number`, `pro_id`, `pro_name`, `pro_price`, `pro_quantity`) VALUES ('$highest_id','$article','$id','$name','$p','$quan')";
        $result1 = mysqli_query( $conn, $q1 );
        $q2 = "UPDATE shoe SET `quantity`=(`quantity`-'$quan') where id='$id'";
        $result2 = mysqli_query( $conn, $q2 );
        $index++;
        
    }
    if ( $result )
        {
            // echo 'Successfull'.$index;
            unset( $_SESSION['cart'] );
            unset( $_SESSION['qty_array'] );
            unset( $_SESSION['message'] );
            // echo $index;
            // echo "<script>alert('Order placed successfully');</script>";
            header( 'location:shop.php' );
        } else {
            echo 'Try Again';
            echo mysqli_error( $conn );
        }

} else {
    echo 'Fail'.mysqli_error($conn);
}

?>