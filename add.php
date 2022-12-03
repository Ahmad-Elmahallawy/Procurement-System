<!--IGNORE THIS FILE STILL TESTING-->

<?php
session_start();
$con=mysqli_connect("localhost","root","","soen341_db") or die("Error");


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

</head>
<body>
    <div class="container-fluid px-4">
    <h1 class="display-4 text-center"><span class="users">Add </span>user</h1>
    </div>
    <div class="card-body">
    <form action="code.php" method="POST">
       
            <div class="row">
                <div class="col-md-12 mb-3">
                    <label for="">Full Name</label>
                    <input type="text" name="user_name" class="form control">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">Email</label>
                    <input type="text" name="email"class="form control">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">Password</label>
                    <input type="text" name="password" class="form control">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">User Type</label>
                    <input type="text" name="user_type" class="form control">
                </div>
                
                
                <div class="col-md-12 mb-3">
                <button type="submit" name="addBtn"class="btn btn-primary ">Add User</button>
            </div>
            </div>
            
        </form>


    </div>





</body>
</html>