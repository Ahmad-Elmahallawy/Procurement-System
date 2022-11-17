<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./productsStyles.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
      <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <title> School</title>
  </head>
  <body>
    <?php
    require_once ('../header/header.php');
    ?>
    
    <section class="offer">
      <h1>School Page</h1>
    </section>  

    <div class="row">
        <div class="offer-col">
          <h3>Pens & Pencils</h3>
          <img src="../images/pen.png" alt="school" />
          <p>
            Collection of pens and pencils for students utilization
          </p>

          <form>
            <div>
                <select class="size">
                    <option>Select Size</option>
                    <option>Small</option>
                    <option>Medium</option>
                    <option>Large</option>
                    <option>X-Large</option>
                </select>
                <select class="type">
                    <option>Select Type</option>
                    <option>Bad</option>
                    <option>Used</option>
                    <option>Normal Condition</option>
                    <option>Like New</option>
                </select>
            </div>
            

            <div class="quantity-select">
                <p>Quantity</p>
                <input class='quantity-input' type="number" value="1">
            </div>

            <button class="buy-btn">Add to Cart</button>
        </form>

        </div>
        <div class="offer-col">
          <h3>Notebooks</h3>
          <img src="../images/notebook.jpg" alt="school" />
          <p> Variety of different notebooks to cater different students goals  </p>

          <form>
            <div>
                <select class="size">
                    <option>Select Size</option>
                    <option>Small</option>
                    <option>Medium</option>
                    <option>Large</option>
                    <option>X-Large</option>
                </select>
                <select class="type">
                    <option>Select Type</option>
                    <option>Bad</option>
                    <option>Used</option>
                    <option>Normal Condition</option>
                    <option>Like New</option>
                </select>
            </div>
            

            <div class="quantity-select">
                <p>Quantity</p>
                <input class='quantity-input' type="number" value="1">
            </div>

            <button class="buy-btn">Add to Cart</button>
        </form>

        </div>

        <div class="offer-col">
          <h3>Educational Manuals</h3>
          <img src="../images/manual.jpg" alt="school" />
          <p>Variety of educational and institution-issued manuals for students</p>

          <form>
            <div>
                <select class="size">
                    <option>Select Size</option>
                    <option>Small</option>
                    <option>Medium</option>
                    <option>Large</option>
                    <option>X-Large</option>
                </select>
                <select class="type">
                    <option>Select Type</option>
                    <option>Bad</option>
                    <option>Used</option>
                    <option>Normal Condition</option>
                    <option>Like New</option>
                </select>
            </div>
            

            <div class="quantity-select">
                <p>Quantity</p>
                <input class='quantity-input' type="number" value="1">
            </div>

            <button class="buy-btn">Add to Cart</button>
        </form>
        
        </div>
      </div>

  </body>
<script src="./product.js"></script>
</html>