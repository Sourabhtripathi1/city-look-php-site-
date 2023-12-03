<?php

include('config.php');

if (isLogged()) {
	$id = $_SESSION["LoggedUser"];
	$sql = "SELECT * FROM customer where User_id='$id' ";

	$res = mysqli_query($conn, $sql);
	$user = mysqli_fetch_array($res);


	$sql_cart = "select * from cart where User_id='$id'";
	$result = mysqli_query($conn, $sql_cart);
	$total = 0;

	$odrno = getOrderID();
	$sql_ins_user_order = "Insert into user_orders(User_id,Order_no) values('$id','$odrno')";
	$res = mysqli_query($conn, $sql_ins_user_order);

	while ($cr = mysqli_fetch_array($result)) {
		$pid = $cr['Product_id'];
		$s = "select * from products where Item_no ='$pid'";

		$res = mysqli_query($conn, $s);
		$p = mysqli_fetch_array($res);
		$total += $p["Price"] * $cr["quantity"];

		$Uid = $_SESSION["LoggedUser"];
		$item = $p['Item_no'];
		$Price = $p["Price"];
		$qty = $cr["quantity"];
		$date = date("d-m-y");
		$methd = "Cash On Dilevery";
		$status = "Placed";
		$hno = $user["House_no"];
		$add = $user["House_no"] . "," . $user["Street"] . "," . $user["Area"] . "," . $user["District"] . "," . $user["State"];
		$pin = $user["PINCODE"];
		$stk=$p["Stock"];
		$udp_qt = $stk - $qty;

		$SQL_INS = "INSERT INTO orders(Order_no,User_id,Item,Price,Quanity,Order_date,Status,Payment_method,House_no,Address,PINCODE)  values('$odrno','$Uid','$item','$Price','$qty','$date','$status','$methd','$hno','$add','$pin')";

		$res_ins = mysqli_query($conn, $SQL_INS);


		$sql_del = "delete from cart where User_id='$Uid' and Product_id='$item'";
		$res_del = mysqli_query($conn, $sql_del);

		$res_stk = mysqli_query($conn, "update products set Stock=$udp_qt where Item_no ='$pid' ");
	}

?>
	<script>
		window.alert("Order placed");
		window.location.href = "javascript:history.go(-2)";
	</script>
<?php



}
