<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Product Backstore</title>
    <link rel="stylesheet" href="PB.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="shortcut icon" href="images/logo2.png" />
</head>

<body>

    <?php 
        require_once ('../header/header.php');
    ?>

    <div class="wrapper">
        <div class="container">

            <div class='title'>
                <h3> Pending Quotation Requests </h3>
            </div>

            <table class="table">
                <div class="row">
                    <tr>
                        <th scope="col"> Image </th>
                        <th scope="col"> User </th>
                        <th scope="col"> Product</th>
                        <th scope="col"> Quantity</th>
                        <th scope="col"> Price</th>
                        <th scope="col"> Total</th>
                        <th scope="col"> Supplier</th>
                        <th scope="col" colspan="2"> Action</th>
                    </tr>

                    <!-- fetching data from database -->
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
                            mysqli_query($conn, "UPDATE `pending` SET supplier = '$supplier' WHERE product_name = '$product_name' AND id = '$id'") or die('query failed');
                        }

                        $pending_query = mysqli_query($conn, "SELECT * FROM `pending`") or die('query failed');
                        if(mysqli_num_rows($pending_query) > 0){
                            while($fetch_pending = mysqli_fetch_assoc($pending_query)){
                    ?>
                                <tr>
                                    <td><img id='img' src="../images/<?php echo $fetch_pending['image'];?>"><?php echo ($fetch_pending['image'] == NULL)?'No Image':''?></td>
                                    <td><?php echo $fetch_pending['user_name'];?></td>
                                    <td><?php echo $fetch_pending['product_name'];?></td>
                                    <td><?php echo $fetch_pending['quantity'];?></td>
                                    <td>$<?php echo $fetch_pending['price'];?></td>
                                    <td>$<?php echo $total = ($fetch_pending['price']*$fetch_pending['quantity']);?></td>
                                    <td>
                                        <?php if ($fetch_pending['supplier'] == null) {?>
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
                                                <input type="hidden" name="row_id" value="<?php echo $fetch_pending['id'];?>">
                                                <input type="hidden" name="product_name" value="<?php echo $fetch_pending['product_name'];?>">
                                                <input type="submit" value="Submit" name="submit">
                                            </form>     
                                    <?php
                                        }
                                        else {
                                            echo $fetch_pending['supplier'];
                                        }
                                    ?>
                                    </td>
                                    <td> 
                                        <a class="btn" href="accept.php?supplier=<?php echo $fetch_pending['supplier'];?>&image=<?php echo $fetch_pending['image'];?>&id=<?php echo $fetch_pending['id'];?>&user_id=<?php echo $fetch_pending['user_id'];?>&user_name=<?php echo $fetch_pending['user_name'];?>&product_name=<?php echo $fetch_pending['product_name'];?>&quantity=<?php echo $fetch_pending['quantity'];?>&price=<?php echo $fetch_pending['price'];?>"> Approve 
                                    </td>
                                    <td> 
                                        <a class="btn" href="reject.php?supplier=<?php echo $fetch_pending['supplier'];?>&image=<?php echo $fetch_pending['image'];?>&id=<?php echo $fetch_pending['id'];?>&user_id=<?php echo $fetch_pending['user_id'];?>&user_name=<?php echo $fetch_pending['user_name'];?>&product_name=<?php echo $fetch_pending['product_name'];?>&quantity=<?php echo $fetch_pending['quantity'];?>&price=<?php echo $fetch_pending['price'];?>"> Reject 
                                    </td>
                                </tr>
                    <?php 
                            }

                        }
                    ?>
                </div>  
            </table>
        </div>
    </div>
</body>
</html>