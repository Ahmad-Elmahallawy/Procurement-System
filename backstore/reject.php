<?php

$hostname = 'localhost';
$db_username = 'root';
$db_password = '';
$db_name = "soen341_db";

$id = $_GET['id'];
$image = $_GET['image'];
$user_name = $_GET['user_name'];
$product_name = $_GET['product_name'];
$quantity = $_GET['quantity'];
$price = $_GET['price'];
$status='Rejected';

//DB connection
$conn = mysqli_connect($hostname,$db_username,$db_password,$db_name);
if ($conn -> connect_error){
    die("Connection to the DB failed: ".$conn->connect_error);
}else{
    $stmt= $conn->prepare("INSERT INTO cart (user_name,product_name,image,quantity,price,status) VALUES(?,?,?,?,?,?)");
    $stmt->bind_param("sssiis",$user_name,$product_name,$image,$quantity,$price,$status);
    $result = $stmt->execute();
    if($result){
        echo "Rejected Item Inserted to Cart";
    }else{
        echo "Error moving record to Cart table";
    }

    $query = "DELETE FROM pending WHERE id = '$id';";
    $result = mysqli_query($conn, $query);
    if ($result) {
        echo"Deleted";
        header("location: product_backstore.php");
    } else {
        echo "Error deleting record from Pending table";
    }         

}
?>