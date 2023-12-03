<?php

include('config.php');

$fl = true;

if (isLogged()) {
    $id = $_SESSION["LoggedUser"];
    $sql = "SELECT * FROM customer where User_id='$id' ";

    $res = mysqli_query($conn, $sql);
    $user = mysqli_fetch_array($res);


    $sql_cart = "select * from cart where User_id='$id'";
    $result = mysqli_query($conn, $sql_cart);

    while ($cr = mysqli_fetch_array($result)) {
        $pid = $cr['Product_id'];
        $s = "select * from products where Item_no ='$pid'";

        $res = mysqli_query($conn, $s);
        $p = mysqli_fetch_array($res);
        if ($cr["quantity"] > $p["Stock"]) {
            $fl = false;
            break;
        }
    }
} else {
?>
    <script>
        window.location.href = "User-login.php";
    </script>
<?php

}








if ($fl) {
    $id = $_SESSION["LoggedUser"];
    $sql = "SELECT * FROM customer where User_id='$id' ";

    $res = mysqli_query($conn, $sql);
    $user = mysqli_fetch_array($res);

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
                <li><a href="about us.php">About us</a> </li>
                <li><a href="contact us.php">Contact us</a></li>

                <?php
                if (isset($_SESSION["LoggedUser"])) {
                ?> <li><a href="User-Dashboard.php">My Account</a></li>
                    <li class="al-end"><a href="Wishlist.php"><i class="fa-solid fa-heart"></i></a></li>
                    <li class="al-end"><a href="myCart.php" class="active"><i class="fa-solid fa-cart-shopping"></i></a></li>
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
                    <a href="User-Dashboard.php><i class=" fa-solid fa-user"></i></a>

                <?php
                }
                ?>
                <a href="#" class="menubtn" id="mnubtn" onclick="openNav()"><i class="fa-solid fa-bars "></i> </a>
                <a href="#" id="close" onclick="closeNav()"><i class="fa-solid fa-times"></i> </a>

            </div>

        </section>


        <!-- menu end -->

        <br><br>


        <div class="container-fluid">
            <div class="row px-xl-5">
                <div class="col-lg-8">
                    <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-orange pr-3">Billing Address</span></h5>
                    <div class="bg-light p-30 mb-5">
                        <form action="" method="post" class="row">
                            <div class="col-md-6 form-group me-5">
                                <label>Name</label>
                                <input class="form-control" type="text" name="na" value="<?php echo $user["Name"]  ?>" value="<?php echo $user["Name"]  ?>">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>E-mail</label>
                                <input class="form-control" type="mail" name="mail" value="<?php echo $user["E_mail"]  ?>">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Mobile No</label>
                                <input class="form-control" type="tel" name="con" value="<?php echo $user["Contact"]  ?>">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>House no</label>
                                <input name="hno" class="form-control" type="text" value="<?php echo $user["House_no"]  ?>">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Street</label>
                                <input name="str" class="form-control" type="text" value="<?php echo $user["Street"]  ?>">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Area</label>
                                <input name="area" class="form-control" type="text" value="<?php echo $user["Area"]  ?>">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>City</label>
                                <input name="dist" class="form-control" type="text" value="<?php echo $user["District"]  ?>">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>State</label>
                                <input name="state" class="form-control" type="text" value="<?php echo $user["State"]  ?>">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>ZIP Code</label>
                                <input name="pin" class="form-control" type="text" value="<?php echo $user["PINCODE"]  ?>">
                            </div>
                        </form>
                    </div>
                    <!-- <div class="col-md-6 form-group d-flex justify-content-end my-3">
                        <input class="btn btn-primary" type="submit" value="Submit" name="send">
                    </div> -->

                    <a href="Edit-User-Account.php">Change Address</a>

                    <?php
                    if (isset($_POST["send"])) {

                        $id = $_SESSION['LoggedUser'];
                        echo $id;

                        $mail = $_REQUEST["mail"];
                        $con = $_REQUEST["con"];
                        $hno = $_REQUEST["hno"];
                        $str = $_REQUEST["str"];
                        $area = $_REQUEST["area"];
                        $dist = $_REQUEST["dist"];
                        $state = $_REQUEST["state"];
                        $pin = $_REQUEST["pin"];

                        $sql = "update customer set

                        Contact='$con',
                        E_mail='$mail',
                        House_no='$hno',
                        Street='$str',
                        Area='$area',
                        District='$dist',
                        State='$state',
                        PINCODE='$pin'

                        where User_id ='$id'

                        ";

                        $res = mysqli_query($conn, $sql);

                        if ($res) {
                    ?>
                            <script>
                                window.alert("Address Saved");
                                window.location.href = "javascript:history.go(-1)";
                            </script>

                    <?php
                        }
                    }
                    ?>
                </div>
                <div class="col-lg-4">
                    <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-orange pr-3">Order Total</span></h5>
                    <div class="bg-light p-30 mb-5">

                        <div class="border-bottom">
                            <h6 class="mb-3">Products</h6>
                            <?php
                            $sql_cart = "select * from cart where User_id='$id'";
                            $result = mysqli_query($conn, $sql_cart);
                            $total = 0;
                            while ($r = mysqli_fetch_array($result)) {
                                $pid = $r['Product_id'];
                                $s = "select * from products where Item_no ='$pid'";

                                $res = mysqli_query($conn, $s);
                                $p = mysqli_fetch_array($res);
                                $total += $p["Price"] * $r["quantity"];
                            ?>
                                <div class="d-flex justify-content-between">
                                    <p><?php echo $p["Item_name"]  ?></p>
                                    <p>₹<?php echo $p["Price"] * $r["quantity"]  ?></p>
                                </div>

                            <?php

                            }

                            ?>

                        </div>
                        <div class="border-bottom pt-3 pb-2">
                            <div class="d-flex justify-content-between mb-3">
                                <h6>Subtotal</h6>
                                <h6>₹<?php echo $total  ?></h6>
                            </div>
                            <div class="d-flex justify-content-between">
                                <h6 class="font-weight-medium">Shipping</h6>
                                <h6 class="font-weight-medium">₹50</h6>
                            </div>
                        </div>
                        <div class="pt-2">
                            <div class="d-flex justify-content-between mt-2">
                                <h5>Total</h5>
                                <h5>₹<?php echo $total + 50  ?></h5>
                            </div>
                        </div>
                    </div>
                    <div class="mb-5">
                        <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-orange pr-3">Payment</span></h5>
                        <div class="bg-light p-30">
                            <div class="form-group">
                                <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" name="payment" checked id="paypal">
                                    <label class="custom-control-label" for="paypal">Cash on dilevery</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" name="payment" id="directcheck">
                                    <label class="custom-control-label">Razorpay</label>
                                    <label class="custom-control-label">*Razorpay is not available currently. Please select Cash on dilevery*</label>
                                </div>
                            </div>
                            <button class="btn btn-block btn-primary font-weight-bold py-3b" onclick="PlaceOrder()">Place Order</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Checkout End -->













        <br><br>

        <!-- Footer -->
        <section class="info_section p-5">
            <div class="container">
                <div class="row info_form_social_row">
                    <div class="col-md-8 col-lg-9">
                        <div class="info_form">
                            <form action="">
                                <input type="email" value="Enter your email">
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
    <script></script>

    <script>
        function PlaceOrder() {
            window.location.href = "place order.php?method='cash'";


        }
    </script>


<?php
} else {

?>
    <script>
        window.alert("Can't Place Order \n Stock underflow");
        window.location.href = "javascript:history.go(-1)";
    </script>


<?php
}

?>