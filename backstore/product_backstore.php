<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Product Backstore</title>
    <link rel="stylesheet" href="PB.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="shortcut icon" href="images/logo2.png" />
</head>

<body>

    <?php
        include_once 'connection2.php'; 
        require_once ('../header/header.php');
    ?>
    <script>
        function DConfirm() {
            confirm("Are you sure to reject the RFQ?");
        }
        function AConfirm() {
            confirm("Are you sure to accept the RFQ?");
        }
    </script>

    <div class="wrapper">
        <div class="container">

            <div class='title'>
                <h3> Pending Quotation Requests </h3>
            </div>

            <table class="table">
                <div class="row">
                    <tr>
                        <th scope="col"> ID </th>
                        <th scope="col"> Description</th>
                        <th scope="col"> Quantity</th>
                        <th scope="col"> Action</th>
                    </tr>

                    <!-- fetching data from database -->
                    <?php
                        $sql = "SELECT * FROM form;";
                        $result = mysqli_query($conn, $sql);
                        $resultCheck = mysqli_num_rows($result);

                        if ($resultCheck > 0) {
                            while($row = mysqli_fetch_assoc($result)){ 
                    ?>
                                <tr>
                                    <td><?php echo $row['id'];?></td>
                                    <td><?php echo $row['description'];?></td>
                                    <td><?php echo $row['quantity'];?></td>
                                    <td> 
                                        <a class="btn" onclick="AConfirm()" href="accept.php?id=<?php echo $row['id'];?>&description=<?php echo $row['description'];?>&quantity=<?php echo $row['quantity'];?>"> Accept 
                                    </td>
                                    <td> 
                                        <a class="btn" onclick="DConfirm()" href="reject.php?id=<?php echo $row['id'];?>"> Reject 
                                    </td>
                                </tr>
                    <?php 
                            }

                        }
                    ?>
                </div>  
            </table>
        </div>
    </div>
</body>
</html>