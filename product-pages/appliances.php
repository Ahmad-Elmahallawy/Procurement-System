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
    <title> Appliances </title>
  </head>
  <body>
    <?php
    require_once ('../header/header.php');
    ?>
    
    <section class="offer">
      <h1>Appliances Page</h1>
    </section>  

    <div class="row">
        <div class="offer-col">
          <h3>Refrigerators </h3>
          <img src="../images/refrigerator.jpg" alt="appliances" />
          <p>
            Convienient storage space for items needing cool temperatures.
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
          <h3>Microwaves</h3>
          <img src="../images/microwave.png" alt="appliances" />
          <p> Explore variety of different microwaves in the market. </p>

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
          <h3>Washers & Dryers</h3>
          <img src="../images/laundry.jpeg" alt="appliances" />
          <p>Explore the latest washers and dryers available to the public.</p>

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