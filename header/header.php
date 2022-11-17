<section class="header">
    <div class="topnav" id="myTopnav">
        <a href="../cart/cart.php">Final Quotation</a>
        <a href="../users/userlist.php">Users</a>
        <a href="../supplier/supplier.php">Suppliers</a>
        <a href="../procurement/procurement.php">RFQ</a>
        <a href="../login-and-signup/login.php">Login</a>
        <a href="../index.php">Home</a>
        <a href="javascript:void(0);" class="icon" onclick="myFunction()">
            <i class="fa fa-bars"></i>
        </a>
    </div>
</section>

<style>
.header {
    font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
    min-height: 3vh;
    height: 55px;
    width: 100%;
    background-color: #152238;
    background-position: center;
    background-size: cover;
    position: relative;
    margin-bottom: 40px;
    
}

.topnav {
    overflow: hidden;
}

/* Style the links inside the navigation bar */
.topnav a {
    float: right;
    display: block;
    color: #f2f2f2;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
    margin-right: 25px;
    font-size: 17px;

}

.topnav a {
    color: #fff;
    text-decoration: none;
    font-size: 17;
}

.topnav a:hover {
    border-bottom: #ff8177 2px solid;
}


/* Hide the link that should open and close the topnav on small screens */
.topnav .icon {
    display: none;
}

@media screen and (max-width: 600px) {
    .topnav a:not(:last-child) {
        display: none;
    }

    .topnav a.icon {
        float: right;
        display: block;
    }
}

/* The "responsive" class is added to the topnav with JavaScript when the user clicks on the icon. This class makes the topnav look good on small screens (display the links vertically instead of horizontally) */
@media screen and (max-width: 600px) {
    .topnav.responsive {
        position: relative;
    }

    .topnav.responsive a.icon {
        position: absolute;
        right: 0;
        top: 0;
    }

    .topnav.responsive a {
        float: none;
        display: block;
        text-align: left;
    }
}
</style>

<!-- Dots/bullets/indicators -->
<script>
function myFunction() {
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
        x.className += " responsive";
    } else {
        x.className = "topnav";
    }
}
</script>