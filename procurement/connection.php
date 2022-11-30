<?php
$description = $_POST['description'];
$quantity = $_POST['quantity'];


//Database connction
$conn = new mysqli ('localhost','root','','test');
if ($conn -> connect_error){
    die("Connection to the DB failed: ".$conn->connect_error);
}else{
    $stmt= $conn->prepare("INSERT INTO form (description,quantity) VALUES(?,?)");
    $stmt->bind_param("si",$description,$quantity);
    $stmt->execute();
    echo    '<script type="text/javascript">
    window.onload = function () { alert("RFQ sent for Approval");  location="procurement.php";}
</script>';
    $stmt->close();
    $conn->close();
}
?>