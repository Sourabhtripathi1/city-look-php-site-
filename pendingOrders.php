<?php

include('config.php');
if (isLogged()) {
}


?>

<!Doctype HTML>
<html>

<head>
	<title>My Account</title>
	<link rel="stylesheet" href="css/style.css" type="text/css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<style>
		body {
			margin: 0px;
			padding: 0px;
			background-color: #1b203d;
			overflow: hidden;
			font-family: system-ui;
		}

		.clearfix {
			clear: both;
		}

		.logo {
			margin: 0px;
			margin-left: 28px;
			font-weight: bold;
			color: white;
			margin-bottom: 30px;
		}

		.logo span {
			color: #f7403b;
		}

		.sidenav {
			height: 100%;
			width: 300px;
			position: fixed;
			z-index: 1;
			top: 0;
			left: 0;
			background-color: #272c4a;
			overflow: hidden;
			transition: 0.5s;
			padding-top: 30px;
		}

		.sidenav a {
			padding: 15px 8px 15px 32px;
			text-decoration: none;
			font-size: 20px;
			color: #818181;
			display: block;
			transition: 0.3s;
		}

		.sidenav a:hover {
			color: #f1f1f1;
			background-color: #1b203d;
		}

		.sidenav {
			position: absolute;
			top: 0;
			right: 25px;
			font-size: 36px;
		}

		#main {
			transition: margin-left .5s;
			padding: 16px;
			margin-left: 300px;
		}

		.head {
			padding: 20px;
		}

		.col-div-6 {
			width: 50%;
			float: left;
		}

		.profile {
			display: block;
			float: right;
			width: 160px;
		}

		.pro-img {
			float: left;
			width: 40px;
			margin-top: 5px;
		}

		.profile p {
			color: white;
			font-weight: 500;
			margin-left: 55px;
			margin-top: 10px;
			font-size: 13.5px;
		}

		.profile p span {
			font-weight: 400;
			font-size: 12px;
			display: block;
			color: #8e8b8b;
		}

		.col-div-3 {
			width: 25%;
			float: left;
		}

		.box {
			width: 85%;
			height: 100px;
			background-color: #272c4a;
			margin-left: 10px;
			padding: 10px;
		}

		.box p {
			font-size: 35px;
			color: white;
			font-weight: bold;
			line-height: 30px;
			padding-left: 10px;
			margin-top: 20px;
			display: inline-block;
		}

		.box p span {
			font-size: 20px;
			font-weight: 400;
			color: #818181;
		}

		.box-icon {
			font-size: 40px !important;
			float: right;
			margin-top: 35px !important;
			color: #818181;
			padding-right: 10px;
		}

		.col-div-8 {
			width: 70%;
			float: left;
		}

		.col-div-4 {
			width: 30%;
			float: left;
		}

		.content-box {
			padding: 20px;
		}

		.content-box p {
			margin: 0px;
			font-size: 20px;
			color: #f7403b;
		}

		.content-box p span {
			float: right;
			background-color: #ddd;
			padding: 3px 10px;
			font-size: 15px;
		}

		.box-8,
		.box-4 {
			width: 95%;
			background-color: #272c4a;
			height: 330px;

		}

		.nav2 {
			display: none;
		}

		.box-8 {
			margin-left: 10px;
		}

		table {
			font-family: arial, sans-serif;
			border-collapse: collapse;
			width: 100%;

		}

		td,
		th {
			text-align: left;
			padding: 15px;
			color: #ddd;
			border-bottom: 1px solid #81818140;
		}

		.circle-wrap {
			margin: 50px auto;
			width: 150px;
			height: 150px;
			background: #e6e2e7;
			border-radius: 50%;
		}

		.circle-wrap .circle .mask,
		.circle-wrap .circle .fill {
			width: 150px;
			height: 150px;
			position: absolute;
			border-radius: 50%;
		}

		.circle-wrap .circle .mask {
			clip: rect(0px, 150px, 150px, 75px);
		}

		.circle-wrap .circle .mask .fill {
			clip: rect(0px, 75px, 150px, 0px);
			background-color: #f7403b;
		}

		.circle-wrap .circle .mask.full,
		.circle-wrap .circle .fill {
			animation: fill ease-in-out 3s;
			transform: rotate(126deg);
		}

		@keyframes fill {
			0% {
				transform: rotate(0deg);
			}

			100% {
				transform: rotate(126deg);
			}
		}

		.circle-wrap .inside-circle {
			width: 130px;
			height: 130px;
			border-radius: 50%;
			background: #fff;
			line-height: 130px;
			text-align: center;
			margin-top: 10px;
			margin-left: 10px;
			position: absolute;
			z-index: 100;
			font-weight: 700;
			font-size: 2em;
		}
	</style>


</head>
<?php
$pid = $_SESSION["LoggedUser"];
$s = "select * from customer where User_id  ='$pid'";

$res = mysqli_query($conn, $s);
$p = mysqli_fetch_array($res);

?>

<body>

<div id="mySidenav" class="sidenav">
		<p class="logo"><span>City</span> Look</p>
		<a href="index.php" class="icon-a"><i class="fa fa-home icons"></i> &nbsp;&nbsp;Home</a>
		<a href="User-Dashboard.php" class="icon-a"><i class="fa fa-dashboard icons"></i> &nbsp;&nbsp;Dashboard</a>
		<a href="pendingOrders.php" class="icon-a"><i class="fa fa-tasks icons"></i> &nbsp;&nbsp;Pending Orders</a>
		<a href="myOrder.php" class="icon-a"><i class="fa fa-shopping-bag icons"></i> &nbsp;&nbsp;Orders</a>
		<a href="Edit-User-Account.php" class="icon-a"><i class="fa fa-user icons"></i> &nbsp;&nbsp;Edit Account</a>
		<a href="Logout.php" class="icon-a"><i class=""></i> &nbsp;&nbsp;Logout</a>
	</div>
	
	<div id="main">

		<div class="head">
			<div class="col-div-6">
				<span style="font-size:30px;cursor:pointer; color: white;" class="nav">&#9776; Dashboard</span>
				<span style="font-size:30px;cursor:pointer; color: white;" class="nav2">&#9776; Dashboard</span>
			</div>

			<div class="col-div-6">
				<div class="profile">
					<p><?php echo $p["Name"]  ?></p>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>

		<div class="clearfix"></div>
		<br />

		<table class="table">
			<tr>
				<th>Item</th>
				<th>Price</th>
				<th>Quanity</th>
				<th>Order_date</th>
				<th>Status</th>
			</tr>

			<?php
			$id = $_SESSION['LoggedUser'];

			$res = mysqli_query($conn, "Select * from orders where User_id='$id' and not Status='Dilevered'");
			while ($r = mysqli_fetch_array($res)) {

				$it = $r['Item'];
	
				$res2 = mysqli_query($conn, "Select * from products where Item_no ='$it'");
				$r2 = mysqli_fetch_array($res2);
			?>

				<tr>
					<td><?php echo $r2['Item_name'] ?></td>
					<td><?php echo $r['Price'] ?></td>
					<td><?php echo $r['Quanity'] ?></td>

					<td><?php echo $r['Order_date'] ?></td>
					<td><?php echo $r['Status'] ?></td>

				</tr>

			<?php
			}
			?>

		</table>
		<br /><br />
		<div class="clearfix"></div>
	</div>


	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script>
		$(".nav").click(function() {
			$("#mySidenav").css('width', '70px');
			$("#main").css('margin-left', '70px');
			$(".logo").css('visibility', 'hidden');
			$(".logo span").css('visibility', 'visible');
			$(".logo span").css('margin-left', '-10px');
			$(".icon-a").css('visibility', 'hidden');
			$(".icons").css('visibility', 'visible');
			$(".icons").css('margin-left', '-8px');
			$(".nav").css('display', 'none');
			$(".nav2").css('display', 'block');
		});

		$(".nav2").click(function() {
			$("#mySidenav").css('width', '300px');
			$("#main").css('margin-left', '300px');
			$(".logo").css('visibility', 'visible');
			$(".icon-a").css('visibility', 'visible');
			$(".icons").css('visibility', 'visible');
			$(".nav").css('display', 'block');
			$(".nav2").css('display', 'none');
		});
	</script>

</body>


</html>