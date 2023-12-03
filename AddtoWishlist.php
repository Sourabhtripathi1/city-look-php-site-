<?php
include('config.php');

if (isLogged()) {
	$Userid = $_SESSION["LoggedUser"];
	$prid = $_GET["item"];
	$date = date("d-m-Y");

	$sql_ch = "select * from wishlist where Product_id='$prid' and User_id='$Userid'";
	$rs = mysqli_query($conn, $sql_ch);


	if (mysqli_num_rows($rs) <= 0) {

		$sql = "insert into wishlist(Product_id,User_id,Date_of_add) values('$prid','$Userid','$date')";
		$res = mysqli_query($conn, $sql);


?>
		<script>
			window.location.href = "javascript:history.go(-1)";
		</script>

	<?php
	} else {
	?>
		<script>
			window.alert("Added to Wishlist");
			window.location.href = "javascript:history.go(-1)";
		</script>
<?php

	}
}
?>