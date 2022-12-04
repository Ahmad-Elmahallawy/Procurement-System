<?php
        include "supplier.php";
        $title = $_POST['product'];
        $supplier_name = $_POST['supplier'];
        $price = $_POST['price'];

        require_once ('../header/header.php');
         // Update to our database
        $servername = "localhost";
        $username = "username";
        $password = "password";
        $dbname = "soen341_db";

        // Create connection
        $conn = new mysqli($servername,'root', '' , $dbname);
        // Check connection
        if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        }
        //check for table name
        $sql = "DELETE FROM products WHERE product_name = '$title' AND price = '$price' AND supplier = '$supplier_name';
        if ($conn->query($sql) === TRUE) {
            echo "<p class='success' style = 'background-color: green; color: white; text-align:center; ' onload = 'test()'>New record created successfully</p>";
        } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        }

        header('Location: supplier.php');
        $conn->close();
    ?>