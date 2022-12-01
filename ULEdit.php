<!--IGNORE THIS FILE STILL TESTING-->

<?php
session_start();
$con=mysqli_connect("localhost","root","","myusers") or die("Error");


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
    <h1 class="display-4 text-center"><span class="users">Edit </span>user</h1>
    </div>
    <div class="card-body">


    <?php
          if(isset($_GET['ID'])){

            $user_id=$_GET['ID'];
            $users="SELECT *FROM users_form WHERE id='$user_id'";
            $result = mysqli_query($con, $sql);
            $resultCheck = mysqli_num_rows($result);

            if ($resultCheck>0){
                while($row = mysqli_fetch_assoc($result)){


    ?>
     <form action="">
            <div class="row">
                <div class="col-md-12 mb-3">
                    <label for="">Full Name</label>
                    <input type="text" name="Fulln"class="form control">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">Email</label>
                    <input type="text" name="eemail"class="form control">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">User Type</label>
                    <input type="text" name="ut"class="form control">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">Password</label>
                    <input type="text" name="pw"class="form control">
                </div>
                
                <div class="col-md-12 mb-3">
                <button type="submit" class="btn btn-primary ">Update User</button>
            </div>
            </div>
            
        </form>
                 <tr>
                    <td><?php echo $row['ID'];?></td>
                    <td><?php echo $row['FullName'];?></td>
                    <td><?php echo $row['email'];?></td>
                    <td><?php echo $row['usertype'];?></td>
                    <td><a href="ULEdit.php?id=<?php echo $row['ID'];?>" class="btn btn-primary">Edit</a></td>
                    <td><button type="button" class="btn btn-primary">Delete</button></td>
                </tr>
               <?php
               
            }
        }
        

        }//if get
        ?>

       
    </div>





</body>
</html>