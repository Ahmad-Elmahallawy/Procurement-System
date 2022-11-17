<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>login form</title>
    <link rel="stylesheet" href="new_cat_style.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="shortcut icon" href="images/logo2.png" />
</head>

<body>
    <script type="text/javascript" src="../delete.js"></script>

    <?php
    require_once ('../header/header.php');
?>
    <div class="wrapper">
        <form action="" method="post" id="form">

            <div class="form-container">

                <div class="title">
                    <h3> Add a Category</h3>
                </div>
                <div class="inputs">
                    <input type="text" name="description" id="description" required />
                    <label>Category Name: * </label>
                    <br>
                </div>

                <div class="btn">
                    <input type="submit" name="submit" value="Add" class="form-btn" id="btn1" />
                    <input type="reset" name="reset" value="Cancel" class="form-btn" id="btn2" onclick="resetForm()" />
                </div>

            </div>
        </form>

    </div>
</body>

</html>