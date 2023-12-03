<?php
include('config.php');
?>

<?php
$picture=array();
$rs=mysqli_query($conn,"SELECT * FROM pictures Where Product_id='M8IMMF'");
while($r=mysqli_fetch_array($rs)){
	array_push($picture,$r['pic']);

}

?>

<img src="contents/images/<?php echo $picture[0]  ?>" height="100%" width="100%" alt="">