<?php
session_start();
$con=mysqli_connect("localhost","root","","soen341_db") or die("Error");

if(isset($_POST['update_user'])){
    $user_id=$_POST['user_id'];
    $uname=$_POST['user_name'];
    $email=$_POST['email'];
    $pass=$_POST['password'];
    $ut=$_POST['user_type'];

    $query="UPDATE user_form SET user_name='$uname', email='$email', password='$pass', user_type='$ut' WHERE id='$user_id'";
    $query_run=mysqli_query($con,$query);

    if($query_run){
        $s_SESSION['message']="Updated Successfully";
        header('Location: UserList.php');
        exit(0);

    }


}

if(isset($_POST['user_delete'])){
    $user_id=$_POST['user_delete'];
    $query="DELETE FROM user_form WHERE id='$user_id'";
    $query_run=mysqli_query($con,$query);

    if($query_run){
        $s_SESSION['message']="Deleted Successfully";
        header('Location: UserList.php');
        exit(0);

    }else{
        $_SESSION['message']="something went wrong";
        header('Location: UserList.php');
        exit(0);

    }

}

if(isset($_POST['addBtn'])){
   
    $uname=$_POST['user_name'];
    $email=$_POST['email'];
    $pass=$_POST['password'];
    $ut=$_POST['user_type'];

    $query="INSERT INTO user_form ( user_name , email, password, user_type) VALUES ('$uname','$email','$pass','$ut')";
    $query_run=mysqli_query($con, $query);

    if($query_run){
        $_SESSION['status']= "Successfull";
        header("Location: UserList.php");
    }else{
        $_SESSION['status']= "Unsuccessful";
         header("Location: UserList.php");

    }
}


?>