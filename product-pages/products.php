<?php

include '../backstore/connection2.php';

// hardcode username for now
$user_name = 'karin';

if(!isset($user_name)){
   header('location:../login-and-signup/login.php');
};

$product_name = $_POST['product_name'];
$product_price = $_POST['product_price'];
$product_image = $_POST['product_image'];
$product_quantity = $_POST['product_quantity'];

if(isset($_POST['add_to_cart'])){

   $select_cart = mysqli_query($conn, "SELECT * FROM `pending` WHERE product_name = '$product_name' AND user_name = '$user_name'") or die('query failed');

   if(mysqli_num_rows($select_cart) > 0){
      $message[] = 'product already added!';
   }else{
      mysqli_query($conn, "INSERT INTO `pending`(user_name, product_name, price, image, quantity) VALUES('$user_name', '$product_name', '$product_price', '$product_image', '$product_quantity')") or die('query failed');
      $message[] = 'product added!';
   }

};

if ($conn -> connect_error){
   die("Connection to the DB failed: ".$conn->connect_error);
}elseif ($product_quantity*$product_price >= 5000) {
   $stmt= $conn->prepare("INSERT INTO pending (user_name, product_name, quantity, price, image) VALUES(?,?,?,?,?)");
   $stmt->bind_param("ssiis",$user_name, $product_name, $product_quantity, $product_price, $product_image);
   $stmt->execute();
   echo
       '<script type="text/javascript">
   window.onload = function () { alert("RFQ sent for Approval");  location="procurement.php";}
       </script>';
}else{
   $stmt= $conn->prepare("INSERT INTO cart (user_name, product_name, image, quantity, price, status) VALUES(?,?,?,?,?,?)");
   $stmt->bind_param("sssiis",$user_name, $product_name, $product_quantity, $product_price, $product_image, $status);
   $result = $stmt->execute();

   if($result){
       echo "Approved Item Inserted to Cart";
       header("location: procurement.php");
   }else{
       echo "Error moving record to Cart table";
   }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://bootswatch.com/4/yeti/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/e73ec64d5b.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./products_style.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
      <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <title> Products </title>
  </head>
<body>


   
<?php
require_once ('../header/header.php');
if(isset($message)){
   foreach($message as $message){
      echo    '<script type="text/javascript">
      window.onclick = function () { alert("'.$message.'");}
  </script>';
   }
}
?>

<div class="container">

<div class="products">

   <h1 class="heading">Products We Offer</h1>

   <div class="box-container">

   <?php
      $select_product = mysqli_query($conn, "SELECT * FROM `products`") or die('query failed');
      if(mysqli_num_rows($select_product) > 0){
         while($fetch_product = mysqli_fetch_assoc($select_product)){
   ?>
      <form method="post" class="box" action="../">
         <img src="../images/<?php echo $fetch_product['image']; ?>" alt="">
         <div class="name"><?php echo $fetch_product['product_name']; ?></div>
         <input type="number" min="1" name="product_quantity" value="1">
         <input type="hidden" name="product_image" value="<?php echo $fetch_product['image']; ?>">
         <input type="hidden" name="product_name" value="<?php echo $fetch_product['product_name']; ?>">
         <input type="hidden" name="product_price" value="<?php echo $fetch_product['price']; ?>">
         <input type="submit" value="Generate RFQ" name="add_to_cart" class="btn">
      </form>
   <?php
      };
   };
   ?>

   </div>

</div>


</body>
</html>