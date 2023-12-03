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
            <li><a href="index.php" class="active"><i class="fa-solid fa-house"></i>Home</a></li>
            <li><a href="shop.php"><i class="fa-solid fa-cart-shopping"></i>Shop</a></li>
            <li><a href="about us.php">About us</a> </li>
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

    <br /><br />

    <!-- banner -->



    <!-- end banner -->

    <br /><br />

    <!-- Latest arrivals -->
    <section>
        <div class="container container-fluid">
            <h1 class="text-center">Latest Arrivals</h1>
            <br />
            <div class="row">
                <div class="col">
                    <div class="owl-carousel vendor-carousel">
                        <?php
                        $i = 0;
                        $sql = "select * from products";

                        $res = mysqli_query($conn, $sql);
                        while (($r = mysqli_fetch_array($res))) {
                            if ($i < 13) {

                                $picture = array();
                                $item=$r["Item_no"];
                                $rs_pic = mysqli_query($conn, "SELECT * FROM pictures Where Product_id='$item'");
                                while ($r_pic = mysqli_fetch_array($rs_pic)) {
                                    array_push($picture, $r_pic['pic']);
                                }

                        ?>
                                <div class="col-lg-10">
                                    <a href="" class=".btn">
                                        <div class="product-item bg-light mb-4">
                                            <div class="product-img position-relative overflow-hidden">
                                                <img class="img-fluid w-100" src="contents/images/<?php echo $picture[0]  ?>" alt="" />
                                                <div class="product-action d-flex">
                                                    <a class="btn btn-outline-dark btn-square " href="AddtoCart.php?item=<?php echo $r["Item_no"];  ?>"><i class="fa fa-shopping-cart"></i></a>
                                                    <a class="btn btn-outline-dark btn-square" href="AddtoWishlist.php?item=<?php echo $r["Item_no"];  ?>"><i class="far fa-heart"></i></a>
                                                    <a class="btn btn-outline-dark btn-square" href="SingleProduct.php?item=<?php echo $r["Item_no"];  ?>"><i class="fa-solid fa-eye"></i></a>
                                                
                                                    <a class="btn btn-outline-dark btn-square" href="SingleProduct.php?item=<?php echo $r["Item_no"];  ?>"><i class="fa-solid fa-eye"></i></a>
                                                </div>
                                            </div>
                                            <div class="text-center py-4">
                                                <a class="h6 text-decoration-none" href=""><?php echo $r["Item_name"];  ?></a>
                                                <div class="d-flex align-items-center justify-content-center mt-2">
                                                    <h5>₹<?php echo $r["Price"];  ?></h5>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>

                        <?php
                                $i++;
                            } else {
                                break;
                            }
                        }

                        ?>
                    </div>
                    <div class="text-end">
                        <a href="Shop.php?fil='latest'"><button>View all</button></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- latest arrivals end -->

    <br />
    <!-- quality icon -->
    <section class="Qualities">
        <div class="container-fluid pt-5">
            <div class="row px-xl-5 pb-3">
                <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                    <div class="d-flex align-items-center  mb-4 bg-prime" style="padding: 30px;">
                        <h1 class="fa fa-check  m-0 mr-3 text-orange "></h1>
                        <h5 class="font-weight-semi-bold m-0">Quality Product</h5>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                    <div class="d-flex align-items-center bg-prime mb-4" style="padding: 30px;">
                        <h1 class="fa fa-shipping-fast  text-orange m-0 mr-2"></h1>
                        <h5 class="font-weight-semi-bold m-0">Free Shipping</h5>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                    <div class="d-flex align-items-center bg-prime mb-4" style="padding: 30px;">
                        <h1 class="fas fa-exchange-alt text-orange  m-0 mr-3"></h1>
                        <h5 class="font-weight-semi-bold m-0">14-Day Return</h5>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                    <div class="d-flex align-items-center bg-prime mb-4" style="padding: 30px;">
                        <h1 class="fa fa-phone-volume m-0 mr-3 text-orange "></h1>
                        <h5 class="font-weight-semi-bold m-0">24/7 Support</h5>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- quality icon end  -->
    <br />

    <!-- Featuured products -->
    <section>
        <div class="container container-fluid">
            <h1 class="text-center">Featured Product</h1>

            <br />
            <h2 class="text-start">Mens</h2>

            <div class="row">
                <div class="col">
                    <div class="owl-carousel vendor-carousel">
                        <?php
                        $i = 0;
                        $sql_men = "select * from products where Category like '%Mens%'";

                        $res = mysqli_query($conn, $sql_men);

                        while (($r = mysqli_fetch_array($res))) {

                            if($i<13){
                            $picture = array();
                            $item=$r["Item_no"];
                            $rs_pic = mysqli_query($conn, "SELECT * FROM pictures Where Product_id='$item'");
                            while ($r_pic = mysqli_fetch_array($rs_pic)) {
                                array_push($picture, $r_pic['pic']);
                            }
                        ?>
                            <div class="col-lg-10">
                                <a href="">
                                    <div class="product-item bg-light mb-4">
                                        <div class="product-img position-relative overflow-hidden">
                                            <img class="img-fluid w-100" src="contents/images/<?php echo $picture[0]  ?>" alt="" />
                                                
                                            <div class="product-action">
                                                <a class="btn btn-outline-dark btn-square" href="AddtoCart.php?item=<?php echo $r["Item_no"];  ?>"><i class="fa fa-shopping-cart"></i></a>
                                                <a class="btn btn-outline-dark btn-square" href="AddtoWishlist.php?item=<?php echo $r["Item_no"];  ?>"><i class="far fa-heart"></i></a>
                                                    <a class="btn btn-outline-dark btn-square" href="SingleProduct.php?item=<?php echo $r["Item_no"];  ?>"><i class="fa-solid fa-eye"></i></a>
                                                
                                            </div>
                                        </div>
                                        <div class="text-center py-4">
                                            <a class="h6 text-decoration-none" href=""><?php echo $r["Item_name"];  ?></a>
                                            <div class="d-flex align-items-center justify-content-center mt-2">
                                                <h5>₹<?php echo $r["Price"];  ?></h5>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>

                        <?php
                            $i++;
                        }else{
                            break;
                        }
                    }

                        ?>
                    </div>
                    <div class="text-end">
                        <a href="Shop.php?fil='Mens'"><button>View all</button></a>
                    </div>
                </div>
            </div>

            <br />
            <h2 class="text-start">Womens</h2>

            <div class="row">
                <div class="col">
                    <div class="owl-carousel vendor-carousel">
                        <?php
                        $i = 0;
                        $sql_women = "select * from products where Category like '%Womens%'";

                        $res = mysqli_query($conn, $sql_women);

                        while (($r = mysqli_fetch_array($res))) {

                            if ($i < 12) {
                                $picture = array();
                                $item=$r["Item_no"];
                                $rs_pic = mysqli_query($conn, "SELECT * FROM pictures Where Product_id='$item'");
                                while ($r_pic = mysqli_fetch_array($rs_pic)) {
                                    array_push($picture, $r_pic['pic']);
                                }

                        ?>
                                <div class="col-lg-10">
                                    <a href="single product.php?item=<?php echo $r["Item_no"];  ?>">
                                        <div class="product-item bg-light mb-4">
                                            <div class="product-img position-relative overflow-hidden">
                                                <img class="img-fluid w-100" src="contents/images/<?php echo $picture[0]  ?>" alt="" />
                                                
                                                <div class="product-action">
                                                    <a class="btn btn-outline-dark btn-square" href="AddtoCart.php?item=<?php echo $r["Item_no"];  ?>"><i class="fa fa-shopping-cart"></i></a>
                                                    <a class="btn btn-outline-dark btn-square" href="AddtoWishlist.php?item=<?php echo $r["Item_no"];  ?>"><i class="far fa-heart"></i></a>
                                                    <a class="btn btn-outline-dark btn-square" href="SingleProduct.php?item=<?php echo $r["Item_no"];  ?>"><i class="fa-solid fa-eye"></i></a>
                                                
                                                </div>
                                            </div>
                                            <div class="text-center py-4">
                                                <a class="h6 text-decoration-none" href=""><?php echo $r["Item_name"];  ?></a>
                                                <div class="d-flex align-items-center justify-content-center mt-2">
                                                    <h5>₹<?php echo $r["Price"];  ?></h5>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>

                        <?php
                                $i++;
                            } else {
                                break;
                            }
                        }
                        ?>
                    </div>
                    <div class="text-end">
                        <a href="shop.php?fil='Womens'"><button>View all</button></a>
                    </div>
                </div>
            </div>

            <br />
            <h2 class="text-start">Kids</h2>

            <div class="row">
                <div class="col">
                    <div class="owl-carousel vendor-carousel">
                        <?php
                        $i = 0;
                        $sql_kids = "select * from products where Category like '%Kids%'";

                        $res = mysqli_query($conn, $sql_kids);

                        while (($r = mysqli_fetch_array($res))) {
                            $picture = array();
                            $item=$r["Item_no"];
                            $rs_pic = mysqli_query($conn, "SELECT * FROM pictures Where Product_id='$item'");
                            while ($r_pic = mysqli_fetch_array($rs_pic)) {
                                array_push($picture, $r_pic['pic']);
                            }

                        ?>
                            <div class="col-lg-10">
                                <a href="">
                                    <div class="product-item bg-light mb-4">
                                        <div class="product-img position-relative overflow-hidden">
                                            <img class="img-fluid w-100" src="contents/images/<?php echo $picture[0]  ?>" alt="" />
                                                
                                            <div class="product-action">
                                                <a class="btn btn-outline-dark btn-square" href="AddtoCart.php?item=<?php echo $r["Item_no"];  ?>"><i class="fa fa-shopping-cart"></i></a>
                                                <a class="btn btn-outline-dark btn-square" href="AddtoWishlist.php?item=<?php echo $r["Item_no"];  ?>"><i class="far fa-heart"></i></a>
                                                    <a class="btn btn-outline-dark btn-square" href="SingleProduct.php?item=<?php echo $r["Item_no"];  ?>"><i class="fa-solid fa-eye"></i></a>
                                                
                                            </div>
                                        </div>
                                        <div class="text-center py-4">
                                            <a class="h6 text-decoration-none" href=""><?php echo $r["Item_name"];  ?></a>
                                            <div class="d-flex align-items-center justify-content-center mt-2">
                                                <h5>₹<?php echo $r["Price"];  ?></h5>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>

                        <?php
                            $i++;
                        }
                        ?>
                    </div>
                    <div class="text-end">
                        <a href="Shop.php?fil='kids'"><button>View all</button></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Featuured products ends -->
    <br />

    <!-- about us -->
    <section>

    </section>
    <!-- about us  ends-->
    <br />
    <!-- Footer -->
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
    <!-- Footer ends -->
</body>


</html>
<script src="contents/js/bootstrap.js"></script>
<script src="contents/js/script.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.js"></script>
<script>
    $(".vendor-carousel").owlCarousel({
        loop: false,
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