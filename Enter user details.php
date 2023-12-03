<?php
include('lock.php');


?>


<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>City Look</title>

	<link rel="stylesheet" href="contents/css/Boostrap.css">

	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

	<link rel="stylesheet" type="text/css" href="contents/css/style.css">
</head>

<body>

	<section id="header">
		<a href="inde.php"><img src="" alt="" class="logo"></a>


		<p>Welcome <?php echo $_SESSION['LoggedUser'] ?></p>
	</section>
	<br><br>

	<div class="container">
		<div class="col-lg-12">
			<form action="" method="post" class="FirstForm">
				<div class="row mb-3">
					<label for="inputName" class="col-sm-2 col-form-label">Name</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="na">
					</div>
				</div>
				<div class="row mb-3">
					<label for="inputName" class="col-sm-2 col-form-label">Email</label>
					<div class="col-sm-10">
						<input type="email" class="form-control" name="mail">
					</div>
				</div>

				<div class="row mb-3">
					<label for="inputName" class="col-sm-2 col-form-label">Contact</label>
					<div class="col-sm-10">
						<input type="tel" class="form-control" name="con">
					</div>
				</div>

				<div class="row mb-3">
					<label for="inputName" class="col-sm-2 col-form-label">House no</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="hno">
					</div>
				</div>

				<div class="row mb-3">
					<label for="inputName" class="col-sm-2 col-form-label">Street</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="str">
					</div>
				</div>

				<div class="row mb-3">
					<label for="inputName" class="col-sm-2 col-form-label">Area</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="area">
					</div>
				</div>

				<div class="row mb-3">
					<label for="inputName" class="col-sm-2 col-form-label">District</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="dist">
					</div>
				</div>
				<div class="row mb-3">
					<label for="inputName" class="col-sm-2 col-form-label">State</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="state">
					</div>
				</div>

				<div class="row mb-3">
					<label for="inputName" class="col-sm-2 col-form-label">PINCODE</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="pin">
					</div>
				</div>
				<input type="submit" value="Save" name="save" class="btn btn-primary bg-orange" style="margin: 0px 30%;">

			</form>
		</div>
	</div>

	<?php
	if (isset($_REQUEST["save"])) {
		$id = $_SESSION['LoggedUser'];
		$na = $_REQUEST["na"];
		$mail = $_REQUEST["mail"];
		$con = $_REQUEST["con"];
		$hno = $_REQUEST["hno"];
		$str = $_REQUEST["str"];
		$area = $_REQUEST["area"];
		$dist = $_REQUEST["dist"];
		$state = $_REQUEST["state"];
		$pin = $_REQUEST["pin"];

		$sql = "update customer set
Name='$na',
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
				window.alert("Record Saved");
				window.location.href = "User-Dashboard.php";
			</script>

	<?php
		}
	}
	?>



</body>
<script src="contents/js/bootstrap.js"></script>
<script src="contents/js/script.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.js"></script>

</html>