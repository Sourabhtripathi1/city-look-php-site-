<?php
include("config.php");
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
			<li><a href="about us.php">About us</a> </li>
			<li><a href="contact us.php" class="active">Contact us</a></li>

			<?php
			if (isset($_SESSION["LoggedUser"])) {
			?><li><a href="User-Dashboard.php">My Account</a></li>
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
			?> <li><a href="User-Dashboard.php">My Account</a></li>
				<li class="al-end"><a href="Wishlist.php"><i class="fa-solid fa-heart"></i></a></li>
				<li class="al-end"><a href="myCart.php"><i class="fa-solid fa-cart-shopping"></i></a></li>
			<?php
			} else {
			?>
				<a href="User-Dashboard.php.php"><i class="fa-solid fa-user"></i></a>

			<?php
			}
			?>
			<a href="#" class="menubtn" id="mnubtn" onclick="openNav()"><i class="fa-solid fa-bars "></i> </a>
			<a href="#" id="close" onclick="closeNav()"><i class="fa-solid fa-times"></i> </a>

		</div>

	</section>
	<br>

	<section class="m-4">

		<div class="container-fluid">
			<h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4  bg-orange m-3 p-3 "><span class="pr-3">Contact &nbsp; Us</span>
			</h2>
			<div class="row px-xl-5">
				<div class="col-lg-7 mb-5">
					<div class="contact-form p-30">
						<div id="success"></div>
						<form name="sentMessage" id="contactForm" novalidate="novalidate" class="bg-prime p-3">
							<div class="control-group">
								<input type="text" class="form-control" id="name" placeholder="Your Name" required="required" data-validation-required-message="Please enter your name" />
								<p class="help-block text-danger"></p>
							</div>
							<div class="control-group">
								<input type="email" class="form-control" id="email" placeholder="Your Email" required="required" data-validation-required-message="Please enter your email" />
								<p class="help-block text-danger"></p>
							</div>
							<div class="control-group">
								<input type="text" class="form-control" id="subject" placeholder="Subject" required="required" data-validation-required-message="Please enter a subject" />
								<p class="help-block text-danger"></p>
							</div>
							<div class="control-group">
								<textarea class="form-control" rows="8" id="message" placeholder="Message" required="required" data-validation-required-message="Please enter your message"></textarea>
								<p class="help-block text-danger"></p>
							</div>
							<div>
								<button class="btn bg-orange py-2 px-4" type="submit" id="sendMessageButton">Send
									Message</button>
							</div>
						</form>
					</div>
				</div>
				<div class="col-lg-5 mb-5">
					<div class="bg-light p-30 mb-30">
						<iframe style="width: 100%; height: 250px;" src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d3611.6493321013722!2d75.8846508!3d25.1475437!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sin!4v1682949276838!5m2!1sen!2sin"  allowfullscreen="true" loading="lazy" referrerpolicy="no-referrer-when-downgrade" ></iframe>
					</div>
					<div class="bg-light p-3 mb-5 mt-3">
						<p class="mb-2"><i class="fa fa-map-marker-alt text-orange me-3"></i>3B9 kanswa, Kota Industrial Area, Kota, Rajasthan 324004
						</p>
						<p class="mb-2"><i class="fa fa-envelope text-orange me-3"></i>ganeshprasadtripathi38@gmail.com</p>
						<p class="mb-2"><i class="fa fa-phone-alt text-orange me-3"></i>+91 8619826308</p>
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