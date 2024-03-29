<?php
require_once ('../header/header.php');
include '../login-and-signup/config.php';
$user_id = $_SESSION['id'];

if(!isset($user_id)){
   header('location:../login-and-signup/login.php');
} else {
   $select = " SELECT * FROM user_form WHERE id = '$user_id'";
   $result = mysqli_query($conn, $select);
   $row = mysqli_fetch_array($result);
   $user_name = $row['user_name'];
}


if(isset($_POST['add_to_pending'])){
   $product_name = $_POST['product_name'];
   $product_price = $_POST['product_price'];
   $product_image = $_POST['product_image'];
   $product_quantity = $_POST['product_quantity'];
   $supplier = NULL;
   
$select_pending = mysqli_query($conn, "SELECT * FROM `pending` WHERE product_name = '$product_name' AND user_id = '$user_id' AND quantity = '$product_quantity'") or die('query failed');
$select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE product_name = '$product_name' AND user_id = '$user_id' AND quantity = '$product_quantity'") or die('query failed');

if(mysqli_num_rows($select_pending) > 0){
   $message[] = 'This RFQ has already been submitted for approval!';
}else if(mysqli_num_rows($select_cart) > 0){
   $message[] = 'This RFQ has already been submitted and approved!';
}else if ($product_price * $product_quantity >= 5000)
{
   mysqli_query($conn, "INSERT INTO `pending`(user_id, user_name, product_name, price, image, quantity, supplier) VALUES('$user_id', '$user_name', '$product_name', '$product_price', '$product_image', '$product_quantity', '$supplier')") or die('query failed');
   $message[] = 'RFQ submitted for approval!';
}
else {
   mysqli_query($conn, "INSERT INTO `cart`(user_id, user_name, product_name, price, image, quantity, status, supplier) VALUES('$user_id', '$user_name', '$product_name', '$product_price', '$product_image', '$product_quantity', 'Approved', '$supplier')") or die('query failed');
   $message[] = 'RFQ submitted for approval!';
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
   if(isset($message)){
      foreach($message as $message){
         echo    '<script type="text/javascript">
         window.onload = function () { alert("'.$message.'");}
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
      <form method="post" class="box" action="">
         <img src="../images/<?php echo $fetch_product['image']; ?>" alt="">
         <div class="name"><?php echo $fetch_product['product_name']; ?></div>
         <input type="number" min="1" name="product_quantity" value="1">
         <input type="hidden" name="product_image" value="<?php echo $fetch_product['image']; ?>">
         <input type="hidden" name="product_name" value="<?php echo $fetch_product['product_name']; ?>">
         <input type="hidden" name="product_price" value="<?php echo $fetch_product['price']; ?>">
         <input type="submit" value="Generate RFQ" name="add_to_pending" class="btn">
      </form>
   <?php
      };
   };
   ?>

   </div>

</div>


</body>
</html>