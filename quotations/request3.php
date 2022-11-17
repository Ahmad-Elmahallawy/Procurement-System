<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <link rel="stylesheet" href="https://bootswatch.com/4/yeti/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/e73ec64d5b.js" crossorigin="anonymous"></script>
    <title>Cart</title>
    <link rel="stylesheet" href="../cart/cart_style.css">
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
            <h1 class="display-4 text-center"><span class="shopping">Procurement</span> Request</h1>
            <div class="cart">
                <div class="cart-item-box col-lg-7 ml-2 mr-2 mt-4">
                    <h2 class="section-heading">Order Summary</h2>

                    <div class="product-card">

                        <div class="card">

                            <div class="img-box">
                                <img src="./images/product.png" alt="product1" width="80px" class="product-img">
                            </div>

                            <div class="detail">

                                <h4 class="product-name">Sample Product 1</h4>
                                <h3 class="product-id">ID 1</h3>
                                <h3 class="product-supply">Weight</h3>
                                <div class="inputs">
                                    <select class="dd" id="supplier">
                                        <option disabled selected> Select Supplier: * </option>
                                        <option value="Amazon">Amazon</option>
                                        <option value="eBay">eBay</option>
                                        <option value="HP">HP</option>
                                    </select>
                                    <br>
                                </div>
                                <div class="wrapper-2">

                                    <div class="product-price">
                                        $ <span class="price">24.99</span>
                                    </div>

                                    <div>
                                        <!-- <button class="decrement">
                                <ion-icon name="remove-outline"></ion-icon>
                                </button> -->
                                        Quantity:
                                        <span class="quantity">1</span>

                                        <!-- <button class="increment">
                                <ion-icon name="add-outline"></ion-icon>
                                </button> -->
                                    </div>
                                </div>

                            </div>

                            <!-- <button class="product-close-btn">
                        <ion-icon name="close-outline"></ion-icon>
                      </button> -->

                        </div>

                    </div>


                </div>

                <div class="amount col-lg-5 ml-2 mr-2 mt-4">

                    <h2 class="section-heading">Cart Summary</h2>

                    <div class="subtotal">
                        <span>Subtotal</span> <span>$ <span id="subtotal">24.99</span></span>
                    </div>

                    <div class="count">
                        <span>Number of Items</span> <span id="count">1</span>
                    </div>

                    <div class="tax">
                        <span>Tax</span> <span>$ <span id="tax">3.01</span></span>
                    </div>

                    <div class="shipping">
                        <span>Shipping</span> <span>$ <span id="shipping">15.00</span></span>
                    </div>

                    <div class="total">
                        <span>Total</span> <span>$ <span id="total">28.00</span></span>
                    </div>
                    <button class="btn btn-primary btn-block">
                        <b>Approve Request</b></span>
                    </button>
                    <button class="btn btn-primary btn-block">
                        <b>Reject Request</b></span>
                    </button>



                </div>
            </div>

        </div>
    </div>

    <script src="../cart/cart.js"></script>
    <!-- ionicon link -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>



</body>

</html>