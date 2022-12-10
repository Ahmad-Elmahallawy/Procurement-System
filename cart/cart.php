<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title></title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="./cart_style.css">

</head>
<body>

<?php
require_once ('../header/header.php');
?>

<div class="container">

<div class="shopping-cart">

   <h1 class="heading">Order Summary</h1>

   <table>
      <thead>
         <th>Image</th>
         <th>Product</th>
         <th>Quantity</th>
         <th>Price</th>
         <th>Supplier</th>
         <th>Status</th>
      </thead>
      <tbody>
      <?php
         include '../login-and-signup/config.php';
         
         $user_id = $_SESSION['id'];

         if(!isset($user_id)){
            header('location:../login-and-signup/login.php');
         }

         if(isset($_POST['submit'])){
            $id = $_POST['row_id'];
            $product_name = $_POST['product_name'];
            $supplier = $_POST['suppliers'];
            mysqli_query($conn, "UPDATE `cart` SET supplier = '$supplier' WHERE product_name = '$product_name' AND id = '$id'") or die('query failed');
         }

         $cart_query = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
         $grand_total = 0;
         if(mysqli_num_rows($cart_query) > 0){
            while($fetch_cart = mysqli_fetch_assoc($cart_query)){
      ?>
         <tr>
            <td><img src="../images/<?php echo $fetch_cart['image']; ?>" height="100" alt=""><?php echo ($fetch_cart['image'] == 'NULL')?'No Image':''?></td>
            <td><?php echo $fetch_cart['product_name'];?></td>
            <td><?php echo $fetch_cart['quantity'];?></td>
            <td>$<?php echo $sub_total = ($fetch_cart['price'] * $fetch_cart['quantity']);?></td>
            <td>
               <?php 
                  if ($fetch_cart['supplier'] == NULL) {
               ?>
                     <form method="post" action="">
                        <select name='suppliers' id='suppliers'>
                           <option selected disabled>Select Supplier</option>
                     <?php
                     $user_query = mysqli_query($conn, "SELECT * FROM `user_form`") or die('query failed');
                     if(mysqli_num_rows($user_query) > 0){
                        while($row = mysqli_fetch_assoc($user_query)){
                           if($row['user_type'] == 'supplier')
                           {
                           ?>
                              <option value=<?php echo $row['user_name']; ?>><?php echo $row['user_name']; ?></option>
                           <?php
                           }
                        }
                     }
                     ?>
                        </select>
                        <input type="hidden" name="row_id" value="<?php echo $fetch_cart['id'];?>">
                        <input type="hidden" name="product_name" value="<?php echo $fetch_cart['product_name'];?>">
                        <input type="submit" value="Submit" name="submit">
                     </form>     
               <?php
                  }
                  else {
                     echo $fetch_cart['supplier'];
                  }
               ?>
            </td>
            <td><?php echo $fetch_cart['status'];?></td>
         </tr>
      <?php
         $grand_total += $sub_total;
            }
         }
      ?>
   </tbody>
   </table>


</div>

</div>

</body>
</html>