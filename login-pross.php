<?php
    $conn = require "config.php";
    $eid = 2;
    $qr_brand = "SELECT ADDRESS FROM EMPLOYEE WHERE EMPLOYEE_ID = :eid ";
                    $brand_id = $conn->prepare($qr_brand);
                    $brand_id->execute(['eid'=> $eid]);
                    $brandid = $brand_id->fetchColumn();
                    echo $brandid;




?>