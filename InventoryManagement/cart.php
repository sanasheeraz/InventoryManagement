<?php
include("header.php");
?>    
<script>
window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function(){
        $(this).remove(); 
    });
}, 2000);
</script>
    <div class="site-section">
      <div class="container" style="margin-top: 50px;">
        <div class="row mb-5">
        <h1>Cart</h1>
       <?php if(isset($_SESSION['message'])){?>
        <div class="alert alert-success" id="success-alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <?php echo $_SESSION['message'];?> 
            </div>
            <?php
       }
            ?>
          <form class="col-md-12" method="post" action="saveCart.php">
            <div class="site-blocks-table">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th class="product-thumbnail">Image</th>
                    <th class="product-name">Product</th>
                    <th class="product-price">Price</th>
                    <th class="product-quantity">Quantity</th>
                    <th class="product-total">Total</th>
                    <th class="product-remove">Remove</th>
                  </tr>
                </thead>
                <tbody>
                        <?php 
      $total =0;
      if(!empty($_SESSION['cart']) )
      {
        include 'connection.php';
        $index =0;
		//echo "sadnaskdnaksd";
		//var_dump($_SESSION['qty_array'][24]);
        if(!isset($_SESSION['qty_array']))
        {
          $_SESSION['qty_array']=array_fill(0, count ($_SESSION['cart']),1);
        }
        $sql="SELECT * FROM shoe  WHERE id IN (".implode(',', $_SESSION['cart']).")";
        $result=mysqli_query($conn,$sql);
        while ($row =mysqli_fetch_assoc($result)) 
        {
          ?>
                  <tr>
                    <td class="product-thumbnail">
                      <img src="shoe.jpg" alt="Image" class="img-fluid">
                    </td>
                    <td class="product-name">
                      <h2 class="h5 text-black"><?php echo $row['name'];?></h2>
                    </td>
                    <td>Rs&nbsp;<?php echo number_format($row['price'],2);?></td>
                   
                    <td>
                      <div class="input-group mb-3" style="max-width: 120px;">
                        <!-- <div class="input-group-prepend">
                          <button class="btn btn-outline-primary js-btn-minus" type="button">&minus;</button>
                        </div> -->
                        <input type="hidden" name="indexes[]" value="<?php echo $index; ?>">
                        <input type="number" class="form-control" min="1" value="<?php echo $_SESSION['qty_array'][$index];?>" name="qty_<?php echo $index;?>">
                        <!-- <div class="input-group-append">
                          <button class="btn btn-outline-primary js-btn-plus" type="button">&plus;</button>
                        </div> -->
                      </div>

                    </td>
                    <td>Rs &nbsp;<?php echo number_format($_SESSION['qty_array'][$index]*$row['price'],2);?></td>
                    <td><a href="deleteCart.php?id=<?php echo $row['id'];?>&index=<?php echo $index; ?>" class="btn btn-primary height-auto btn-sm">X</a></td>
                    <?php $total+=$_SESSION['qty_array'][$index]*$row['price']; ?>
                  </tr>

<?php

        $index ++;
        $_SESSION['t']=$total;
           
        }
      }
      else
      {
        ?>
        <tr>
          <td colspan="4" class="text-center">No Item in Cart</td>
        </tr>
        <?php
      }
      ?>
                
                </tbody>
              </table>
            </div>
          
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="row mb-5">
              <div class="col-md-6 mb-3 mb-md-0">
                <button type="submit" class="btn btn-primary btn-sm btn-block" name="save">Update Cart</button>
              </div>
              <div class="col-md-6">
                <a href="shop.php" class="btn btn-outline-primary btn-sm btn-block" style="padding-top: 10px;" > Continue Shopping</a>
                <a href="clearCart.php" class="btn btn-outline-primary btn-sm btn-block" style="padding-top: 10px;" > Clear Cart</a>
              </div>
            </div>
            
            </form>
           
          </div>
          <div class="col-md-6 pl-5">
            <div class="row justify-content-end">
              <div class="col-md-7">
                <div class="row">
                  <div class="col-md-12 text-right border-bottom mb-5">
                    <h3 class="text-black h4 text-uppercase">Cart Totals</h3>
                  </div>
                </div>
                
                <div class="row mb-5">
                  <div class="col-md-6">
                    <span class="text-black">Total</span>
                  </div>
                  <div class="col-md-6 text-right">
                    <strong class="text-black">RS&nbsp;<?php echo number_format($total,2);?></strong>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-12">
                  <?php
                  if(count($_SESSION['cart'])>0)
                  {
                  ?>
                    <a class="btn btn-primary btn-lg btn-block" href="checkout.php">Proceed To Checkout</a>
                  <?php
                  }else{
                    ?>
                    <a class="btn btn-primary btn-lg btn-block disabled" href="checkout.php">Proceed To Checkout</a>

                    <?php
                  }
                  ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

<?php include("footer.php");
exit;
?>