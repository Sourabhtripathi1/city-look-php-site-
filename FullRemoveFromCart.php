<?php
include("config.php");
// include('lock.php');
if (isLogged()) {


	$Userid = $_SESSION["LoggedUser"];
	$prid = $_GET["item"];


	$sql = "select * from cart where Product_id='$prid' and User_id='$Userid'";
	$res = mysqli_query($conn, $sql);
	$r = mysqli_fetch_array($res);

	$res2 = mysqli_query($conn, "delete from cart where Product_id='$prid' and User_id='$Userid'");

?>
	<script>
		window.location.href = "javascript:history.go(-1)";
	</script>

<?php

}

?>