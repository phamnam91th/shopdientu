<?php
    

    //ham hien thi danh sach san pham
    function showlist($sql,$flag) {
        $conn = require "config.php";
        $tsql = $conn->prepare($sql);
        $tsql->execute();
        $results = $tsql->fetchAll(PDO::FETCH_ASSOC);
        $count = count($results);
        if($flag=="ok") {
            echo "<h3 class='text-center'>Tim thay $count san pham lien quan cho tu khoa '".$_GET["search"]."' </h3>";
        } ;
        if($flag=="none") {

        }
        if($count>0) {
            $num = 1;
            foreach($results as $row) {
                $pdname = $row["PNAME"];
                $pdprice = $row["PPRICE"];
                $pddiscount = $row["PDISCOUNT"];
                $pdthumbnail = $row["GTHUMBNAIL"];
                $des = $row["PDESCRIPTION"];
                echo   '<div class=" col-lg-3 col-md-4 col-sm-6 text-center mb-3" >
                            <div id="box'.$num.'" class="box">
                                <img class="w-50 picture-item" src="'.$pdthumbnail.'" alt="" >
                                <div class="popup row show-infor bg-dark" id="popup'.$num.'" style="width: 350px;height:auto;" >
                                    <div class="col-4">
                                        <img class="w-100 pt-3"  src="'.$pdthumbnail.'" alt="">
                                        <p class="text-light">Thong tin ve san pham</p>
                                    </div>
                                    <div class="col-8">
                                        <p class="text-light pt-3 text-break">'.$des.'</p>
                                    </div>
                                </div>
                            </div>
                            <div class="p-2 d-flex flex-column align-items-center " >  
                                <span class="fs-6 fw-bold">'.$pdname.'</span>
                                <span>'.number_format($pdprice,0).' đ</span>
                                <button class="btn btn-primary">BUY</button>
                            </div>
                        </div>';
                $num++;
            }
        } else {
            echo "<h4>Khong co san pham nao tim thay</h4>";
        }
    }

    //hien thi sanh sach nhan hieu cua cac san pham
    function showbrand($qr) {
        $conn = require "config.php";
        if(isset( $_GET["product"])) {
            $pdl = $_GET["product"];
            // echo $pdl;
            $tsql = $conn->prepare($qr);
            $tsql->execute();
            $results = $tsql->fetchAll(PDO::FETCH_ASSOC);
            foreach($results as $key) {
                echo '<li class="list-group-item  me-2  text-center "> <a class="text-center border rounded-pill px-3" href="index.php?product='.$pdl.'&brand='.$key["BRAND_ID"].' ">'.$key["NAME"].'</a> </li>';
            }
        }
    };

    //lay gia tri tim kiem
    if(isset($_GET["btn_search"])) {
        if(!empty($_GET["search"])) {
            $item = $_GET["search"];
            $item_name = "%";
            if(strlen($item)>=2) {  //tren 2 ky tu moi bat dau cho tim kiem
                for($s=0; $s<strlen($item);$s++) {
                    if($item[$s]==" ") {
                        continue;
                    }
                    $GLOBALS["item_name"] =  $item_name.$item[$s]."%";
                    // echo $item[$s]. "<br>";
                }
                // $pd = "%".$item."%";
                $pd = $GLOBALS["item_name"];
            }
        }
    }

    $qr = "SELECT DISTINCT B.NAME FROM product P INNER JOIN brand B ON P.BRAND_ID = B.BRAND_ID WHERE P.CATEGORY_ID = 4";
    $note = "none";
    $sql = "SELECT P.NAME PNAME,P.PRICE PPRICE,P.DISCOUNT PDISCOUNT,P.DESCRIPTION PDESCRIPTION,CONCAT(DIR,FILENAME)  GTHUMBNAIL,C.NAME CNAME FROM product P INNER JOIN galery G ON P.PRODUCT_ID = G.PRODUCT_ID INNER JOIN category C ON P.CATEGORY_ID = C.CATEGORY_ID WHERE C.NAME = 'PHONE' ";
    $br = ""; //khoi tao bien brand_id
    $pd = "phone";
    if(isset($_GET["product"])) {
        $pd = $_GET["product"];
    }
    if(isset($_GET["brand"])) {
        $br = $_GET["brand"];
    }
    switch($pd) {  //hien thi danh sach san pham dua tren gia tri truyen vao
        case "phone":
            $note = "none";
            $qr = "SELECT DISTINCT B.BRAND_ID,B.NAME FROM product P INNER JOIN brand B ON P.BRAND_ID = B.BRAND_ID WHERE P.CATEGORY_ID = 4";
            if($br == "all" || $br == null) {
                $sql = "SELECT P.NAME PNAME,P.PRICE PPRICE,P.DISCOUNT PDISCOUNT,P.DESCRIPTION PDESCRIPTION,CONCAT(DIR,FILENAME)  GTHUMBNAIL,C.NAME CNAME FROM product P INNER JOIN galery G ON P.PRODUCT_ID = G.PRODUCT_ID INNER JOIN category C ON P.CATEGORY_ID = C.CATEGORY_ID WHERE C.NAME = 'PHONE' ";
            } else {
                $sql = "SELECT P.NAME PNAME,P.PRICE PPRICE,P.DISCOUNT PDISCOUNT,P.DESCRIPTION PDESCRIPTION,CONCAT(DIR,FILENAME)  GTHUMBNAIL,C.NAME CNAME FROM product P INNER JOIN galery G ON P.PRODUCT_ID = G.PRODUCT_ID INNER JOIN category C ON P.CATEGORY_ID = C.CATEGORY_ID WHERE C.NAME = 'PHONE' AND P.BRAND_ID = '".$br."' ";
            }
            break;
        case "laptop":
            $note = "none";
            $qr = "SELECT DISTINCT B.BRAND_ID,B.NAME FROM product P INNER JOIN brand B ON P.BRAND_ID = B.BRAND_ID WHERE P.CATEGORY_ID = 6";
            if($br == "all" || $br == null) {
                $sql = "SELECT P.NAME PNAME,P.PRICE PPRICE,P.DISCOUNT PDISCOUNT,P.DESCRIPTION PDESCRIPTION,CONCAT(DIR,FILENAME)  GTHUMBNAIL,C.NAME CNAME FROM product P INNER JOIN galery G ON P.PRODUCT_ID = G.PRODUCT_ID INNER JOIN category C ON P.CATEGORY_ID = C.CATEGORY_ID WHERE C.NAME = 'LAPTOP' ";
            } else {
                $sql = "SELECT P.NAME PNAME,P.PRICE PPRICE,P.DISCOUNT PDISCOUNT,P.DESCRIPTION PDESCRIPTION,CONCAT(DIR,FILENAME)  GTHUMBNAIL,C.NAME CNAME FROM product P INNER JOIN galery G ON P.PRODUCT_ID = G.PRODUCT_ID INNER JOIN category C ON P.CATEGORY_ID = C.CATEGORY_ID WHERE C.NAME = 'LAPTOP' AND P.BRAND_ID = '".$br."' ";
            }
            break;
        case "tablet":
            $note = "none";
            $qr = "SELECT DISTINCT B.BRAND_ID,B.NAME FROM product P INNER JOIN brand B ON P.BRAND_ID = B.BRAND_ID WHERE P.CATEGORY_ID = 5";
            if($br == "all" || $br == null) {
                $sql = "SELECT P.NAME PNAME,P.PRICE PPRICE,P.DISCOUNT PDISCOUNT,P.DESCRIPTION PDESCRIPTION,CONCAT(DIR,FILENAME)  GTHUMBNAIL,C.NAME CNAME FROM product P INNER JOIN galery G ON P.PRODUCT_ID = G.PRODUCT_ID INNER JOIN category C ON P.CATEGORY_ID = C.CATEGORY_ID WHERE C.NAME = 'TABLET' ";
            } else {
                $sql = "SELECT P.NAME PNAME,P.PRICE PPRICE,P.DISCOUNT PDISCOUNT,P.DESCRIPTION PDESCRIPTION,CONCAT(DIR,FILENAME)  GTHUMBNAIL,C.NAME CNAME FROM product P INNER JOIN galery G ON P.PRODUCT_ID = G.PRODUCT_ID INNER JOIN category C ON P.CATEGORY_ID = C.CATEGORY_ID WHERE C.NAME = 'TABLET' AND P.BRAND_ID = '".$br."' ";
            }
            break;
        case "smartwatch":
            $note = "none";
            $qr = "SELECT DISTINCT B.BRAND_ID,B.NAME FROM product P INNER JOIN brand B ON P.BRAND_ID = B.BRAND_ID WHERE P.CATEGORY_ID = 7";
            if($br == "all" || $br == null) {
                $sql = "SELECT P.NAME PNAME,P.PRICE PPRICE,P.DISCOUNT PDISCOUNT,P.DESCRIPTION PDESCRIPTION,CONCAT(DIR,FILENAME)  GTHUMBNAIL,C.NAME CNAME FROM product P INNER JOIN galery G ON P.PRODUCT_ID = G.PRODUCT_ID INNER JOIN category C ON P.CATEGORY_ID = C.CATEGORY_ID WHERE C.NAME = 'SMART WATCH' ";
            } else {
                $sql = "SELECT P.NAME PNAME,P.PRICE PPRICE,P.DISCOUNT PDISCOUNT,P.DESCRIPTION PDESCRIPTION,CONCAT(DIR,FILENAME)  GTHUMBNAIL,C.NAME CNAME FROM product P INNER JOIN galery G ON P.PRODUCT_ID = G.PRODUCT_ID INNER JOIN category C ON P.CATEGORY_ID = C.CATEGORY_ID WHERE C.NAME = 'SMART WATCH' AND P.BRAND_ID = '".$br."' ";
            }
            break;
        case "accessory": 
            $note = "none";
            $qr = "SELECT DISTINCT B.BRAND_ID,B.NAME FROM product P INNER JOIN brand B ON P.BRAND_ID = B.BRAND_ID WHERE P.CATEGORY_ID = 8";
            if($br == "all" || $br == null) {
                $sql = "SELECT P.NAME PNAME,P.PRICE PPRICE,P.DISCOUNT PDISCOUNT,P.DESCRIPTION PDESCRIPTION,CONCAT(DIR,FILENAME)  GTHUMBNAIL,C.NAME CNAME FROM product P INNER JOIN galery G ON P.PRODUCT_ID = G.PRODUCT_ID INNER JOIN category C ON P.CATEGORY_ID = C.CATEGORY_ID WHERE C.NAME = 'ACCESSORY' ";
            } else {
                $sql = "SELECT P.NAME PNAME,P.PRICE PPRICE,P.DISCOUNT PDISCOUNT,P.DESCRIPTION PDESCRIPTION,CONCAT(DIR,FILENAME)  GTHUMBNAIL,C.NAME CNAME FROM product P INNER JOIN galery G ON P.PRODUCT_ID = G.PRODUCT_ID INNER JOIN category C ON P.CATEGORY_ID = C.CATEGORY_ID WHERE C.NAME = 'ACCESSORY' AND P.BRAND_ID = '".$br."' ";
            }
            break;
        default: //hien thi danh sach tim kiem
            $note = "ok";
            
            $qr = "SELECT P.NAME PNAME,P.PRICE PPRICE,P.DISCOUNT PDISCOUNT,P.DESCRIPTION PDESCRIPTION,CONCAT(DIR,FILENAME)  GTHUMBNAIL,C.NAME CNAME FROM product P INNER JOIN galery G ON P.PRODUCT_ID = G.PRODUCT_ID INNER JOIN category C ON P.CATEGORY_ID = C.CATEGORY_ID WHERE P.NAME LIKE '$pd' ";
            $GLOBALS["sql1"] = "SELECT P.NAME PNAME,P.PRICE PPRICE,P.DISCOUNT PDISCOUNT,P.DESCRIPTION PDESCRIPTION,CONCAT(DIR,FILENAME)  GTHUMBNAIL,C.NAME CNAME FROM product P INNER JOIN galery G ON P.PRODUCT_ID = G.PRODUCT_ID INNER JOIN category C ON P.CATEGORY_ID = C.CATEGORY_ID WHERE P.NAME LIKE '$pd' ";
            // $pdosql = $GLOBALS["conn"]->prepare($check);
            // $pdosql->execute();
            // $results = $pdosql->fetchAll(PDO::FETCH_ASSOC);
            // if(count($results)>0) {
            //     $GLOBALS["note"] = "Cac san pham duoc tim thay";
            //     $GLOBALS["sql"] = "SELECT P.NAME PNAME,P.PRICE PPRICE,P.DISCOUNT PDISCOUNT,CONCAT(DIR,FILENAME)  GTHUMBNAIL,C.NAME CNAME FROM PRODUCT P INNER JOIN GALERY G ON P.PRODUCT_ID = G.PRODUCT_ID INNER JOIN category C ON P.CATEGORY_ID = C.CATEGORY_ID WHERE P.NAME LIKE '".$pd."' ";
            // } else {
            //     $GLOBALS["note"] = "none";
            //     $GLOBALS["sql"] = "SELECT P.NAME PNAME,P.PRICE PPRICE,P.DISCOUNT PDISCOUNT,CONCAT(DIR,FILENAME)  GTHUMBNAIL,C.NAME CNAME FROM PRODUCT P INNER JOIN GALERY G ON P.PRODUCT_ID = G.PRODUCT_ID INNER JOIN category C ON P.CATEGORY_ID = C.CATEGORY_ID WHERE P.NAME LIKE '".$GLOBALS["item_name"]."' ";
            // }
        }
?>