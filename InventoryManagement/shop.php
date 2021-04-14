<?php
include 'header.php';
include 'connection.php';
$sql="select * from shoe";
$result= mysqli_query($conn,$sql);
?>
<script>
window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function(){
        $(this).remove(); 
    });
}, 2000);
</script>
<div class="products-wrap border-top-0">
      <div class="container">
                <div class="row">
          <div class="title-section text-center col-12" id="style_h" >
            <h2 class="text-uppercase"  style="margin-top: 7%; margin-bottom: 5%;"> Products</h2>
            <?php if(isset($_SESSION['message'])){?>
            <div class="alert alert-success" id="success-alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <?php echo $_SESSION['message'];?> 
            </div>
            <?php
            }
            ?>
          </div>
        </div>
        <div class="row no-gutters products">
        <?php
        while($row=mysqli_fetch_assoc($result)){
            ?>
            <div class="col-4 col-md-4 col-lg-4 border-top" style="border-bottom: none; border-top: none; ">
        <a href="item.php?id=<?php echo $row['id'] ?>" class="item">
          <img src="shoe.jpg" alt="Image" class="img-fluid" >
          </a>
          <div class="item-info">
            <h3><?php echo $row['name'] ?></h3>
            <span class="collection d-block">Color : <?php echo $row['color'] ?></span>
            <span class="collection d-block">Size : <?php echo $row['size'] ?></span>
            <strong class="price">Rs&nbsp;<?php echo $row['price'] ?>/-</strong>
            <div style="width: 150px; margin: 0 auto; background: #207dff; text-align: center; padding: 10px; margin-top: 5px; margin-bottom: 10px; " onMouseOver="this.style.color='gray'"
        onMouseOut="this.style.color='green'">
<a href="addcart.php?id=<?php echo $row['id']; ?>" style=" color: white; text-decoration: none; font-weight:bold; "><i class="fa fa-lg fa-shopping-cart"></i>Add Cart</a>
</div>
          </div>
       
      </div>

            <?php
        }
        ?>
    </div>
</div>
</div>   
<?php
include 'footer.php';
?>