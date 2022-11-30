<?php
require 'connection2.php';

$id = $_GET['id'];
$quantity = $_GET['quantity'];
$name = $_GET['description'];

if ($conn -> connect_error){
    die("Connection to the DB failed: ".$conn->connect_error);
}else{
    $stmt= $conn->prepare("INSERT INTO cart (name,quantity) VALUES(?,?)");
    $stmt->bind_param("si",$name,$quantity);
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