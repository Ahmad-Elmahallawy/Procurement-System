<?php

require_once ('../header/header.php');
if(isset($_POST['submit'])){
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = md5($_POST['password']);


    $select = " SELECT * FROM user_form WHERE email = '$email' && password = '$pass'  ";

    $result = mysqli_query($conn, $select);
    if(mysqli_num_rows($result) > 0)
    {
        $row = mysqli_fetch_array($result);

        if($row['user_type'] == 'customer'){
          $_SESSION['id'] = $row['id'];
          header('location:../index.php');
    }
        elseif($row['user_type'] == 'supplier'){
          $_SESSION['id'] = $row['id'];
          header('location:../supplier/supplier.php');
}
        elseif($row['user_type'] == 'supervisor'){
          $_SESSION['id'] = $row['id'];
          header('location:../backstore/product_backstore.php');
}

    
}        else{
    $error[] = "incorrect email or password!";
  }


};

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>login form</title>
    <link rel="stylesheet" href="registration_style.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
    body {
        margin: 0 0;
    }

    .form-container {
        height: 450px;
    }

    .wrapper {
        display: flex;
        align-items: center;
    }
    </style>
</head>

<body>

    <div class="wrapper">

        <div class="form-container">
            <form action="" method="post">
                <div class="title">
                    <h3>Login</h3>
                </div>
                <?php
                    if(isset($error)){
                        foreach($error as $error){
                            echo '<div class= "title err">';
                            echo '<p class="error-msg">' .$error. '</p>';
                            echo '</div>';
                    };
                };
                ?>
                <div class="inputs">
                    <input type="text" name="email" required id="contact-email" onkeydown="validateEmail()">
                    <label>Email</label>
                    <span id="email-error"></span>
                </div>
                <div class="inputs">
                    <input type="password" name="password" required id="pass1" onkeydown="validatePassword()"
                        onclick="validatePassword()">
                    <label>Password</label>
                    <span id="password-error"></span>
                </div>
                <div class="btn">
                    <input type="submit" name="submit" value="Login" class="form-btn">
                    <p>Don't have an account? <a href="signup.php">Signup</a></p>
                    <span id="submit-error"></span>
                </div>

            </form>


        </div>


        <script src="registration_validation.js"></script>
</body>

</html>