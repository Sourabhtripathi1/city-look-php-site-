<?php
include('config.php');

if(isLogged()){
$Userid = $_SESSION["LoggedUser"];
	$prid = $_GET["item"];

	echo $prid;
	echo $Userid;

	$sql="delete from wishlist where Product_id='$prid' and User_id='$Userid'";
	$res = mysqli_query($conn, $sql);

if($res){

	?>
	<script>
		window.location.href = "javascript:history.go(-1)";
	</script>

<?php
}


}
	