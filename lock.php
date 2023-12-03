<?php
include('config.php');
if(isLogged()==false){

?>
<script>
	window.alert("User not logged \n Please Login First");
window.location.href="User-login.php";
</script>
<?php
}

?>