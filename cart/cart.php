<?php
//session_start();

$user_name = "karin";

?>

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
         <th>Status</th>
      </thead>
      <tbody>
      <?php
         $hostName = 'localhost';
         $dbUsername = 'root';
         $dbPassword = '';
         $dbName = "soen341_db";
         
         $conn = mysqli_connect($hostName,$dbUsername,$dbPassword,$dbName);

         $cart_query = mysqli_query($conn, "SELECT * FROM cart WHERE user_name = 'karin'") or die('query failed');
         $grand_total = 0;
         if(mysqli_num_rows($cart_query) > 0){
            while($fetch_cart = mysqli_fetch_assoc($cart_query)){
      ?>

      
         <tr>
              
            <td><img src="images/<?php echo $fetch_cart['image']; ?>" height="100" alt=""><?php echo ($fetch_cart['image'] == NULL)?'Unavailable':''?></td>
            <td><?php echo $fetch_cart['product_name'];?></td>
            <td><?php echo $fetch_cart['quantity'];?></td>
            <td>$<?php echo $sub_total = ($fetch_cart['price'] * $fetch_cart['quantity']);?></td>
            <td><?php echo $fetch_cart['status'];?></td>
         </tr>
      <?php
         $grand_total += $sub_total;
            }
         }else{
            echo '<tr><td style="padding:20px; text-transform:capitalize;" colspan="6">No Items</td></tr>';
         }
      ?>
   </tbody>
   </table>


</div>

</div>

</body>
</html>