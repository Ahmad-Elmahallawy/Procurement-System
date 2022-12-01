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


//DB connection
$conn = new mysqli ($hostname,$db_username,$db_password,$db_name);
if ($conn -> connect_error){
    die("Connection to the DB failed: ".$conn->connect_error);
}else{
    $stmt= $conn->prepare("INSERT INTO pending (user_name,product_name,quantity,price,image) VALUES(?,?,?,?,?)");
    $stmt->bind_param("ssiis",$user_name,$product_name,$quantity,$price,$image);
    $stmt->execute();
    echo    '<script type="text/javascript">
    window.onload = function () { alert("RFQ sent for Approval");  location="procurement.php";}
</script>';
    $stmt->close();
    $conn->close();
}
?>