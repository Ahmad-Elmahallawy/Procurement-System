<?php

    @include 'login-and-signup/config.php';
    session_start();
    //$username = $_SESSION['user_name'];

    // if(!isset($username))
    //     header('location:login-and-signup/login.php');
    
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="index.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <title>Home</title>
</head>

<body>


    <section class="header">
        <div class="topnav" id="myTopnav">
            <?php
                if(isset($_SESSION['user_name']))
                {

                    $select = " SELECT * FROM user_form WHERE name = '".$_SESSION['user_name']."'";
                    $result = mysqli_query($conn, $select);
                    $row = mysqli_fetch_array($result);
                    if($row['user_type'] == 'customer')
                    {
                        echo "<a href='cart/cart.php'>Final Quotation</a>";
                        echo "<a href='procurement/procurement.php'>RFQ</a>";
                    }

                    elseif($row['user_type'] == 'supervisor')
                    {
                        echo "<a href='users/userlist.php'>Users</a>";
                        echo "<a href='supplier/supplier.php'>Suppliers</a>";
                    }

                    else{
                        echo "<a href='supplier/supplier.php'>My Supplies</a>";

                    }
                    echo "<a href='login-and-signup/logout.php'> Log Out </a>";
                }

                else{
                    echo "<a href='login-and-signup/login.php'>Login</a>";
                }
        ?>

            <a href=" index.php">Home</a>
            <a href="javascript:void(0);" class="icon" onclick="navB()">
                <i class="fa fa-bars"></i>
            </a>
        </div>

        <div class="text-box">
            <h1>Best Procurement System</h1>
            <p>
                A place where you can buy and sell <br />any product that you want!
            </p>
            <p>
                <?php 
                if(isset($_SESSION['user_name'])){
                    echo "Welcome     " .$_SESSION['user_name'] ."!";
                }
                
                else{
                    echo "<a href='login-and-signup/signup.php' class='hero-btn'>Sign Up To Know More</a>";
                }
            ?></p>


        </div>
    </section>


    <section class="offer">
        <h1>Some of what we offer</h1>
        <p>
            We have variety of different categories! You will find what you want
        </p>

        <div class="row">
            <a href="./product-pages/construction.php" id="offer">
                <div class="offer-col">
                    <h3>Construction</h3>
                    <img src="/images/construction.svg" alt="construction" />
                    <p>
                        get all the construction tools you need. from a hammer to heavy
                        tools for buildings
                    </p>
                </div>
            </a>
            <a href="./product-pages/school.php" id="offer">
                <div class="offer-col">
                    <h3>School</h3>
                    <img src="/images/school.svg" alt="construction" />
                    <p>We offer everything you need to finish your upcoming assingment</p>
                </div>
            </a>
            <a href="./product-pages/books.php" id="offer">
                <div class="offer-col">
                    <h3>Books</h3>
                    <img src="/images/book.svg" alt="construction" />
                    <p>Get your favourite book to read during your free time</p>
                </div>
            </a>

        </div>
        <div class="row">
            <a href="./product-pages/technology.php" id="offer">
                <div class="offer-col">
                    <h3>Technology</h3>
                    <img src="/images/technology.svg" alt="construction" />
                    <p>
                        Buy the latest devices and view see the special deals from
                        suppliers.
                    </p>
                </div>
            </a>
            <a href="./product-pages/games.php" id="offer">
                <div class="offer-col">
                    <h3>Games</h3>
                    <img src="/images/games.svg" alt="construction" />
                    <p>Are you a gamer? We have what you need</p>
                </div>
            </a>
            <a href="./product-pages/appliances.php" id="offer">
                <div class="offer-col">
                    <h3>Appliances</h3>
                    <img src="/images/appliance.svg" alt="construction" />
                    <p>Buy any applicance you are looking for with just one click</p>
                </div>
            </a>

        </div>
    </section>

    <div class="cont1">
        <section class="global">
            <h1>We are Global</h1>
            <p>
                We offer products not only in North America, but in the whole world!
            </p>

            <div class="row">
                <div class="global-col">
                    <img src="/images/London.jpg" alt="London" />
                    <div class="layer">
                        <h3>London</h3>
                    </div>
                </div>
                <div class="global-col">
                    <img src="/images/Paris.jpg" alt="London" />
                    <div class="layer">
                        <h3>Paris</h3>
                    </div>
                </div>
                <div class="global-col">
                    <img src="/images/NewYork.jpg" alt="London" />
                    <div class="layer">
                        <h3>New York</h3>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- Slideshow container -->
    <div class="slideshow-container">
        <div class="testimonials">
            <h2>What Our Users Say</h2>
        </div>
        <!-- Full-width slides/quotes -->
        <div class="mySlides">
            <img src="/images/PFP.png" alt="" />
            <q>I like to use that Website a lot! It always has what I am looking for
                which is amazing!</q>
            <p class="author">- Anonymous</p>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star-half-o"></i>
        </div>

        <div class="mySlides">
            <img src="/images/PFP.png" alt="" />
            <q>A very easy to use website to use and the service is great!</q>
            <p class="author">- Anonymous</p>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
        </div>

        <div class="mySlides">
            <img src="/images/PFP.png" alt="" />
            <q>I really like the customer support and the variety of categories I
                can choose from.</q>
            <p class="author">- Anonymous</p>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
        </div>
        <div class="dot-container">
            <span class="dot" onclick="currentSlide(1)"></span>
            <span class="dot" onclick="currentSlide(2)"></span>
            <span class="dot" onclick="currentSlide(3)"></span>
        </div>
        <!-- Next/prev buttons -->
        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
        <a class="next" onclick="plusSlides(1)">&#10095;</a>
    </div>

    <section class="cta">
        <h1>Have Any Trouble? You Can Contact Us Now!</h1>
        <a href="ContactUs.php" class="hero-btn">CONTACT US</a>
    </section>

    <section class="footer">
        <h4>About Us</h4>
        <p>
            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nihil
            voluptatum aut ad ratione dolorum architecto quae numquam repellendus
            molestias. <br />Id libero fuga asperiores consectetur fugiat magnam
            voluptas saepe culpa iure.
        </p>
        <div class="icons">
            <i class="fa fa-facebook"></i>
            <i class="fa fa-twitter"></i>
            <i class="fa fa-instagram"></i>
            <i class="fa fa-linkedin"></i>
        </div>
        <p>Made by: Ahmad, Vanessa, Maria, Karin, Christian and Shokhab</p>
    </section>
    <!-- Dots/bullets/indicators -->
    <script>
    function navB() {
        var x = document.getElementById("myTopnav");
        if (x.className === "topnav") {
            x.className += " responsive";
        } else {
            x.className = "topnav";
        }
    }

    var slideIndex = 1;
    showSlides(slideIndex);

    function plusSlides(n) {
        showSlides((slideIndex += n));
    }

    function currentSlide(n) {
        showSlides((slideIndex = n));
    }

    function showSlides(n) {
        var i;
        var slides = document.getElementsByClassName("mySlides");
        var dots = document.getElementsByClassName("dot");
        if (n > slides.length) {
            slideIndex = 1;
        }
        if (n < 1) {
            slideIndex = slides.length;
        }
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex - 1].style.display = "block";
        dots[slideIndex - 1].className += " active";
    }
    </script>
</body>

</html>