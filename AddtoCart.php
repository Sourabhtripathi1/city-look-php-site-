<?php
include("config.php");
// include('lock.php');
if (isLogged()) {


	$Userid = $_SESSION["LoggedUser"];
	$prid = $_GET["item"];
	$q = 1;
	$date = date("d-m-Y");

	$sql_ch = "select * from cart where Product_id='$prid' and User_id='$Userid'";
	$rs = mysqli_query($conn, $sql_ch);


	if (mysqli_num_rows($rs) <= 0) {

		$sql = "insert into cart(Product_id,User_id,quantity,Date_of_add) values('$prid','$Userid','$q','$date')";
		$res = mysqli_query($conn, $sql);

?>
		<script>
			window.location.href = "javascript:history.go(-1)";
		</script>

		<?php
	} else {

		$r = mysqli_fetch_array($rs);

		$i = $r["quantity"];
		$i++;

		$sql_udp = "update cart 
					set quantity='$i' 
					where Product_id='$prid' and User_id='$Userid'";

		$res = mysqli_query($conn, $sql_udp);

		if ($res) {
		?>
			<script>
				window.location.href = "javascript:history.go(-1)";
			</script>

		<?php
		} else {
		?>
			<script>
				window.alert("Can not add to cart");
				window.location.href = "javascript:history.go(-1)";
			</script>

	<?php

		}
	}
} else {

	?>
	<script>
		window.location.href = "User-login.php";
	</script>
<?php

}
?>


<script>
	window.location.href = "javascript:history.go(-1)";
</script>