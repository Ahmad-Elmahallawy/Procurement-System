<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <link rel="stylesheet" href="https://bootswatch.com/4/yeti/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/e73ec64d5b.js" crossorigin="anonymous"></script>    <title>Cart</title>
    <link rel="stylesheet" href="cart_style.css">
    <!-- <link rel="stylesheet" href="index.css" > -->
    
  <!-- google font link-->
  <link
  href="https://fonts.googleapis.com/css?family=Source+Sans+3:200,300,regular,500,600,700,800,900,200italic,300italic,italic,500italic,600italic,700italic,800italic,900italic"
  rel="stylesheet" />
    
</head>
<body>

<?php
    require_once ('../header/header.php');
?>

<div class="wrapper">
    <div class="container mt-4">
        <h1 class="display-4 text-center"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Final <span class="shopping">Quotation</span></h1>
        <div class="cart">
            <div class="cart-item-box col-lg-10 mt-4">
                <h2 class="section-heading">Order Summary</h2>
                <div class="product-card ">

                    <div class="card">
        
                      <div class="img-box">
                        <img src="./images/product.png" alt="product1" width="80px" class="product-img">
                      </div>
        
                      <div class="detail">
        
                        <h4 class="product-name">Sample Product 1</h4>
                        <h3 class="product-id">ID 1</h3>
                        <h3 class="product-supply">Weight</h3>
                        <div class="wrapper-2">
        
              
        
                        <div class="product-qty">
                            <button class="decrement">
                              <ion-icon name="remove-outline"></ion-icon>
                            </button>
        
                            <span class="quantity">1</span>
        
                            <button class="increment">
                              <ion-icon name="add-outline"></ion-icon>
                            </button>
                          </div>
        
                        </div>
        
                      </div>
                    
                      <button class="product-close-btn">
                        <ion-icon name="close-outline"></ion-icon>
                      </button>
        
                    </div>
        
                  </div>

                  <div class="product-card">

                    <div class="card">
        
                      <div class="img-box">
                        <img src="./images/product.png" alt="product2" width="80px" class="product-img">
                      </div>
        
                      <div class="detail">
                        
                        <h4 class="product-name">Sample Product 2</h4>
                        <h3 class="product-id">ID 2</h3>
                        <h3 class="product-supply">Weight</h3>
                        <div class="wrapper-2">
        
        
                            <div class="product-qty">
                                <button class="decrement">
                                <ion-icon name="remove-outline"></ion-icon>
                                </button>
        
                                <span class="quantity">1</span>
        
                                <button class="increment">
                                <ion-icon name="add-outline"></ion-icon>
                                </button>
                            </div>
                            </div>
        
                      </div>
        
                      <button class="product-close-btn">
                        <ion-icon name="close-outline"></ion-icon>
                      </button>
        
                    </div>
        
                  </div>

                  <div class="product-card">

                    <div class="card">
        
                      <div class="img-box">
                        <img src="./images/product.png" alt="product3" width="80px" class="product-img">
                      </div>
        
                      <div class="detail">
                        
                        <h4 class="product-name">Sample Product 3</h4>
                        <h3 class="product-id">ID 3</h3>
                        <h3 class="product-supply">Weight</h3>
                        <div class="wrapper-2">
        
                          
        
                            <div class="product-qty">
                                <button class="decrement">
                                <ion-icon name="remove-outline"></ion-icon>
                                </button>
        
                                <span class="quantity">1</span>
        
                                <button class="increment">
                                <ion-icon name="add-outline"></ion-icon>
                                </button>
                            </div>
                            </div>
        
                      </div>
        
                      <button class="product-close-btn">
                        <ion-icon name="close-outline"></ion-icon>
                      </button>
        
                    </div>
        
                  </div>
                  <button class="btn btn-primary btn-block">
                    <b>Submit Quotation</b></span>
                </button>
                
            </div>
            
<!--             <div class="amount col-lg-5 ml-2 mr-2 mt-4">
    
                <button class="btn btn-primary btn-block">
                    <b>Submit Quotation</b></span>
                </button>
    
            </div> -->
        </div>

    </div>
</div>

<script src="./cart.js"></script>
 <!-- ionicon link -->
 <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
 <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>



</body>
</html>