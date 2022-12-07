<?php
session_start();

$con=mysqli_connect("localhost","root","","soen341_db") or die("Error");

if(isset($_POST['addBtn'])){
    $fname=$_POST['fullname'];
    $email=$_POST['email'];
   

    $query="INSERT INTO datausers ( ID, Fullname, email, usertype) VALUES ('$fname','$email')";
    $query_run=mysqli_query($con, $query);

    if($query_run){
        $_SESSION['status']= "Successfull";
       // header("Location: MyUserList.php");
    }else{
        $_SESSION['status']= "Unsuccessful";
      //  header("Location: MyUserList.php");

    }
}
?>

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
    //require_once ('../header/header.php');

            if (isset($_SESSION['status'])){
              echo "<h4>".$_SESSION['status']."<\h4>";
              unset($_SESSION['status']);
            }
            //  $sql= "SELECT * FROM `listu`";
              //$result= mysqli_query($conn,$sql);



            
?>

    <div class="wrapper">
        <div class="container mt-4">
            <h1 class="display-4 text-center"><span class="users">Users </span>List</h1>
            <table class="table table-striped mt-5" id="data_table">
                <tr>

                    <th>FullName</th>
                    <th>Email</th>
                    <th>Edit</th>
                    <th>Delete</th>
                    <th>
                    <th><a href="#"></a></th>
                </tr>

                <!-- <tr id="row1">
    <td id="first_name1">Shokhab</td>
    <td id="last_name1">Haydari</td>
    <td id="Email1">shokhabhaydari@gmail.com</td>
    <td id="rfq"><a href="../quotations/request1.php">RFQ</a></td>
    <td class="updates">
        <input type="button" name="editBtn" id="edit_button1" value="Edit" class="btn btn-primary" onclick="edit_row('1')" onmouseup="this.blur()">
        <input type="button" name="saveBtn" id="save_button1" value="Save" class="btn btn-primary" onclick="save_row('1')" onmouseup="this.blur()">
        <input type="button" name="deleteBtn" value="Delete" class="btn btn-primary" onclick="delete_row('1')" onmouseup="this.blur()">
        </td>
    </tr>
    <tr id="row2">
        <td id="first_name2">John</td>
        <td id="last_name2">Smith</td>
        <td id="Email2">johnsmith@gmail.com</td>
        <td id="rfq"><a href="../quotations/request2.php">RFQ</a></td>
        <td class="updates">
            <input type="button" name="editBtn" id="edit_button2" value="Edit" class="btn btn-primary" onclick="edit_row('2')" onmouseup="this.blur()">
            <input type="button" name="saveBtn" id="save_button2" value="Save" class="btn btn-primary" onclick="save_row('2')" onmouseup="this.blur()">
            <input type="button" name="deleteBtn" value="Delete" class="btn btn-primary" onclick="delete_row('2')" onmouseup="this.blur()">
        </td>
    </tr>
    <tr id="row3">
        <td id="first_name3">Jane</td>
        <td id="last_name3">Doe</td>
        <td id="Email3">janedoe@gmail.com</td>
        <td id="rfq"><a href="../quotations/request3.php">RFQ</a></td> -->
                <td class="updates">
                    <input type="button" name="editBtn" id="edit_button3" value="Edit" class="btn btn-primary"
                        onclick="edit_row('3')" onmouseup="this.blur()">
                    <input type="button" name="saveBtn" id="save_button3" value="Save" class="btn btn-primary"
                        onclick="save_row('3')" onmouseup="this.blur()">
                    <input type="button" name="deleteBtn" value="Delete" class="btn btn-primary"
                        onclick="delete_row('3')" onmouseup="this.blur()">
                </td>
                </tr>


                <form method="POST" name="edit">
                    <tr>
                        <td><input type="text" name="fullname"></td>
                        <td><input type="text" name="email"></td>
                        <!-- <td><input type="text" name="usertype" ></td> -->
                        <td></td>
                        <td><input type="submit" name="addBtn" id="add_button" class="btn btn-primary"
                                onclick="add_row()" onmouseup="this.blur()" value="Add Row"></td>
                    </tr>

            </table>
        </div>
        </form>

    </div>

</body>

</html>