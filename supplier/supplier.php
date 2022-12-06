<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://bootswatch.com/4/yeti/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/e73ec64d5b.js" crossorigin="anonymous"></script>
    <title>Supplies</title>
    <link rel="stylesheet" href="supplies.css">

</head>

<body>

    <?php
        require_once ('../header/header.php');
         // Update to our database
        if(isset($_POST['btn-add-supply'])){
        $servername = "localhost";
        $username = "username";
        $password = "password";
        $dbname = "soen341_db";

        $title = $_POST['title'];
        $supplier_name = $_POST['name'];
        $price = $_POST['price'];
        $sup_id = $_SESSION['id'];


        // Create connection
        $conn = new mysqli($servername,'root', '' , $dbname);
        // Check connection
        if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        }
        //check for table name
        $sql = "INSERT INTO products(product_name, price, image,supplier,supplier_id)
        VALUES ('$title','$price','NULL' , '$supplier_name', '$sup_id')";

        if ($conn->query($sql) === TRUE) {
            echo "<p class='success' style = 'background-color: green; color: white; text-align:center; ' onload = 'test()'>New record created successfully</p>";
        } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        }

        header('Location: supplier.php');
        $conn->close();
        }
        
    ?>

    <div class="wrapper">
        <div class="container mt-4">
            <h1 class="display-4 text-center"><i class="fa-solid fa-boxes-packing"></i> My <span
                    class="supplies">Supplies</span>List</h1>
            <form method="post" id="supply-form" onsubmit="return true">
                <div class="form-group">
                    <label for="title">Title</label>
                    <input required type="text" name="title" id="title" class="form-control">
                </div>
                <div class="form-group">
                    <label for="name">Supplier Name</label>
                    <input required type="text" name="name" id="name" class="form-control">
                </div>
                <div class="form-group">
                    <label for="price">Price ($)</label>
                    <input required type="number" name="price" id="price" class="form-control">
                </div>

                <input value="Add Supply" name="btn-add-supply" type="submit" class="btn btn-primary btn-block">

            </form>
            <table class="table table-striped mt-5">
                <thread>
                    <tr>
                        <th>Title</th>
                        <th>Supplier Name</th>
                        <th>Price ($)</th>
                        <th></th>
                    </tr>
                </thread>
                <tbody id="supply-list">
                    <?php
                        if(isset($_SESSION['id']))
                        {
                            $sup_id = $_SESSION['id'];
                            $select = " SELECT product_name,price,supplier, supplier_id FROM products WHERE supplier_id = '$sup_id'";
                            $result = mysqli_query($conn, $select);
                            while($row = mysqli_fetch_assoc($result))
                            {
                                echo "<tr>"; 
                                echo "<td>" .$row['product_name'] ."</td>";
                                echo "<td>" .$row['supplier'] ."</td>";
                                echo "<td>" .$row['price'] ."</td>";
                                echo "<td><a href='#' class='delete'>X</a></td>";
                                echo "</tr>"; 
                            }
                            
                            
                        }
                    
                    
                    ?>
                </tbody>
            </table>
            <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
            <script>
            $(document).on('click', '.delete', function()  {
                var row = $(this).closest('tr');
                var product = $row[0].val();
                var supplier = $row[1].val();
                var price = $row[2].val();
                
                $.ajax({
                    type: "POST",
                    data: {product: product, supplier: supplier, price: price},
                    dataType: 'JSON',
                    url: "deletesupplier.php",
                    success: function(msg){
                    $('.answer').html(msg);
                }
                });
            });
            </script>

        </div>
    </div>
</body>

</html>

