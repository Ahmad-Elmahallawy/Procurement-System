<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Product Backstore</title>
    <link rel="stylesheet" href="product_backstore_style.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="shortcut icon" href="images/logo2.png" />
</head>

<body>
    <script type="text/javascript" src="../delete.js"></script>

    <?php
    require_once ('../header/header.php');
    ?>

    <div class="wrapper">
        <div class="container">
            <div class="title">
                <h3>Edit Catagories</h3>
            </div>

            <table class="table" id="myTable">

                <tr class="row" id="one">
                    <td class="column">
                        <label>Tech</label>
                    </td>
                    <td>
                        <div class="btn">
                            <button id="delete" class="delete" value="1" onclick="confirmDel(1)">Delete
                                Catagory</button>
                        </div>
                    </td>
                </tr>

                <tr class="row" id="two">
                    <td class="column">
                        <label>Desk </label>
                    </td>
                    <td>
                        <div class="btn">
                            <button id="delete" class="delete" value="2" onclick="confirmDel(2)">Delete
                                Catagory</button>
                        </div>
                    </td>
                </tr>

            </table>
            <br>
            <div class="btn">
                <a href="new_catagory.html">Add A New Catagory</a>
            </div>

        </div>
    </div>
</body>