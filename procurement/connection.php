<?php
$hostname='localhost';
$db_username = 'root';
$db_password='';
$db_name='soen341_db';

$user_name = 'karin';
$product_name = $_POST['product_name'];
$quantity = $_POST['quantity'];
$price= $_POST['price'];
$image = NULL;
$status = 'Approved';


//DB connection
$conn = mysqli_connect ($hostname,$db_username,$db_password,$db_name);
if ($conn -> connect_error){
    die("Connection to the DB failed: ".$conn->connect_error);
}elseif ($quantity*$price >= 5000) {
    $stmt= $conn->prepare("INSERT INTO pending (user_name,product_name,quantity,price,image) VALUES(?,?,?,?,?)");
    $stmt->bind_param("ssiis",$user_name,$product_name,$quantity,$price,$image);
    $stmt->execute();
    echo    
        '<script type="text/javascript">
    window.onload = function () { alert("RFQ sent for Approval");  location="procurement.php";}
        </script>';
}else{
    $stmt= $conn->prepare("INSERT INTO cart (user_name,product_name,image,quantity,price,status) VALUES(?,?,?,?,?,?)");
    $stmt->bind_param("sssiis",$user_name,$product_name,$image,$quantity,$price,$status);
    $result = $stmt->execute();

    if($result){
        echo "Approved Item Inserted to Cart";
        header("location: procurement.php");
    }else{
        echo "Error moving record to Cart table";
    }

}
?>