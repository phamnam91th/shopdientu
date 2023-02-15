<?php
    if(isset($_COOKIE["PHPSESSID"])) {
        setcookie("PHPSESSID",$_COOKIE["PHPSESSID"], time() - 60, "/");
        header("location: login.php");
    } else {
        header("location: login.php");
    }




?>