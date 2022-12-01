<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Procurement Form</title>
  <link rel="stylesheet" href="procurement_style.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="shortcut icon" href="images/logo2.png" />
  
</head>

<body>
  <script type="text/javascript" src="../delete.js"></script>
  
  <?php
    require_once ('../header/header.php');
  ?>
  
  <div class="wrapper">

    <form action="connection.php" method="post" id="form">

      <div class="form-container">

        <div class="title">
          <h3>Request For Quotation Form</h3>
        </div>

        <div class="inputs">
          <input type="text" name="product_name" id="description" required />
          <label>Product Name: * </label>
          <br>
        </div>

        <div class="inputs">
          <input type="number" name="quantity" required min="1" max="100" />
          <label>Quantity: * </label>
          <br>
        </div>

        <div class="inputs">
          <input type="number" name="price" required min="1" max="1000000" />
          <label>Estimated Price: * </label>
          <br>
        </div>

        <div class="btn">
          <input type="submit" name="submit" value="Generate RFQ" class="form-btn" id="btn1">
          <input type="button" name="trans" value="trans RFQ" class="form-btn" id="btn1" onclick="window.location.href='../backstore/product_backstore.php';" />
          <input type="reset" name="reset" value="Reset RFQ" class="form-btn" id="btn2" />
        </div>

      </div>

    </form>

  </div>

</body>

</html>