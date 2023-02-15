<?php

use PhpParser\Node\Stmt\Echo_;

    $conn = require "config.php";

    function show_account() {
        $conn = require "config.php";
        $tsql = "SELECT  * FROM logins";
        $data = $conn->prepare($tsql);
        $data->execute();
        $arr_data = $data->fetchAll(PDO::FETCH_ASSOC);
        if(count($arr_data)>0) {
            foreach($arr_data as $row) {
                echo    '<tr>
                            <td>'.$row['logins_id'].'</td>
                            <td>'.$row['username'].'</td>
                            <td>'.$row['passwd'].'</td>
                            <td><button class="btn btn-primary"><a  id='.$row['logins_id'].' class="text-light" href="edit.php?editid='.$row['logins_id'].'&id=0 " >Change password</a></button></td>
                            <td><button class="btn btn-primary"><a  id='.$row['logins_id'].' class="text-light" onclick="del_account('.$row['logins_id'].')" >Delete</a></button></td> 
                        </tr>';
            }
        }
    };

    function show_branch() {
        $conn = require "config.php";
        $tsql = "SELECT * FROM branch";
        $data = $conn->prepare($tsql);
        $data->execute();
        $arr_data = $data->fetchAll(PDO::FETCH_ASSOC);
        if(count($arr_data)>0) {
            foreach($arr_data as $row) {
                echo    '<tr>
                            <td>'.$row['BRANCH_ID'].'</td>
                            <td>'.$row['NAME'].'</td>
                            <td>'.$row['ADDRESS'].'</td>
                            <td>'.$row['HOTLINE'].'</td>
                            <td><button class="btn btn-primary"><a  id='.$row['BRANCH_ID'].' class="text-light" href="edit.php?editid='.$row['BRANCH_ID'].'&id=1&bname='.$row['NAME'].'&baddress='.$row['ADDRESS'].'&bhotline='.$row['HOTLINE'].' " >Edit</a></button></td>
                            <td><button class="btn btn-primary"><a  id='.$row['BRANCH_ID'].' class="text-light" onclick="del_branch('.$row['BRANCH_ID'].')">Delete</a></button></td> 
                        </tr>';
            }
        }
    }

    function show_employee() {
        $conn = require "config.php";
        $tsql = "SELECT * FROM employee";
        $data = $conn->prepare($tsql);
        $data->execute();
        $arr_data = $data->fetchAll(PDO::FETCH_ASSOC);
        if(count($arr_data)>0) {
            foreach($arr_data as $row) {
                echo    '<tr>
                            <td>'.$row['EMPLOYEE_ID'].'</td>
                            <td>'.$row['FNAME'].'</td>
                            <td>'.$row['MNAME'].'</td>
                            <td>'.$row['LNAME'].'</td>
                            <td>'.$row['BOD'].'</td>
                            <td>'.$row['ADDRESS'].'</td>
                            <td>'.$row['PHONE'].'</td>
                            <td>'.$row['GENDER'].'</td>
                            <td><button class="btn btn-primary"><a  id='.$row['EMPLOYEE_ID'].' class="text-light" href="edit.php?editid='.$row['EMPLOYEE_ID'].'&id=2&fname='.$row['FNAME'].'&mname='.$row['MNAME'].'&lname='.$row['LNAME'].'&bod='.$row['BOD'].'&address='.$row['ADDRESS'].'&phone='.$row['PHONE'].'&gender='.$row['GENDER'].'" >Edit</a></button></td>
                            <td><button class="btn btn-primary"><a  id='.$row['EMPLOYEE_ID'].' class="text-light" onclick="del_employee('.$row['EMPLOYEE_ID'].')" >Delete</a></button></td> 
                        </tr>';
            }
        }
    }

    function show_category() {
        $conn = require "config.php";
        $tsql = "SELECT * FROM category";
        $data = $conn->prepare($tsql);
        $data->execute();
        $arr_data = $data->fetchAll(PDO::FETCH_ASSOC);
        if(count($arr_data)>0) {
            foreach($arr_data as $row) {
                echo    '<tr>
                            <td>'.$row['CATEGORY_ID'].'</td>
                            <td>'.$row['NAME'].'</td>
                            <td>'.$row['CODE'].'</td>
                            <td><button class="btn btn-primary"><a  id="'.$row['CATEGORY_ID'].'" class="text-light" href="edit.php?editid='.$row['CATEGORY_ID'].'&id=3&name='.$row['NAME'].'&code='.$row['CODE'].'" >Edit</a></button></td>
                            <td><button class="btn btn-primary"><a  id="'.$row['CATEGORY_ID'].'" class="text-light" onclick="del_category('.$row['CATEGORY_ID'].')" >Delete</a></button></td> 
                        </tr>';
            }
        }
    }

    function show_os() {
        $conn = require "config.php";
        $tsql = "SELECT * FROM deviceos";
        $data = $conn->prepare($tsql);
        $data->execute();
        $arr_data = $data->fetchAll(PDO::FETCH_ASSOC);
        if(count($arr_data)>0) {
            foreach($arr_data as $row) {
                echo    '<tr>
                            <td>'.$row['DEVICEOS_ID'].'</td>
                            <td>'.$row['NAME'].'</td>
                            <td>'.$row['VERSION'].'</td>
                            <td><button class="btn btn-primary"><a  id="'.$row['DEVICEOS_ID'].'" class="text-light" href="edit.php?editid='.$row['DEVICEOS_ID'].'&id=4&name='.$row['NAME'].'&version='.$row['VERSION'].'">Edit</a></button></td>
                            <td><button class="btn btn-primary"><a  id="'.$row['DEVICEOS_ID'].'" class="text-light" onclick="del_deviceos('.$row['DEVICEOS_ID'].')" >Delete</a></button></td> 
                        </tr>';
            }
        }
    }

    function show_product() {
        $conn = require "config.php";
        $tsql = "SELECT P.PRODUCT_ID,P.NAME PNAME,C.NAME CNAME,D.NAME DNAME,B.NAME BNAME,P.PRICE,P.DISCOUNT,P.DESCRIPTION,P.CREATE_AT,P.UPDATE_AT FROM product P INNER JOIN category C ON P.CATEGORY_ID = C.CATEGORY_ID INNER JOIN deviceos D ON P.DEVICEOS_ID = D.DEVICEOS_ID INNER JOIN brand B ON P.BRAND_ID = B.BRAND_ID";
        $data = $conn->prepare($tsql);
        $data->execute();
        $arr_data = $data->fetchAll(PDO::FETCH_ASSOC);
        if(count($arr_data)>0) {
            foreach($arr_data as $row) {
                echo    '<tr>
                            <td>'.$row['PRODUCT_ID'].'</td>
                            <td>'.$row['PNAME'].'</td>
                            <td>'.$row['CNAME'].'</td>
                            <td>'.$row['DNAME'].'</td>
                            <td>'.$row['BNAME'].'</td>
                            <td>'.$row['PRICE'].'</td>
                            <td>'.$row['DISCOUNT'].'</td>
                            <td>'.$row['DESCRIPTION'].'</td>
                            <td>'.$row['CREATE_AT'].'</td>
                            <td>'.$row['UPDATE_AT'].'</td>
                            <td><button class="btn btn-primary"><a  id="'.$row['PRODUCT_ID'].'" class="text-light" href="edit.php?editid='.$row['PRODUCT_ID'].'&id=5&pname='.$row['PNAME'].'&cname='.$row['CNAME'].'&dname='.$row['DNAME'].'&bname='.$row['BNAME'].'&price='.$row['PRICE'].'&discount='.$row['DISCOUNT'].'&description='.$row['DESCRIPTION'].'">Edit</a></button></td>
                            <td><button class="btn btn-primary"><a  id="'.$row['PRODUCT_ID'].'" class="text-light" onclick="del_product('.$row['PRODUCT_ID'].')" >Delete</a></button></td> 
                        </tr>';
            }
        }
    }
//show brand
    function show_brand() {
        $conn = require "config.php";
        $tsql = "SELECT * FROM brand";
        $data = $conn->prepare($tsql);
        $data->execute();
        $arr_data = $data->fetchAll(PDO::FETCH_ASSOC);
        if(count($arr_data)>0) {
            foreach($arr_data as $row) {
                echo    '<tr>
                            <td>'.$row['BRAND_ID'].'</td>
                            <td>'.$row['NAME'].'</td>
                            <td>'.$row['COUNTRY'].'</td>
                            <td><button class="btn btn-primary"><a  id="'.$row['BRAND_ID'].'" class="text-light" href="edit.php?editid='.$row['BRAND_ID'].'&id=6&name='.$row['NAME'].'&country='.$row['COUNTRY'].'">Edit</a></button></td>
                            <td><button class="btn btn-primary"><a  id="'.$row['BRAND_ID'].'" class="text-light" onclick="del_brand('.$row['BRAND_ID'].')" >Delete</a></button></td> 
                        </tr>';
            }
        }
    }
//show galery
    function show_galery() {
        $conn = require "config.php";
        $tsql = "SELECT G.GALERY_ID,P.NAME PNAME,CONCAT(DIR,FILENAME) AS THUMBNAIL,G.CREATE_AT,G.UPDATE_AT FROM galery G INNER JOIN product P ON G.PRODUCT_ID = P.PRODUCT_ID";
        $data = $conn->prepare($tsql);
        $data->execute();
        $arr_data = $data->fetchAll(PDO::FETCH_ASSOC);
        if(count($arr_data)>0) {
            foreach($arr_data as $row) {
                echo    '<tr>
                            <td>'.$row['GALERY_ID'].'</td>
                            <td>'.$row['PNAME'].'</td>
                            <td><img width="60px" height="60px" src="'.$row['THUMBNAIL'].'" /> </td>  
                            <td>'.$row['CREATE_AT'].'</td>
                            <td>'.$row['UPDATE_AT'].'</td>
                            <td><button class="btn btn-primary"><a  id="'.$row['GALERY_ID'].'" class="text-light" href="edit.php?editid='.$row['GALERY_ID'].'&id=7">Edit</a></button></td>
                            <td><button class="btn btn-primary"><a  id="'.$row['GALERY_ID'].'" class="text-light" href="" onclick="del_galery('.$row['GALERY_ID'].')" >Delete</a></button></td> 
                        </tr>';
            }
        }
    }

?>
