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

      body{
        margin: 0 0;
      }
      .form-container{
        height: 350px;
      }

      .wrapper{
        display:flex;
        align-items: center;
      }
      
    </style>
  </head>
  <body>
  <?php
    require_once ('../header/header.php');
    ?>
    <div class="wrapper">
        <form action="" method="post">
            <div class="form-container">
                <div class="title">
                    <h3>Login</h3>
                </div>
                <div class="inputs">
                    <input type="text" required id="contact-email" onkeydown="validateEmail()">
                    <label>Email</label>
                    <span id="email-error"></span>
                </div>
                <div class="inputs">
                    <input type="password" required id="pass1" onkeydown="validatePassword()">
                    <label>Password</label>
                    <span id="password-error"></span>
                </div>
                <div class="btn">
                    <input
                    type="submit"
                    name="submit"
                    value="Login"
                    class="form-btn">
                    <p>Don't have an account? <a href="signup.php">Signup</a></p>
                    <span id="submit-error"></span>
                </div>
            </div>
        </form>
    </div>
    <script src="registration_validation.js"></script>
  </body>
</html>