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

    <style>
        /* .Sidebar{
            position: absolute;
            left: -100%;
            top:0;
        } */
    </style>
</head>

<body>
    <a href="#nav" style="position:fixed;bottom:0%; right:0%">x</a>
    <!-- menu -->
    <section id="header">
        <a href="inde.php"><img src="" alt="" class="logo"></a>


        <ul class="navbar" id="nav">
            <li><a href="index.php"><i class="fa-solid fa-house"></i>Home</a></li>
            <li><a href="shop.php" class="active"><i class="fa-solid fa-cart-shopping"></i>Shop</a></li>
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
            <?php
            } else {
            ?>
                <a href="User-Dashboard.php"><i class="fa-solid fa-user"></i></a>

            <?php
            }
            ?>
            <a class="menubtn" id="mnubtn" onclick="openNav()"><i class="fa-solid fa-bars "></i> </a>
            <a id="close" onclick="closeNav()"><i class="fa-solid fa-times"></i> </a>

        </div>

    </section>



    <!-- menu end -->
    <br><br>

    <!-- filter -->
    <div class="container-fluid">
        <div class="row px-xl-5">

            <!-- Shop Sidebar Start -->
            <div class="col-lg-3 col-md-4 Sidebar">
                <form action="" method="post">
                    <!-- Price Start -->
                    <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-orange pr-3">Filter by price</span></h5>
                    <div class="bg-light p-4 mb-30">

                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" checked id="price-all" name="pr[]" value="all">
                            <label class="custom-control-label" for="price-all">All Price</label>
                            <span class="badge border font-weight-normal">1000</span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" id="price-1" name="pr[]" value="0-200">
                            <label class="custom-control-label" for="price-1">₹0 - ₹200</label>
                            <span class="badge border font-weight-normal">150</span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" id="price-2" name="pr[]" value="200-500">
                            <label class="custom-control-label" for="price-2">₹200 - ₹500</label>
                            <span class="badge border font-weight-normal">295</span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" id="price-3" name="pr[]" value="500-800">
                            <label class="custom-control-label" for="price-3">₹500 - ₹800</label>
                            <span class="badge border font-weight-normal">246</span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" id="price-4" name="pr[]" value="800-1000">
                            <label class="custom-control-label" for="price-4">₹800 - ₹1000</label>
                            <span class="badge border font-weight-normal">145</span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between">
                            <input type="checkbox" class="custom-control-input" id="price-5" name="pr[]" value="1000-2000">
                            <label class="custom-control-label" for="price-5">₹1000 - ₹2000</label>
                            <span class="badge border font-weight-normal">168</span>
                        </div>

                    </div>
                    <!-- Price End -->
                    <br>

                    <!-- Category Start -->
                    <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-orange pr-3">Filter by Category</span></h5>
                    <div class="bg-light p-4 mb-30">
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" id="all" value="All" checked name="cat[]">
                            <label class="custom-control-label" for="All-category">All</label>
                            <span class="badge border font-weight-normal">1000</span>
                        </div>
                        <?php

                        $sql = "select * from category";
                        $res = mysqli_query($conn, $sql);

                        while ($r = mysqli_fetch_array($res)) {

                        ?>
                            <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                                <input type="checkbox" class="custom-control-input" id="<?php echo $r["Category_name"]  ?>" value="<?php echo $r["Category_name"]  ?>" name="cat[]">
                                <label class="custom-control-label" for="<?php echo $r["Category_name"]  ?>-category"><?php echo $r["Category_name"]  ?></label>
                                <span class="badge border font-weight-normal">1000</span>
                            </div>

                        <?php

                        }
                        ?>
                    </div>
                    <!-- Category End -->
                    <br>
                    <!-- Size Start -->
                    <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-orange pr-3">Filter by size</span></h5>
                    <div class="bg-light p-4 mb-30">
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" checked id="size-all" value="all" name="sz[]">
                            <label class="custom-control-label" for="size-all">All Size</label>
                            <span class="badge border font-weight-normal">1000</span>
                        </div>

                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" id="size-2" value="S" name="sz[]">
                            <label class="custom-control-label" for="size-2">S</label>
                            <span class="badge border font-weight-normal">295</span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" id="size-3" value="M" name="sz[]">
                            <label class="custom-control-label" for="size-3">M</label>
                            <span class="badge border font-weight-normal">246</span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" id="size-4" value="L" name="sz[]">
                            <label class="custom-control-label" for="size-4">L</label>
                            <span class="badge border font-weight-normal">145</span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between">
                            <input type="checkbox" class="custom-control-input" id="size-5" value="XL" name="sz[]">
                            <label class="custom-control-label" for="size-5">XL</label>
                            <span class="badge border font-weight-normal">168</span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" id="size-1" value="XXL" name="sz[]">
                            <label class="custom-control-label" for="size-1">XXL</label>
                            <span class="badge border font-weight-normal">150</span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" id="size-1" value="XXL" name="sz[]">
                            <label class="custom-control-label" for="size-1">XXXL</label>
                            <span class="badge border font-weight-normal">150</span>
                        </div>
                        <br>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between">
                            <input type="submit" class="btn btn-primary btn-center " value="Apply" name="apply">

                        </div>

                </form>
            </div>
            <!-- Size End -->
        </div>
        <!-- Shop Sidebar End -->


        <!-- Shop Product Start -->
        <div class="col-lg-9 col-md-8">
            <div class="row pb-3">
                <?php
                if (isset($_REQUEST["apply"])) {

                    $pr = $_REQUEST["pr"];
                    $sz = $_REQUEST["sz"];
                    $cat = $_REQUEST["cat"];


                    $sql1 = "SELECT * FROM products";
                    $sql2 = "SELECT * FROM products where ";
                    $sql3 = "SELECT * FROM products where ";

                    $min = array();
                    $max = array();

                    foreach ($pr as $p) {
                        if ($p == "all") {
                            $sql1 = "SELECT * FROM products";
                            break;
                        }
                        switch ($p) {
                            case '0-200':
                                array_push($min, 0);
                                array_push($max, 200);
                                break;
                            case '200-500':
                                array_push($min, 200);
                                array_push($max, 500);
                                break;
                            case '500-800':
                                array_push($min, 500);
                                array_push($max, 800);
                                break;
                            case '800-1000':
                                array_push($min, 800);
                                array_push($max, 1000);
                                break;
                            case '1000-2000':
                                array_push($min, 1000);
                                array_push($max, 2000);
                                break;
                            default:
                                echo "Error";
                        }
                    }

                    if ((count($min) > 1) && (count($max) > 1)) {

                        $l = min($min);
                        $u = max($max);
                        $sql1 = "SELECT * FROM products where Price between '$l' and '$u'";
                    }

                    for ($i = 0; $i < count($cat); $i++) {
                        if ($cat[$i] == "All") {
                            $sql2 = "SELECT * FROM products";
                            break;
                        }
                        if ($i == 0) {
                            $sql2 .= " Category Like '%$cat[$i]%'";
                        } else {
                            $sql2 .= " or Category Like '%$cat[$i]%'";
                        }
                    }

                    for ($i = 0; $i < count($sz); $i++) {
                        if ($sz[$i] == "all") {
                            $sql3 = "SELECT * FROM products";
                            break;
                        }
                        if ($i == 0) {
                            $sql3 .= " Size Like '%$sz[$i]%'";
                        } else {
                            $sql3 .= " or Size Like '%$sz[$i]%'";
                        }
                    }


                   

                    $sql_clr = "" . $sql1 . " INTERSECT " . $sql2 . " INTERSECT " . $sql3 . "";
                    
                    $i = 0;
                    $res = mysqli_query($conn, $sql_clr);
                    while ($r = mysqli_fetch_array($res)) {
                        if ($i < 20) {
                            $picture = array();
                            $item=$r["Item_no"];
                            $rs_pic = mysqli_query($conn, "SELECT * FROM pictures Where Product_id='$item'");
                            while ($r_pic = mysqli_fetch_array($rs_pic)) {
                                array_push($picture, $r_pic['pic']);
                            }
                ?>

                            <div class="col-lg-3 col-md-6 col-sm-6 pb-1">
                                <div class="product-item bg-light mb-4">
                                    <div class="product-img position-relative overflow-hidden">
                                        <img class="img-fluid w-100" src="contents/images/<?php echo $picture[0]  ?>" alt="" />
                                                
                                        <div class="product-action">
                                            <a class="btn btn-outline-dark btn-square btns" href="AddtoCart.php?item=<?php echo $r["Item_no"];  ?>"><i class="fa fa-shopping-cart"></i></a>
                                            <a class="btn btn-outline-dark btn-square btns" href="AddtoWishlist.php?item=<?php echo $r["Item_no"];  ?>"><i class="far fa-heart"></i></a>
                                                    <a class="btn btn-outline-dark btn-square" href="SingleProduct.php?item=<?php echo $r["Item_no"];  ?>"><i class="fa-solid fa-eye"></i></a>
                                                
                                        </div>
                                    </div>
                                    <div class="text-center py-4">
                                        <a class="h6 text-decoration-none text-truncate" href=""><?php echo $r["Item_name"];  ?></a>
                                        <div class="d-flex align-items-center justify-content-center mt-2">
                                            <h5>₹<?php echo $r["Price"];  ?></h5>
                                        </div>

                                    </div>
                                </div>
                            </div>


                    <?php
                            $i++;
                        } else {
                            break;
                        }
                    }

                    ?>

                    <div class="col-12">
                        <nav>
                            <ul class="pagination justify-content-center">
                                <li class="page-item disabled"><a class="page-link" href="#">Previous</span></a></li>
                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">Next</a></li>
                            </ul>
                        </nav>
                    </div>
            </div>
        </div>
        <?php



                } else {


                    $sql = "select * from products";
                    $i = 0;
                    $res = mysqli_query($conn, $sql);
                    while ($r = mysqli_fetch_array($res)) {
                        if ($i < 20) {
                            $picture = array();
                            $item=$r["Item_no"];
                            $rs_pic = mysqli_query($conn, "SELECT * FROM pictures Where Product_id='$item'");
                            while ($r_pic = mysqli_fetch_array($rs_pic)) {
                                array_push($picture, $r_pic['pic']);
                            }
        ?>

                <div class="col-lg-3 col-md-6 col-sm-6 pb-1">
                    <div class="product-item bg-light mb-4">
                        <div class="product-img position-relative overflow-hidden">
                        <img class="img-fluid w-100" src="contents/images/<?php echo $picture[0]  ?>" alt="" />
                            <div class="product-action">
                                <a class="btn btn-outline-dark btn-square btns" href="AddtoCart.php?item=<?php echo $r["Item_no"];  ?>"><i class="fa fa-shopping-cart"></i></a>
                                <a class="btn btn-outline-dark btn-square btns" href="AddtoWishlist.php?item=<?php echo $r["Item_no"];  ?>"><i class="far fa-heart"></i></a>
                                                    <a class="btn btn-outline-dark btn-square" href="SingleProduct.php?item=<?php echo $r["Item_no"];  ?>"><i class="fa-solid fa-eye"></i></a>
                                                
                            </div>
                        </div>
                        <div class="text-center py-4">
                            <a class="h6 text-decoration-none text-truncate" href=""><?php echo $r["Item_name"];  ?></a>
                            <div class="d-flex align-items-center justify-content-center mt-2">
                                <h5>₹<?php echo $r["Price"];  ?></h5>
                            </div>

                        </div>
                    </div>
                </div>


        <?php
                            $i++;
                        } else {
                            break;
                        }
                    }

        ?>

        <div class="col-12">
            <nav>
                <ul class="pagination justify-content-center">
                    <li class="page-item disabled"><a class="page-link" href="#">Previous</span></a></li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">Next</a></li>
                </ul>
            </nav>
        </div>
    </div>
    </div>
<?php
                }
?>
<!-- Shop Product End -->
</div>
</div>

<!-- Filter ends -->








<!-- shop ends -->
<!-- footer -->
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