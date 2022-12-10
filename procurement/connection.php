<?php
include '../procurement/procurement.php';

$hostname='localhost';
$db_username = 'root';
$db_password='';
$db_name='soen341_db';

$product_name = $_POST['product_name'];
$price= $_POST['price'];
$image = NULL;
$quantity = $_POST['quantity'];
$status = 'Approved';


//DB connection
$conn = mysqli_connect ($hostname,$db_username,$db_password,$db_name);
if ($conn -> connect_error){
    die("Connection to the DB failed: ".$conn->connect_error);
}elseif ($quantity*$price >= 5000) {
    $supplier = NULL;
    $stmt= $conn->prepare("INSERT INTO pending (user_id,user_name,product_name,price,image,quantity,supplier) VALUES(?,?,?,?,?,?,?)");
    $stmt->bind_param("issisis",$user_id,$user_name,$product_name,$price,$image,$quantity,$supplier);
    $stmt->execute();
    echo    
        '<script type="text/javascript">
    window.onload = function () { alert("RFQ sent for Approval");  location="procurement.php";}
        </script>';
}else{
    $stmt= $conn->prepare("INSERT INTO cart (user_id,user_name,product_name,price,image,quantity,status,supplier) VALUES(?,?,?,?,?,?,?,?)");
    $stmt->bind_param("issisiss",$user_id,$user_name,$product_name,$price,$image,$quantity,$status,$supplier);
    $result = $stmt->execute();
    echo    
        '<script type="text/javascript">
    window.onload = function () { alert("Item added to your cart");  location="procurement.php";}
        </script>';

}
?>