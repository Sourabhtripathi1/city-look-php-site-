<?php

include('config.php');

if(isLogged()){
    $id=$_SESSION["LoggedUser"];
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
			<li><a href="index.php" ><i class="fa-solid fa-house"></i>Home</a></li>
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
				<a href="User-Dashboard.php"><i class="fa-solid fa-user"></i></a>

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
            <div class="col-lg-8 table-responsive mb-5">
                <table class="table table-light table-borderless table-hover text-center mb-0">
                    <thead class="thead-dark">
                        <tr>
                            <th>Products</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th>Remove</th>
                        </tr>
                    </thead>
                    <tbody class="align-middle">
<?php
$sql_cart="select * from cart where User_id='$id'";
$result=mysqli_query($conn,$sql_cart);
  
while($r=mysqli_fetch_array($result)){
    $pid=$r['Product_id'];
    $s="select * from products where Item_no ='$pid'";
    
    $res=mysqli_query($conn,$s);
    $p=mysqli_fetch_array($res);



?>
                        <tr>
                            <td class="align-middle"><img src="img/product-1.jpg" alt="" style="width: 50px;"> <?php echo $p["Item_name"]  ?></td>
                            <td class="align-middle"><?php echo $p["Price"]  ?></td>
                            <td class="align-middle">
                                <div class="input-group quantity mx-auto" style="width: 100px;">
                                    <div class="input-group-btn">
                                        <button class="btn btn-sm btn-primary btn-minus" onclick="window.location.href='RemoveFromCart.php?item=<?php echo $p['Item_no']  ?>'">
                                        <i class="fa fa-minus"></i>
                                        </button>
                                    </div>
                                    <input type="text" class="form-control form-control-sm bg-secondary border-0 text-center" value="<?php echo $r['quantity'] ?>">
                                    <div class="input-group-btn">
                                        <button class="btn btn-sm btn-dark btn-plus" onclick="window.location.href='AddtoCart.php?item=<?php echo $p['Item_no']  ?>'" >
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                            </td>
                            <td class="align-middle"><?php echo $p["Price"]*$r['quantity']  ?></td>
                            <td class="align-middle"><button class="btn btn-sm btn-danger" onclick="window.location.href='FullRemoveFromCart.php?item=<?php echo $p['Item_no']  ?>'"><i class="fa fa-times"></i></button></td>
                        </tr>
<?php

}

?>

 </tbody>
                </table>
            </div>
            <div class="col-lg-4">
                
                <h5 class="section-title position-relative text-uppercase my-3"><span class="bg-orange px-3 py-1">Cart Summary</span></h5>
                <div class="bg-light p-30 mb-5">
                    <div class="border-bottom pb-2">
                        <div class="d-flex justify-content-between mb-3">
<?php
$tot=0;

$qt=0;
$pr=0;

$sql_cart="select * from cart where User_id='$id'";
$result=mysqli_query($conn,$sql_cart);

while($r=mysqli_fetch_array($result)){
    $pid=$r['Product_id'];
    $s="select * from products where Item_no ='$pid'";
    $res=mysqli_query($conn,$s);
    $p=mysqli_fetch_array($res);

$qt=$r['quantity'];
$pr=$p["Price"];
$tot+=($qt*$pr);


}
?>
                            <h6>Subtotal</h6>
                            <h6><?php echo $tot  ?></h6>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-medium">Shipping</h6>
                            <h6 class="font-weight-medium">100</h6>
                        </div>
                    </div>
                    <div class="pt-2">
                        <div class="d-flex justify-content-between mt-2">
                            <h5>Total</h5>
                            <h5><?php echo $tot+100;  ?></h5>
                        </div>
                        <button class="btn btn-block btn-primary font-weight-bold my-3 py-3"  onclick="window.location.href='Checkout.php'">Proceed To Checkout</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

<br><br>

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
<script></script>


<?php
}else{
    ?>
	<script>
	window.location.href="User-login.php";
	</script>
	<?php

}


?>


