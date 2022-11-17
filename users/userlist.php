<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://bootswatch.com/4/yeti/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/e73ec64d5b.js" crossorigin="anonymous"></script> 
    <title>Users List</title>
    <link rel="stylesheet" href="userlist.css">
    <script src="./user_table.js"></script>

<body>

<?php
    require_once ('../header/header.php');
?>

<div class="wrapper">
    <div class="container mt-4">
        <h1 class="display-4 text-center"><span class="users">Users </span>List</h1>
    <table class="table table-striped mt-5" id="data_table">
    <tr>
    <th>First Name</th>
    <th>Last Name</th>
    <th>Email</th>
    <th>Order Quotations</th>
    <th><a href="#"></a></th> 
    </tr>

    <tr id="row1">
    <td id="first_name1">Shokhab</td>
    <td id="last_name1">Haydari</td>
    <td id="Email1">shokhabhaydari@gmail.com</td>
    <td id="rfq"><a href="../quotations/request1.php">RFQ</a></td>
    <td class="updates">
        <input type="button" id="edit_button1" value="Edit" class="btn btn-primary" onclick="edit_row('1')" onmouseup="this.blur()">
        <input type="button" id="save_button1" value="Save" class="btn btn-primary" onclick="save_row('1')" onmouseup="this.blur()">
        <input type="button" value="Delete" class="btn btn-primary" onclick="delete_row('1')" onmouseup="this.blur()">
        </td>
    </tr>
    <tr id="row2">
        <td id="first_name2">John</td>
        <td id="last_name2">Smith</td>
        <td id="Email2">johnsmith@gmail.com</td>
        <td id="rfq"><a href="../quotations/request2.php">RFQ</a></td>
        <td class="updates">
            <input type="button" id="edit_button2" value="Edit" class="btn btn-primary" onclick="edit_row('2')" onmouseup="this.blur()">
            <input type="button" id="save_button2" value="Save" class="btn btn-primary" onclick="save_row('2')" onmouseup="this.blur()">
            <input type="button" value="Delete" class="btn btn-primary" onclick="delete_row('2')" onmouseup="this.blur()">
        </td>
    </tr>
    <tr id="row3">
        <td id="first_name3">Jane</td>
        <td id="last_name3">Doe</td>
        <td id="Email3">janedoe@gmail.com</td>
        <td id="rfq"><a href="../quotations/request3.php">RFQ</a></td>
    <td class="updates">
    <input type="button" id="edit_button3" value="Edit" class="btn btn-primary" onclick="edit_row('3')" onmouseup="this.blur()">
    <input type="button" id="save_button3" value="Save" class="btn btn-primary" onclick="save_row('3')" onmouseup="this.blur()">
    <input type="button" value="Delete" class="btn btn-primary" onclick="delete_row('3')" onmouseup="this.blur()">
    </td>
    </tr>

    <tr>
    <td><input type="text" id="new_first_name"></td>
    <td><input type="text" id="new_last_name"></td>
    <td><input type="text" id="new_Email"></td>
    <td></td>
    <td><input type="button" id="add_button" class="btn btn-primary" onclick="add_row()" onmouseup="this.blur()" value="Add Row"></td>
    </tr>

    </table>
    </div>
    
</div>

</body>
</html>