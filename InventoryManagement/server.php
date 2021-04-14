<?php 
  $conn = mysqli_connect('localhost', 'root', '', 'inventory');
  if (!$conn) {
    die('Connection failed ' . mysqli_error($conn));
  }

  if (isset($_POST['save'])) {
    $article = $_POST['article'];
    $name = $_POST['name'];
    $color = $_POST['color'];
    $price = $_POST['price'];
  	$size = $_POST['size'];
  	$quantity = $_POST['quantity'];
  	$specification = $_POST['specification'];
  	$sql = "INSERT INTO shoe (`article_number`, `name`, `color`, `size`, `specifications`, `price`, `quantity`) VALUES ('{$article}','{$name}','{$color}','{$size}','{$specification}','{$price}','{$quantity}')";
  	if (mysqli_query($conn, $sql)) {
  	$id = mysqli_insert_id($conn);
    $query = "SELECT * FROM shoe";
    $result = mysqli_query($conn, $query);
    $data="<tbody>";
    while ($row = mysqli_fetch_array($result)) {
        $data.="<tr><td>".$row['id']."</td><td>".$row['article_number']."</td><td>".$row['name']."</td><td>".$row['color']."</td><td>".$row['size']."</td><td>".$row['price']."</td><td>".$row['quantity']."</td><td>".$row['specifications']."</td><td><button id='editBtn' value=".$row['id'].">Edit</button><button id='deleteBtn' value=".$row['id'].">Delete</button></td></tr>";
    }
    $data.="</tbody>";
    echo $data;
    mysqli_close($conn);
  	}
  	exit();
  }
  // delete comment fromd database
  if (isset($_GET['delete'])) {
  	$id = $_GET['id'];
  	$sql = "DELETE FROM shoe WHERE id=" . $id;
      mysqli_query($conn, $sql);
      $query = "SELECT * FROM shoe";
    $result = mysqli_query($conn, $query);
    $data="<tbody>";
    while ($row = mysqli_fetch_array($result)) {
        $data.="<tr><td>".$row['id']."</td><td>".$row['article_number']."</td><td>".$row['name']."</td><td>".$row['color']."</td><td>".$row['size']."</td><td>".$row['price']."</td><td>".$row['quantity']."</td><td>".$row['specifications']."</td><td><button id='editBtn' value=".$row['id'].">Edit</button><button id='deleteBtn' value=".$row['id'].">Delete</button></td></tr>";
    }
    $data.="</tbody>";
    echo $data;
    mysqli_close($conn);
  	exit();
  }
  if (isset($_POST['edit'])) {
  	$id = $_POST['id'];
  	$article = $_POST['article'];
    $name = $_POST['name'];
    $color = $_POST['color'];
    $price = $_POST['price'];
  	$size = $_POST['size'];
  	$quantity = $_POST['quantity'];
  	$specification = $_POST['specification'];
  	$sql = "UPDATE shoe SET article_number='{$article}',name='{$name}',color='{$color}',size='{$size}',price='{$price}',quantity='{$quantity}',specifications='{$specification}' WHERE id=".$id;
  	if (mysqli_query($conn, $sql)) {
  		$id = mysqli_insert_id($conn);
  		$query = "SELECT * FROM shoe";
    $result = mysqli_query($conn, $query);
    $data="<tbody>";
    while ($row = mysqli_fetch_array($result)) {
        $data.="<tr><td>".$row['id']."</td><td>".$row['article_number']."</td><td>".$row['name']."</td><td>".$row['color']."</td><td>".$row['size']."</td><td>".$row['price']."</td><td>".$row['quantity']."</td><td>".$row['specifications']."</td><td><button id='editBtn' value=".$row['id'].">Edit</button><button id='deleteBtn' value=".$row['id'].">Delete</button></td></tr>";
    }
    $data.="</tbody>";
    echo $data;
    mysqli_close($conn);
  	}else {
  	  echo "Error: ". mysqli_error($conn);
  	}
  	exit();
  }
if(isset($_POST['display']))
{
    $query = "SELECT * FROM shoe";
    $result = mysqli_query($conn, $query);
    $data="<tbody>";
    while ($row = mysqli_fetch_array($result)) {
        $data.="<tr><td>".$row['id']."</td><td>".$row['article_number']."</td><td>".$row['name']."</td><td>".$row['color']."</td><td>".$row['size']."</td><td>".$row['price']."</td><td>".$row['quantity']."</td><td>".$row['specifications']."</td><td><button id='editBtn' value=".$row['id'].">Edit</button><button id='deleteBtn' value=".$row['id'].">Delete</button></td></tr>";
    }
    $data.="</tbody>";
    echo $data;
    mysqli_close($conn);
    exit();
}
?>