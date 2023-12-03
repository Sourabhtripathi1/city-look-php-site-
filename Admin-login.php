<?php
include("config.php");

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



<body class="justify-content-center">
	<div class="container p-5 m-3 loginForm">
		<div class="col-lg-10">

			<form>
				<div class="container">
					<div class="col-lg-12">
						<form action="" method="POST">
							<div class="row mb-3">
								<label for="inputName" class="col-sm-2 col-form-label">USERNAME</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="na">
								</div>
							</div>
							<div class="row mb-3">
								<label for="inputName" class="col-sm-2 col-form-label">PASSWORD</label>
								<div class="col-sm-10">
									<input type="password" class="form-control" name="pass">
								</div>
							</div>
							<input type="submit" value="Login" name="login" class="btn btn-primary bg-orange" style="margin: 0px 30%;">

						</form>
					</div>
				</div>

				
		</div>
	</div>

</body>

</html>
<script src="contents/js/bootstrap.js"></script>
<script src="contents/js/script.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.js"></script>




<?php
if (isset( $_REQUEST["login"])) {
	$na =  $_REQUEST["na"];
	$pass =  $_REQUEST["pass"];

	$sql = "select * from admin where Username='$na' and Password='$pass'";
	$res = mysqli_query($conn, $sql);

	if (mysqli_num_rows($res) > 0) {
		$r = mysqli_fetch_array($res);
		session_start();
		$_SESSION["LoggedAdmin"] = $r["Admin_id"];
		echo $_SESSION["LoggedAdmin"];

?> 

		<script>
			window.alert("login Suuccesful");
			 window.location.href = 'admin-index.php';
		</script>

	<?php
	} else {

	?>

		<script>
			window.alert("login Failed\n Incorrect username or password");
			window.location.href = 'Admin-login.php';
		</script>

<?php
	}
}
?>