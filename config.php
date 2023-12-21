<?php
//$conn = mysqli_connect("sql105.epizy.com", "epiz_34119570", "SvT6GFFgkTJ", "epiz_34119570_citylook");
 $conn = mysqli_connect("sql12.freemysqlhosting.net", "sql12671981", "6a3FPd7l2Q", "sql12671981");

?>

<?php


function isLogged()
{
    session_start();
    if (isset($_SESSION["LoggedUser"])) {
        return 1;
    } else {
?>
        <script>
            window.alert("Login Firts");
            window.location.href = "User-login.php";
        </script>
<?php
        return 0;
    }
}

function AdminisLogged()
{
    session_start();
    if (isset($_SESSION["LoggedAdmin"])) {
        return 1;
    } else {
?>
        <script>
            window.alert("Login Firts");
            window.location.href = "Admin-login.php";
        </script>
<?php
        return 0;
    }
}





function getOrderID($n = 6)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';

    for ($i = 0; $i < $n; $i++) {
        $index = rand(0, strlen($characters) - 1);
        $randomString .= $characters[$index];
    }

    return $randomString;
}

function getPrID($n = 6)
{
    $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';

    for ($i = 0; $i < $n; $i++) {
        $index = rand(0, strlen($characters) - 1);
        $randomString .= $characters[$index];
    }

    return $randomString;
}


function ArToStr(array $x)
{
    return (serialize($x));
}

function StrToAr(string $x)
{
    return unserialize($x);
}


function Arst(array $x)
{
    $sxs = " ";
    for ($i = 0; $i < count($x); $i++) {
        if ($i == 0) {
            $sxs .= $x[$i];
        } else {
            $sxs .= " , " . $x[$i];
        }
    }
    return $sxs;
}
?>
