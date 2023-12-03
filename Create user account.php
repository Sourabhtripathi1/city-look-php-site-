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

<body class="justify-content-center bg-light" >
	<div class="container p-5 m-5 loginForm">
		<div class="col-lg-12">


			<div class="container">
				<div class="col-lg-12">
					<form action="" method="post" class="FirstForm">
						<div class="row mb-3">
							<label for="inputName" class="col-sm-2 col-form-label">Enter USERNAME</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" name="na">
							</div>
						</div>
						<div class="row mb-3">
							<label for="inputName" class="col-sm-2 col-form-label">Enter PASSWORD</label>
							<div class="col-sm-10">
								<input type="password" class="form-control" name="pass">
							</div>
						</div>

						<div class="row mb-3">
							<label for="inputName" class="col-sm-2 col-form-label">Re-Enter PASSWORD</label>
							<div class="col-sm-10">
								<input type="password" class="form-control" name="repass">
							</div>
						</div>
						<input type="submit" value="Create Account" name="create" class="btn btn-primary bg-orange" style="margin: 0px 30%;">

					</form>
				</div>
			</div>


			<?php
			if (isset($_POST["create"])) {


				$na = $_POST["na"];
				$pass = $_POST["pass"];
				$repass = $_POST["repass"];
				$id = getPrID();
if($pass!=$repass){
	?>

	<script>
		window.alert("Password not matched");
		window.location.href="Create user account.php";
	</script>


<?php
}

				$sql = "insert into customer values('$id','$na','$pass',123,123,123,123,123,123,123,123,123)";

				$res=mysqli_query($conn, $sql);
			?>

				<script>
					window.alert("Account Created");
					window.location.href="Enter user details.php";
				</script>


			<?php
			}
			?>





		</div>
	</div>
</body>
<script src="contents/js/bootstrap.js"></script>
<script src="contents/js/script.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.js"></script>

</html>