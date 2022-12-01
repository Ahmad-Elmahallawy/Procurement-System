<?php
session_start();
$con=mysqli_connect("localhost","root","","soen341_db") or die("Error");

if(isset($_POST['update_user'])){
    $user_id=$_POST['user_id'];
    $uname=$_POST['uname'];
    $email=$_POST['email'];
    $pass=$_POST['password'];
    $ut=$_POST['usertype'];

    $query="UPDATE user_form SET uname='$uname', email='$email', password='$pass', usertype='$ut' WHERE id='$user_id'";
    $query_run=mysqli_query($con,$query);

    if($query_run){
        $s_SESSION['message']="Updated Successfully";
        header('Location: UserList.php');
        exit(0);

    }


}


?>