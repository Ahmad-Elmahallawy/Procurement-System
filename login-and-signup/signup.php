<?php
@include 'config.php';
if(isset($_POST['submit'])){
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = md5($_POST['password']);
    $cpass = md5($_POST['cpassword']);
    $user_type = $_POST['user_type'];

    $select = " SELECT * FROM user_form WHERE email = '$email' && password = '$pass'  ";

    $result = mysqli_query($conn, $select);
    if(mysqli_num_rows($result) > 0)
    {
        $error[] = 'user already exists';
    }
    else{
        if($pass != $cpass)
        {
            $error[] = 'password not matched!';
        }
        else{
            $insert = "INSERT INTO user_form(name,email,password,user_type) VALUES('$name','$email','$pass','$user_type')";
            mysqli_query($conn,$insert);
            header('location:login.php');
        }
    }
};


?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Signup form</title>
    <link rel="stylesheet" href="registration_style.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <?php
    require_once ('../header/header.php');
?>
    <div class="wrapper">
        <div class="form-container">
            <form action="" method="post">

                <div class="title">
                    <h3>Signup</h3>
                    <?php
                    if(isset($error)){
                        foreach($error as $error){
                            echo '<span class="error-msg">' .$error. '</span>';
                    };
                };
                ?>

                </div>

                <div class="inputs">
                    <input type="text" name="name" required id="contact-name" onkeyup="validateName()">
                    <label>Name</label>
                    <span id="name-error"></span>
                </div>
                <div class="inputs">
                    <input type="email" name="email" required id="contact-email" onkeyup="validateEmail()"">
                    <label id=" email-label">Email</label>
                    <span id="email-error"></span>
                </div>
                <div class="inputs">
                    <input type="password" name="password" required id="pass1" onkeydown="validatePassword()">
                    <label>Password</label>
                    <span id="password-error"></span>
                </div>
                <div class="inputs">
                    <input minlength="8" type="password" name="cpassword" required id="pass2"
                        onkeydown="validatePassword2()">
                    <label>Confirm Passowrd</label>
                    <span id="cpassword-error"></span>
                </div>
                <div class="inputs ">
                    <label class="choice">You are a:</label>
                    <select name="user_type" id="user">
                        <option value="customer">Customer</option>
                        <option value="supplier">Supplier</option>
                        <option value="supervisor">Supervisor</option>
                    </select>
                </div>
                <div class="btn">
                    <input type="submit" name="submit" value="Signup" class="form-btn">
                    <p>Already have an account? <a href="login.php">Login</a></p>
                </div>
            </form>
        </div>
    </div>

    <script src="registration_validation.js"></script>
</body>

</html>