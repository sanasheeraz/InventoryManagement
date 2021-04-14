<?php
include 'header.php';

?>
<div class="custom-border-bottom py-3">
  <div class="container">
    <div class="row">
      <div class="col-md-12 mb-0"><a href="index.php">Home</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Contact</strong></div>
    </div>
  </div>
</div>
<div class="site-section">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h2 class="h3 mb-3 text-black">Add Product</h2>
      </div>
      <div class="col-md-12">
        <div class="p-3 p-lg-5 border">
          <div class="form-group row">
            <div class="col-md-6">
              <label for="article">Article Number:</label>
              <input type="text" class="form-control" name="article" id="article">
            </div>
            <div class="col-md-6">
              <label for="name">Name:</label>
              <input type="text" class="form-control" name="name" id="name">
            </div>
          </div>
          <div class="form-group row">
            <div class="col-md-6">
              <label for="color">Color:</label>
              <input type="text" class="form-control" name="color" id="color">
            </div>
            <div class="col-md-6">
              <label for="size">Size:</label>
              <input type="number" class="form-control" name="size" id="size">
            </div>
          </div>
          <div class="form-group row">
            <div class="col-md-6">
              <label for="price">Price:</label>
              <input type="number" class="form-control" name="price" id="price">
            </div>
            <div class="col-md-6">
              <label for="quantity">Quantity:</label>
              <input type="number" class="form-control" name="quantity" id="quantity">
            </div>
          </div>
          <div class="form-group row">
            <div class="col-lg-12">
              <label for="specification">Specification:</label>
              <textarea name="specification" class="form-control" id="specification" cols="30" rows="5"></textarea>
            </div>
          </div>
          <div class="col-lg-12" style="display:flex; justify-content: center;">
            <button type="submit" name="sub" id="submitbtn" class="btn btn-primary col-lg-6 ">Insert</button>
            <button type="submit" name="update" id="Updatebtn" class="btn btn-primary" style="display:none">Update</button>
          </div>
        </div>

      </div>

    
     <div class="col-lg-12">
     <h1>All Products</h1>
     <table class="table" id="MyTbl">
        
        </table>
     </div>
      </div>
    </div>
  </div>
<?php
include 'footer.php';
?>