<?php

include '../login-and-signup/config.php';

$id = $_GET['id'];
$supplier = $_GET['supplier'];
$user_id = $_GET['user_id'];
$image = $_GET['image'];
$user_name = $_GET['user_name'];
$product_name = $_GET['product_name'];
$quantity = $_GET['quantity'];
$price = $_GET['price'];
$status='Approved';

//DB connection
if ($conn -> connect_error){
    die("Connection to the DB failed: ".$conn->connect_error);
}else{
    $stmt= $conn->prepare("INSERT INTO cart (user_id,user_name,product_name,price,image,quantity,status,supplier) VALUES(?,?,?,?,?,?,?,?)");
    $stmt->bind_param("issisiss",$user_id,$user_name,$product_name,$price,$image,$quantity,$status,$supplier);
    $result = $stmt->execute();
    echo 
        '<script type="text/javascript">
    window.onload = function () { alert("Approved Product Added to the Users Cart with Status Accepted");  location="product_backstore.php";}
        </script>';
    

    $query = "DELETE FROM pending WHERE id = '$id';";
    $result = mysqli_query($conn, $query);
  
}
?>