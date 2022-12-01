<?php
require 'connection2.php';

$id = $_GET['id'];
$image = $_GET['image'];
$user_name = $_GET['user_name'];
$product_name = $_GET['product_name'];
$quantity = $_GET['quantity'];
$price = $_GET['price'];


if ($conn -> connect_error){
    die("Connection to the DB failed: ".$conn->connect_error);
}else{
    $stmt= $conn->prepare("INSERT INTO cart (user_name,product_name,quantity,price) VALUES(?,?,?,?)");
    $stmt->bind_param("ssii",$user_name,$product_name,$quantity,$price);
    $result = $stmt->execute();
    if($result){
        echo "Inserted to Cart";
    }else{
        echo "Error moving record to Cart table";
    }

    $query = "DELETE FROM form WHERE id = '$id';";
    $result = mysqli_query($conn, $query);
    if ($result) {
        echo"Deleted";
        header("location: product_backstore.php");
    } else {
        echo "Error deleting record from Pending table";
    }         

}
?>