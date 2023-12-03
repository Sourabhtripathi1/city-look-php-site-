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


	<?php
	$pid = $_REQUEST["item"];
	$s = "select * from products where Item_no ='$pid'";

	$res = mysqli_query($conn, $s);
	$p = mysqli_fetch_array($res);

	$picture = array();
	$item = $_REQUEST["item"];
	$rs_pic = mysqli_query($conn, "SELECT * FROM pictures Where Product_id='$item'");
	while ($r_pic = mysqli_fetch_array($rs_pic)) {
		array_push($picture, $r_pic['pic']);
	}

	?>


	<!-- menu end -->
	<br><br>
	<!-- Shop Detail Start -->
	<div class="container-fluid p-5">
		<div class="row px-xl-5">
			<div class="col-lg-5 mb-30">
				<div id="product-carousel" class="carousel slide" data-ride="carousel">
					<div class="owl-carousel vendor-carousel2 bg-light">
						<?php
						foreach($picture as $pict){
						?>
						<div class="">
						<img class="img-fluid w-100" src="contents/images/<?php echo $pict  ?>" alt="Image" />
						</div>
						<?php
						}
						?>

					</div>
					<a class="carousel-control-prev" href="#product-carousel" data-slide="prev">
						<i class="fa fa-2x fa-angle-left text-dark"></i>
					</a>
					<a class="carousel-control-next" href="#product-carousel" data-slide="next">
						<i class="fa fa-2x fa-angle-right text-dark"></i>
					</a>
				</div>
			</div>

			<div class="col-lg-7 h-auto mb-30">
				<div class="h-100 bg-light p-30">
					<h3><?php echo $p["Item_name"] ?></php>
					</h3>


					<h3 class="font-weight-semi-bold mb-4"><?php echo $p["Price"] ?></h3>
					<p class="mb-4"><?php echo $p["Short_Description"] ?></p>
					<!-- <div class="d-flex mb-3">
						<strong class="text-dark mr-3">Sizes:</strong>
						<form class="d-flex">
							<?php

							$sz = StrToAr($p["Size"]);

							foreach ($sz as $s) {
							?>
								<div class="custom-control custom-radio custom-control-inline mx-2">
									<input type="radio" class="custom-control-input RadioSizeId" name="size"  name="size" value="<?php echo $s ?>">
									<label class="custom-control-label" for="size-1"><?php echo $s ?></label>
								</div>


							<?php

							}

							?>
						</form>
					</div>
	 			<div class="d-flex  mb-4 pt-2">
						<div class="input-group quantity mr-3" style="width: 130px;">
							<div class="input-group-btn">
								<button class="btn btn-primary btn-minus" onclick="BuyBoxminus(document.getElementById('BuyBox').value);">
									<i class="fa fa-minus"></i>
								</button>
							</div>
							<input type="text" id="BuyBox" class="form-control bg-secondary border-0 text-center" value="1"  name="qty">
							<div class="input-group-btn">
								<button class="btn btn-primary btn-plus" onclick="BuyBoxplus(document.getElementById('BuyBox').value);">
									<i class="fa fa-plus"></i>
								</button>
							</div>
						</div>
					</div>
					<div>
						-->
					<!-- <button class="btn btn-primary px-3" onclick="Buynow()"><i class="fa fa-dollar mr-1"></i> Buy now</button> -->
					<a href="AddtoCart.php?item=<?php echo $pid;  ?>"><button class="btn btn-primary px-3"><i class="fa fa-shopping-cart mr-1"></i> Add To Cart</button></a>
					<a href="AddtoWishlist.php?item=<?php echo $pid;  ?>"><button class="btn btn-primary px-3"><i class="fa fa-heart mr-1"></i> Add To Wishlist</button></a>
				</div>
				<!-- <div class="d-flex pt-2">
						<strong class="text-dark mr-2">Share on:</strong>
						<div class="d-inline-flex">
							<a class="text-dark px-2" href="">
								<i class="fab fa-facebook-f"></i>
							</a>
							<a class="text-dark px-2" href="">
								<i class="fab fa-twitter"></i>
							</a>
							<a class="text-dark px-2" href="">
								<i class="fab fa-linkedin-in"></i>
							</a>
							<a class="text-dark px-2" href="">
								<i class="fab fa-pinterest"></i>
							</a>
						</div>
					</div>
			-->
			</div>
		</div>
	</div>

	<br><br>
	<div class="row px-xl-5">
		<div class="col">
			<div class="bg-light p-30">
				<div class="nav nav-tabs mb-4">
					<a class="nav-item nav-link text-dark active" data-toggle="tab" href="#tab-pane-1">Description</a>
				</div>
				<div class="tab-content">
					<div class="tab-pane fade show active" id="tab-pane-1">
						<h4 class="mb-3">Product Description</h4>
						<p><?php echo $p["Long_Descripion"] ?></p>
					</div>
				</div>
				<br><br>

				<div class="container container-fluid">
					<h1 class="text-center">Similar Products
					</h1>
					<br />
					<div class="row">
						<div class="col">
							<div class="owl-carousel vendor-carousel">
								<?php

								$cat = StrToAr($p["Category"]);
								$sql1 = "select * from products where  Category LIKE '%$cat[0]%'";

								// for ($i = 0; $i < count($cat); $i++) {
								// 	if ($i == 0) {
								// 		$sql1 .= " Category LIKE '%$cat[$i]%'";
								// 	} else {
								// 		$sql1 .= " or LIKE '%$cat[$i]%'";
								// 	}
								//}
								$j = 0;
								$res = mysqli_query($conn, $sql1);
								while (($r = mysqli_fetch_array($res))) {
									if ($j < 13) {
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
														<div class="product-action">
															<a class="btn btn-outline-dark btn-square" href="AddtoCart.php?item=<?php echo $r["Item_no"];  ?>"><i class="fa fa-shopping-cart"></i></a>
															<a class="btn btn-outline-dark btn-square" href="AddtoWishlist.php?item=<?php echo $r["Item_no"];  ?>"><i class="far fa-heart"></i></a>
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
										$j++;
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



				<div class="row d-flex justify-content-center">
					<div class="col-lg-6 ">
						<h4 class="mb-4">Leave a review</h4>
						<small>Your email address will not be published. Required fields are marked *</small>

						<form action="" method="post">
							<div class="form-group">
								<label for="message">Your Review *</label>
								<textarea id="message" cols="30" rows="5" class="form-control" name="msg"></textarea>
							</div>
							<div class="form-group">
								<label for="name">Your Name *</label>
								<input type="text" class="form-control" id="name" name="na">
							</div>
							<div class="form-group">
								<label for="email">Your Email *</label>
								<input type="email" class="form-control" id="email" name="meil">
							</div>
							<div class="form-group mb-0 d-flex justify-content-center">
								<input type="submit" value="Leave Your Review" class="btn btn-primary px-3 my-3" name="review">
							</div>
						</form>
					</div>
				</div>
				<?php
				if (isset($_POST['review'])) {

					$pr = $p["Item_no"];
					$na = $_SESSION["LoggedUser"];
					$msg = $_REQUEST["msg"];
					$date = date("d-m-y");


					$sql = "insert into review(Product_id,User_id,Conent,Date) values('$pr','$na','$msg','$date')";

					$res = mysqli_query($conn, $sql);
				}



				?>
				<br><br>
				<h4 class="mb-4">Reviews"</h4>
				<div class=" row d-flex justify-content-center">
					<div class="row ">
						<?php
						$idc = $_REQUEST["item"];
						$idu = $_SESSION['LoggedUser'];
						$sql = "select * from review where Product_id='$idc'";
						$sqlu = "select Name from customer Where User_id ='$idu'";

						$resr = mysqli_query($conn, $sql);
						$resu = mysqli_query($conn, $sqlu);
						$r3 = mysqli_fetch_array($resu);

						while ($r2 = mysqli_fetch_array($resr)) {

						?>
							<div class="media mb-4">

								<div class="media-body">
									<h6><?php echo $r3["Name"]  ?><small> - <i><?php echo $r2["Date"]  ?></i></small></h6>

									<p><?php echo $r2["Conent"]  ?></p>
								</div>
							</div>

						<?php
						}
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
	</div>
	</div>
	</div>
	<!-- Shop Detail End -->







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

	$(".vendor-carousel2").owlCarousel({
		loop: true,
		margin: 10,
		nav: true,
		items: 1,

	});
</script>


<!-- <script>
	function Buynow() {
	const qty=document.getElementById('BuyBox').value;
	
		var sz=document.getElementsByName('size').value;

		window.alert.href="Checkout.php?qty='qty'&size='sz'";

		alert("hi");
	}
</script> -->


<script>
	function BuyBoxplus(x) {

		num = parseInt(x);
		num++;
		document.getElementById('BuyBox').value = num.toString();

	}
</script>
<script>
	function BuyBoxminus(x) {

		num = parseInt(x);
		if (num >= 0) {
			num--;
			document.getElementById('BuyBox').value = num.toString();
		} else {
			return;
		}
	}
</script>