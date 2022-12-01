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
    <h1 class="display-4 text-center"><span class="users">Edit </span>user</h1>
    </div>
    <div class="card-body">


    <?php
          if(isset($_GET['id'])){

            $user_id=$_GET['id'];
            $users="SELECT *FROM user_form WHERE id='$user_id'";
            $result = mysqli_query($con, $users);
            $resultCheck = mysqli_num_rows($result);

            if ($resultCheck>0){
                while($row = mysqli_fetch_assoc($result)){


    ?>
     <form action="" method="POST">
        <input type="hidden" name="user_id" value="<?php echo $row['id'];?>">
            <div class="row">
                <div class="col-md-12 mb-3">
                    <label for="">Full Name</label>
                    <input type="text" name="user_name" value="<?php echo $row['user_name'];?>"class="form control">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">Email</label>
                    <input type="text" name="email" value="<?php echo $row['email'];?>"class="form control">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">Password</label>
                    <input type="text" name="password" class="form control">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">User Type</label>
                    <input type="text" name="user_type"value="<?php echo $row['user_type'];?>"class="form control">
                </div>
                
                
                <div class="col-md-12 mb-3">
                <button type="submit" name="update_user"class="btn btn-primary ">Update User</button>
            </div>
            </div>
            
        </form>
                 <!-- <tr>
                    <td><?php echo $row['id'];?></td>
                    <td><?php echo $row['user_type'];?></td>
                    <td><?php echo $row['email'];?></td>
                    <td><?php echo $row['password'];?></td>
                    <td><a href="ULEdit.php?id=<?php echo $row['id'];?>" class="btn btn-primary">Edit</a></td>
                    <td><button type="button" class="btn btn-primary">Delete</button></td>
                </tr> -->
               <?php
               
            }
        }
        

        }//if get
        ?>

       
    </div>





</body>
</html>