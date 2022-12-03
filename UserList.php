<!--IGNORE THIS FILE STILL TESTING-->

<?php 

session_start();
$con=mysqli_connect("localhost","root","","soen341_db") or die("Error");

// if(isset($_POST['addBtn'])){
//     $uname=$_POST['uname'];
//     $email=$_POST['email'];
//     $pass=$_POST['password'];
//     $ut=$_POST['usertype'];

//     $query="INSERT INTO user_form ( id, user_name, email, password, user_type) VALUES ('$uname','$email','$pass','$ut')";
//     $query_run=mysqli_query($con, $query);

//     if($query_run){
//         $_SESSION['status']= "Successfull";
//        // header("Location: MyUserList.php");
//     }else{
//         $_SESSION['status']= "Unsuccessful";
//       //  header("Location: MyUserList.php");

//     }
// }



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
    <?php
     if(isset($_SESSION['message'])){
    ?>
    <div class="alert" role="alert">
        <strong>Hey!</strong><?php echo $_SESSION['message'];?>
    </div>
    <?php
    unset($_SESSION['message']);
    }
    ?>
    
    
<div class="container-fluid px-4">
    <h1 class="display-4 text-center"><span class="users">Users </span>List 
    <a href="add.php" class="btn btn-primary float-end">Add</a>
    </h1>
    <table class="table table-striped mt-5" id="data_table">
        <!-- <form method="POST">
        <button type="submit" name="addBtn" value="<?php //echo $row['id'];?> " class="btn btn-primary float-end">Add </button>

        </form> -->

       


          
            <tr>
                <th>ID</th>
                <th>UserName</th>
                <th>Email</th>
                <!-- <th>Password</th> -->
                <th>User Type</th>
                <th>Edit</th>
                <th>Delete</th>
                
            </tr>
            <tbody>
                <?php

               // $query="SELECT * FROM users_form";
               // $query_run=mysqli_query($con,$query);

                //if(mysqli_num_rows($query_run) >0 ){
                  //  foreach($query_run as $rows){
                        ?>
                        <!-- <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><a href="" class="btn btn-primary">Edit</a></td>
                            <td><button type="button" class="btn btn-primary"></button></td>
                           
                            
                        </tr> -->
                        <?php

                   // }


              //  }else{
                    ?>
                    <!-- <tr>
                        <td colspan="7">No record found</td>
                    </tr> -->
                    <?php

              //  }
                ?>

                    <?php
                        $sql = "SELECT * FROM user_form;";
                        $result = mysqli_query($con, $sql);
                        $resultCheck = mysqli_num_rows($result);

                        if ($resultCheck > 0) {
                            while($row = mysqli_fetch_assoc($result)){ 
                    ?>
                            <tr>
                                <td><?php echo $row['id'];?></td>
                                <td><?php echo $row['user_name'];?></td>
                                <td><?php echo $row['email'];?></td>
                                <!-- <td><?php //echo $row['password'];?></td> -->
                                <td><?php echo $row['user_type'];?></td>
                                <td><a href="ULEdit.php?id=<?php echo $row['id'];?>" class="btn btn-primary">Edit</a></td>
                                <td>
                                    <form action="code.php" method="POST">
                                    <button type="submit" name="user_delete" value="<?php echo $row['id'];?> " class="btn btn-primary">Delete</button>
                                    </form>
                                   
                                </td>
                            </tr>
                    <?php 
                            }

                        }
                    ?>
                
            </tbody>

        


     </table>
        
    
    
</div>

    
</body>
</html>