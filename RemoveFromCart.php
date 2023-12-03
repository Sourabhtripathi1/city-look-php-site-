<?php
include("config.php");
// include('lock.php');
if (isLogged()) {


	$Userid = $_SESSION["LoggedUser"];
	$prid = $_GET["item"];


$sql="select * from cart where Product_id='$prid' and User_id='$Userid'";
$res=mysqli_query($conn,$sql);
$r=mysqli_fetch_array($res);

if($r["quantity"]<1){
	$sql_del="delete from cart where Product_id='$prid' and User_id='$Userid'";
}else{
$i=$r["quantity"];
$i--;
 	$sql_del = "update cart 
	set quantity='$i' 
	where Product_id='$prid' and User_id='$Userid'";
}

$res2=mysqli_query($conn,$sql_del);

?>
			<script>
				window.location.href = "javascript:history.go(-1)";
			</script>

	<?php

}

?>