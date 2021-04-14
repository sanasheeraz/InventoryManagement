

<?php
include 'header.php';
include 'connection.php';
?>
<script>
$(document).ready(function() {
    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    } );
} );
</script>
<div class="site-section">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h2 class="h3 mb-3 text-black">Reports</h2>
      </div>

      <div class="col-lg-12">
     <h1>Orders Details</h1>
     <form method="post">
     Start Date :<input type="date" name="startDate"/>
     End Date : <input type="date" name="endDate"/>
     <input type="submit" value="search" name="btnSearch" class="btn btn-primary"/>
     </form>
     <div class = 'container'>
<?php

if(isset($_POST['btnSearch']))
{
    $start=$_POST['startDate'];
    $end=$_POST['endDate'];
    $query="Select * from orders o join invoice i on o.order_id=i.order_id where order_date between '$start' AND '$end'";
}else{
    $query="Select * from orders o join invoice i on o.order_id=i.order_id";
}
$result = mysqli_query( $conn, $query );

?>
<table class = 'display nowrap' id="example" style="width: 100%;">
    <thead>
    <tr>
        <th>Order ID</th>
        <th>Total Amount</th>
        <th>Product Name</th>
        <th>Product Quantity</th>
        <th>Product Price</th>
    </tr>
    </thead>
    <tbody>
    <?php
while($row=mysqli_fetch_array($result))
{
?>
  <tr>
        <td><b><?= $row['order_id'];?></b></td>
        <td><?= $row['amount'];?></td>
        <td><?= $row['pro_name'];?></td>
        <td><?= $row['pro_quantity'];?></td>
        <td><?= $row['pro_price'];?></td>
   </tr>

<?php
}
?>
 </tbody>
</table>

</div>
     </div>

      </div>
    </div>
  </div>
<?php
include 'footer.php';
?>
  