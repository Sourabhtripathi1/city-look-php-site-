<?php

include('config.php');

if(AdminisLogged()){
	session_destroy();
?>


<script>
           
            window.location.href = "Admin-login.php";
        </script>

<?php

}
?>