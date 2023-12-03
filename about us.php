<?php

include('config.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>City Look</title>

    <link rel="stylesheet" href="contents/css/Boostrap.css">

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css" />

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <link rel="stylesheet" type="text/css" href="contents/css/style.css">


</head>

<body>
    <!-- menu -->
    <section id="header">
        <a href="inde.php"><img src="" alt="" class="logo"></a>


        <ul class="navbar" id="nav">
            <li><a href="index.php"><i class="fa-solid fa-house"></i>Home</a></li>
            <li><a href="shop.php"><i class="fa-solid fa-cart-shopping"></i>Shop</a></li>
            <li><a href="about us.php" class="active">About us</a> </li>
            <li><a href="contact us.php">Contact us</a></li>

            <?php
            if (isset($_SESSION["LoggedUser"])) {
            ?> <li><a href="User-Dashboard.php">My Account</a></li>
                <li class="al-end"><a href="Wishlist.php"><i class="fa-solid fa-heart"></i></a></li>
                <li class="al-end"><a href="myCart.php"><i class="fa-solid fa-cart-shopping"></i></a></li>
            <?php
            } else {
            ?>

                <li class="al-end"><a href="User-login.php"><i class="fa-solid fa-user"></i>Login</a></li>
                <li class="al-end"><a href="Create user account.php">Sign up</a></li>

            <?php
            }
            ?>
        </ul>
        <div class="mobile">

            <?php
            if (isset($_SESSION["LoggedUser"])) {
            ?>
                <li class="al-end"><a href="Wishlist.php"><i class="fa-solid fa-heart"></i></a></li>
                <li class="al-end"><a href="myCart.php"><i class="fa-solid fa-cart-shopping"></i></a></li>
                <li class="al-end"> <a href="User-Dashboard.php"><i class="fa-solid fa-user"></i></a></li>
            <?php
            } else {
            ?>
                <li class="al-end"><a href="User-login.php"><i class="fa-solid fa-user"></i>Login</a></li>

            <?php
            }
            ?>
            <a class="menubtn" id="mnubtn" onclick="openNav()"><i class="fa-solid fa-bars "></i> </a>
            <a id="close" onclick="closeNav()"><i class="fa-solid fa-times"></i> </a>

        </div>

    </section>
    <div class="container">
        <img src="contents/images/5fed81142f212_json_image_1609400596.webp" alt="" class=" w-100 img-fluid">
    </div>


    <!-- menu end -->


    </section>
    <br><br>
    <section class="about_section  layout_padding">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="img-box">
                        <img src="contents/images/about-img.jpg" alt="" class="w-100 my-5">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="detail-box">
                        <div class="heading_container">
                            <h2>
                                About Us
                            </h2>
                        </div>
                        <p>THE FASHION STORE caters to thoughtful shoppers who appreciate unique designs and top quality pieces you just can’t find anywhere else. We are constantly curating fresh new collections and looking for the next big thing our customers will love. Founded in Vienna in 2019, we are proud to be your Online Clothing Shop that you can rely on for our expert service and care.<br> in the finest quality fashion repairs, remodelling and custom designs, and offer a one-on-one, personalised design service with quality workmanship and attention to detail. Experience a seamless and educational journey to creating the perfect engagement ring by remaining involved in the process from start to finish. Our gemstone collection includes an exclusive range of loose diamonds available from all around the world, including GIA Certified, Australian Argyle and Antwerp Diamonds. If you have something out of the ordinary in mind, we can source this for you. <br><br>

                            As Australia’s Premier Online and Australasian Award Winning fashion Retailer, My fashion Shop is far more than a store, it is an experience. Enjoy shopping in style at our beautiful boutique store on the Gold Coast, or shop with us online 24/7. Our extensive range of fine fashion includes signature collections of yellow, white and rose gold, in addition to hand-picked precious gemstone and pearl pieces. We also carry a select range of beautiful watches and exceptional sterling silver fashion.
                            <br><br>
                            Feel free to email us for some personal advice, it's what we do best. We are available to help you source a specific piece of fashion, loose diamond, or to guide you through the process of deciding exactly what is right for that special someone - maybe even yourself!
                        </p>
                        <a href="">
                            Read More
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="info_section p-5">
        <div class="container">
            <div class="row info_form_social_row">
                <div class="col-md-8 col-lg-9">
                    <div class="info_form">
                        <form action="">
                            <input type="email" placeholder="Enter your email">
                            <a href="contact us.php">
                                <button style="color: white;" onclick="Window.location.href='contact us.php'"> <i class="fa fa-arrow-right" style="font-size:large" aria-hidden="true"></i></button>
                            </a>
                        </form>
                    </div>
                </div>
                <div class="col-md-4 col-lg-3">

                    <div class="social_box">
                        <a href="https://www.facebook.com/sourabh.tripathi.1447">
                            <i class="fa-brands fa-facebook" aria-hidden="true"></i>
                        </a>
                        <a href="https://twitter.com/SourabhTr58">
                            <i class="fa-brands fa-twitter" aria-hidden="true"></i>
                        </a>
                        <a href="https://www.linkedin.com/in/sourabh-tripathi-053962247/">
                            <i class="fa-brands fa-linkedin" aria-hidden="true"></i>
                        </a>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 col-lg-3 mx-5">
                    <h4>
                        <a href="Contact us.php" style="color:white; font-size:larger;">Contact Us</a>
                    </h4>
                    <div class="info_contact">
                        <a href="">
                            <i class="fa fa-map-marker" aria-hidden="true"></i>
                            <span>
                                Location
                            </span>
                        </a>
                        <a href="">
                            <i class="fa fa-phone" aria-hidden="true"></i>
                            <span>
                                Call +91 8619826308
                            </span>
                        </a>
                        <a href="">
                            <i class="fa fa-envelope"></i>
                            <span>
                                ganeshprasadtripathi38@gmail.com
                            </span>
                        </a>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 mx-5">
                    <h4>
                        <a href="index.php" style="color:white; font-size:larger;">Pages</a>
                    </h4>
                    <div class="info_contact">
                        <a href="index.php">
                            Home
                        </a>
                        <a href="shop.php">
                            Shop
                        </a>
                        <a href="about us.php">
                            About us
                        </a>
                    </div>
                </div>

            </div>
        </div>
        </div>

    </section>





</body>


</html>
<script src="contents/js/bootstrap.js"></script>
<script src="contents/js/script.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.js"></script>
<script>
    $(".vendor-carousel").owlCarousel({
        loop: true,
        margin: 0,
        nav: false,
        responsive: {
            0: {
                margin: 10,
                items: 3,
            },
            576: {
                margin: 10,
                items: 3,
            },
            768: {
                margin: 10,
                items: 3,
            },
            992: {
                items: 4,
            },
            1200: {
                items: 4,
            },
        },
    });
</script>