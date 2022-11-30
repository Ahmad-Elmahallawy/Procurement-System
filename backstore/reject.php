<?php
require 'connection2.php';

$id = $_GET['id'];
$query = "DELETE FROM form WHERE id = '$id';";
$result = mysqli_query($conn, $query);
if ($result) {
    echo"YES";
    header("location: product_backstore.php");
} else {
    echo "Error deleting record";
}
?>