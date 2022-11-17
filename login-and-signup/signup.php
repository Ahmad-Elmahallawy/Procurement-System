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
                <div class="title">
                    <h3>Signup</h3>
                </div>
                <div class="inputs">
                    <input type="text" required id="contact-name" onkeyup="validateName()">
                    <label>Name</label>
                    <span id="name-error"></span>
                </div>
                <div class="inputs">
                    <input type="email" required id="contact-email" onkeyup="validateEmail()"">
                    <label id="email-label">Email</label>
                    <span id="email-error"></span>
                </div>
                <div class="inputs">
                    <input type="password" required id="pass1" onkeydown="validatePassword()">
                    <label>Password</label>
                    <span id="password-error"></span>
                </div>
                <div class="inputs">
                    <input type="password" required id="pass2" onkeydown="validatePassword2()">
                    <label>Confirm Passowrd</label>
                    <span id="cpassword-error"></span>
                </div>
                <div class="inputs ">
                    <label class="choice">You are a:</label>
                    <select name="user" id="user">
                        <option value="customer">Customer</option>
                        <option value="suppler">Supplier</option>
                        <option value="customer">Supervisor</option>
                    </select>
                </div>
                <div class="btn">
                    <input
                    type="submit"
                    name="submit"
                    value="Signup"
                    class="form-btn">
                    <p>Already have an account? <a href="login.php">Login</a></p>
                </div>
            </div>
        </div>
   
    <script src="registration_validation.js"></script>
  </body>
</html>