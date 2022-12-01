<?php

include '../backstore/connection2.php';
session_start();
// $user_id = $_SESSION['user_id'];

// if(!isset($user_id)){
//    header('location:../login.php');
// };

// if(isset($_GET['logout'])){
//    unset($user_id);
//    session_destroy();
//    header('location:./login.php');
// };

$user_name = $_SESSION['user_name'];

// Clear the cart after it is rejected
if(isset($_GET['rejected'])){
  mysqli_query($conn, "DELETE FROM `cart` WHERE user_name = '$user_name'") or die('query failed');

  //send message to the user I was thinking maybe we make another field ??
  mysqli_query($conn, "UPDATE `user_form` SET quote = 'rejected'") or die('query failed');

  // go to the rfq pages to approve/reject your next quotation
  header('location:../index.php');
}

// Clear the cart after it is approved
if(isset($_GET['rejected'])){
  mysqli_query($conn, "DELETE FROM `cart` WHERE user_name = '$user_name'") or die('query failed');

  //send message to the user I was thinking maybe we make another field ??
  mysqli_query($conn, "UPDATE `user_form` SET quote = 'approved'") or die('query failed');

  // go to the rfq pages to approve/reject your next quotation
  header('location:../index.php');
}

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
      </thead>
      <tbody>
      <?php
         $cart_query = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_name = 'karin'") or die('query failed');
         $grand_total = 0;
         if(mysqli_num_rows($cart_query) > 0){
            while($fetch_cart = mysqli_fetch_assoc($cart_query)){
      ?>
         <tr>
            <td><img src="../images/<?php echo $fetch_cart['image']; ?>" height="100" alt=""></td>
            <td><?php echo $fetch_cart['product_name']; ?></td>
            <td><?php echo $fetch_cart['quantity']; ?></td>
            <td>$<?php echo $sub_total = ($fetch_cart['price'] * $fetch_cart['quantity']); ?></td>
         </tr>
      <?php
         $grand_total += $sub_total;
            }
         }else{
            echo '<tr><td style="padding:20px; text-transform:capitalize;" colspan="6">No Items</td></tr>';
         }
      ?>
      <tr class="table-bottom">
         <td colspan="3" style="text-align: right; padding-right: 5em">Final Amount :</td>
         <td>$<?php echo $grand_total; ?></td>
      </tr>
   </tbody>
   </table>

   <div class="flex">
      <a href="../index.php?rejected" class="reject-btn <?php echo ($grand_total > 1)?'':'disabled'; ?>" onclick="return confirm('Are you sure you want to reject?')">Reject Final Quotation</a>
      <a href="../index.php?approved" class="approve-btn <?php echo ($grand_total > 1)?'':'disabled'; ?>" onclick="return confirm('Are you sure you want to approve?')">Approve of Quotation</a>
   </div>
   

</div>

</div>
<!-- this is for automatic approval for quotations under $5000 -->
<script type="text/javascript">
   window.onload = function() {
      var total = "<?php echo $grand_total; ?>";
      if (total <= 5000) {
         var approve = document.getElementsbyName("approve-btn")[0];
         approve.submit.click();
      }
   }
   
</script>

</body>
</html>