<?php
    $conn = require "config.php";
    require "request.php";
    $getDeleteId = $_GET["deleteid"];
    $getId = $_GET["id"];
    echo $getDeleteId;
    echo $getid;

    switch($getId) {
        case 0:
            $del = "DELETE FROM LOGINS WHERE LOGINS_ID = '".$getDeleteId."' ";
            $tsql = $conn->prepare($del);
            $tsql->execute();
            header("location: manage.php");
            break;
        case 1:
            $del = "DELETE FROM BRANCH WHERE BRANCH_ID = '".$getDeleteId."' ";
            $tsql = $conn->prepare($del);
            $tsql->execute();
            // header("location: manage.php");
            break;
        case 2:
            $del = "DELETE FROM EMPLOYEE WHERE EMPLOYEE_ID = '".$getDeleteId."' ";
            $tsql = $conn->prepare($del);
            $tsql->execute();
            header("location: manage.php");
            break;
        case 3:
            $del = "DELETE FROM CATEGORY WHERE CATEGORY_ID = '".$getDeleteId."' ";
            $tsql = $conn->prepare($del);
            $tsql->execute();
            header("location: manage.php");
            break;
        case 4:
            $del = "DELETE FROM DEVICEOS WHERE DEVICEOS_ID = '".$getDeleteId."' ";
            $tsql = $conn->prepare($del);
            $tsql->execute();
            header("location: manage.php");
            break;
        case 5:
            $del = "DELETE FROM PRODUCT WHERE PRODUCT_ID = '".$getDeleteId."' ";
            $tsql = $conn->prepare($del);
            $tsql->execute();
            header("location: manage.php");
            break;
        case 6:
            $del = "DELETE FROM BRAND WHERE BRAND_ID = '".$getDeleteId."' ";
            $tsql = $conn->prepare($del);
            $tsql->execute();
            header("location: manage.php");
            break;
        case 7:
            $del = "DELETE FROM GALERY WHERE GALERY_ID = '".$getDeleteId."' ";
            $tsql = $conn->prepare($del);
            $tsql->execute();
            header("location: manage.php");
            break;
    }
    
?>