<?php
    $conn = require "config.php";
    require "request.php";
    $id = $_GET['id'];
    echo $id;
    $mes = "";

    
    switch($id) {
        case 0: //add new account 
            $userName = $psw = $repsw = "";
            
            if(!empty($_POST)) {
                $userName = $_POST['uname'];
                $psw = $_POST['pw'];
                $repsw = $_POST['repw'];
                if($userName != null && $psw != null && $repsw != null ) {   
                    $data = array();
                    $qr = "SELECT * FROM logins WHERE username = '".$userName."' ";
                    $tsql = $conn->prepare($qr);
                    $tsql->execute();
                    $result = $tsql->fetchAll(PDO::FETCH_ASSOC);
                    // var_dump(count($data));
                    if(count($result) == 0) {
                        if( $psw == $repsw) {
                            $tsql = " INSERT INTO logins(username, passwd) VALUES ('".$userName."','".$psw."') ";
                            if(mysqli_query($conn, $tsql) == true) {
                                $GLOBALS['mes'] = "New record created successfully";
                            } else {
                                $conn->error;
                            }
                        } else {
                            $GLOBALS['mes'] = "khong  nhap pass khong giong nhau";
                        }
                    } else {
                        $GLOBALS['mes'] = "Ten dang nhap da ton tai";
                    }
                } else {
                    $GLOBALS['mes'] = "Khong de trong cac truong";
                }
            } 
            break;
        case 1: //add new branch
            if(!empty($_POST)) {
                $bName = $_POST['branch_name'];
                $bAddress = $_POST['address'];
                $bHotline = $_POST['hotline'];
                if($bName != null && $bAddress != null && $bHotline != null ) {      
                    $qr = " INSERT INTO branch(NAME,ADDRESS,HOTLINE) VALUES ('".$bName."','".$bAddress."','".$bHotline."') ";
                    $tsql=$conn->prepare($qr);
                    if($tsql->execute() == true) {
                        $GLOBALS['mes'] = "New record created successfully";
                    } else {
                        $conn->error;
                    }
                } else {
                    $GLOBALS['mes'] = "Khong de trong cac truong";
                }
            }  
            break; 
        case 2: //add new branch
            if(!empty($_POST)) {
                $fName = $_POST['fname'];
                $mName = $_POST['mname'];
                $lName = $_POST['lname'];
                $Bod = $_POST['bod'];
                $eAddress = $_POST['address'];
                $ePhone = $_POST['phone'];
                $eGender = $_POST['gender'];
                if($fName != null && $mName != null && $lName != null && $Bod != null && $eAddress != null && $ePhone != null && $eGender != null) {      
                    $qr = " INSERT INTO employee(FNAME,MNAME,LNAME,BOD,ADDRESS,PHONE,GENDER) VALUES ('".$fName."','".$mName."','".$lName."','".$Bod."','".$eAddress."','".$ePhone."','".$eGender."') ";
                    $tsql = $conn->prepare($qr);
                    if($tsql->execute()) {
                        $GLOBALS['mes'] = "New record created successfully";
                    } else {
                        $GLOBALS['mes'] = "Phat sanh loi";
                    }
                } else {
                    $GLOBALS['mes'] = "Khong de trong cac truong";
                }
            }  
            break; 
        case 3: //add new category
            if(!empty($_POST)) {
                $name = $_POST['category_name'];
                $code = $_POST['category_code'];
                if($name != null && $code != null) {      
                    $qr = "INSERT INTO category(NAME,CODE) VALUES ('".$name."','".$code."')";
                    $tsql = $conn->prepare($qr);
                    if($tsql->execute()) {
                        $GLOBALS['mes'] = "New record created successfully";
                    } else {
                        $GLOBALS['mes'] = "Phat sanh loi";
                    }
                } else {
                    $GLOBALS['mes'] = "Khong de trong cac truong";
                }

            }  
            break; 
        case 4: //add new OS
            if(!empty($_POST)) {
                $name = $_POST['name'];
                $version = $_POST['version'];
                if($name != null && $version != null) {      
                    $qr = "INSERT INTO deviceos(NAME,VERSION) VALUES ('".$name."','".$version."')";
                    $tsql = $conn->prepare($qr);
                    if($tsql->execute()) {
                        $GLOBALS['mes'] = "New record created successfully";
                    } else {
                        $GLOBALS['mes'] = "Phat sanh loi";
                    }
                } else {
                    $GLOBALS['mes'] = "Khong de trong cac truong";
                }
            }  
            break; 
        case 5: //add new product
            if(!empty($_POST)) {
                $product_name = $_POST['product_name'];
                $category = $_POST['category'];
                $os = $_POST['os'];
                $brand = $_POST['brand'];
                $price = $_POST['price'];
                $discount = $_POST['discount'];
                $descript = $_POST['descript'];
                // $creat_at = $_POST['creat_at'];
                // $update_at = $_POST['update_at'];
                if($product_name != null && $category != null && $os != null && $brand != null && $price != null && $discount != null && $descript != null ) { 
                    
                    $qr_cate = "SELECT CATEGORY_ID FROM category WHERE NAME = '$category' ";    
                    $cata_id = $conn->prepare($qr_cate);
                    $cata_id->execute();
                    $ctid = $cata_id->fetchColumn();
                    echo $ctid;
                    $qr_os = 'SELECT DEVICEOS_ID FROM deviceos WHERE NAME= :os_id';
                    $os_id = $conn->prepare($qr_os);
                    $os_id->execute(['os_id'=>$os]);
                    $osid = $os_id->fetchColumn();
                    echo $osid;
                    $qr_brand = 'SELECT BRAND_ID FROM brand WHERE NAME= :brand_id';
                    $brand_id = $conn->prepare($qr_brand);
                    $brand_id->execute(['brand_id'=>$brand]);
                    $brandid = $brand_id->fetchColumn();
                    echo $brandid;
                    $qr = "INSERT INTO product(NAME,CATEGORY_ID,DEVICEOS_ID,BRAND_ID,PRICE,DISCOUNT,DESCRIPTION,CREATE_AT,UPDATE_AT) VALUES ('".$product_name."','".$ctid."','".$osid."','".$brandid."','".$price."','".$discount."','".$descript."',NOW(),'')";
                    $tsql = $conn->prepare($qr);
                    if($tsql->execute()) {
                        $GLOBALS['mes'] = "New record created successfully";
                    } else {
                        $conn->error;
                    }
                } else {
                    $GLOBALS['mes'] = "Khong de trong cac truong";
                }
            }  
            break; 
            case 6: //add new Brand
                if(!empty($_POST)) {
                    $brand_name = $_POST['brand_name'];
                    $country = $_POST['country'];
                    if($brand_name != null && $country != null) {      
                        $qr = "INSERT INTO brand(NAME,COUNTRY) VALUES ('".$brand_name."','".$country."')";
                        $tsql = $conn->prepare($qr);
                        if($tsql->execute()) {
                            $GLOBALS['mes'] = "New record created successfully";
                        } else {
                            $conn->error;
                        }
                    } else {
                        $GLOBALS['mes'] = "Khong de trong cac truong";
                    }
                }  
                break; 
            case 7: //add new picture
                $filename = "";
                $targetDir = "";
                if(isset($_FILES["file"]["name"])) {
                    $fileName = basename($_FILES["file"]["name"]);
                }
                
                if(!empty($_FILES["file"]["name"]) && isset($_POST["product_name"])) {
                    $product_name = $_POST["product_name"];
                    $check_product = $conn->prepare("SELECT C.CODE CCODE,P.PRODUCT_ID PID FROM product P INNER JOIN category C ON P.CATEGORY_ID = C.CATEGORY_ID WHERE P.NAME = '".$product_name."'");
                    $check_product->execute();
                    $results = $check_product->fetchAll(PDO::FETCH_ASSOC);
                    if(count($results)>0) {
                        foreach($results as $row) {
                            $product_id = $row["PID"];
                            $category_code = $row["CCODE"];
                        }
                        switch($category_code) {
                            case 1000:
                                $targetDir = "./assets/img/phone/";
                                break;
                            case 1001:
                                $targetDir = "./assets/img/tablet/";
                                break;
                            case 1002:
                                $targetDir = "./assets/img/laptop/";
                                break;
                            case 1003:
                                $targetDir = "./assets/img/smartwatch/";
                                break;
                            case 1004:
                                $targetDir = "./assets/img/accessory/";
                                break;
                        }
                    }

                    echo $targetDir;
                    $targetFilePath = $targetDir . $fileName;       

                    // check file upload 
                    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
                    $allowTypes = array('jpg','png','jpeg','gif','pdf');  
                    if(in_array($fileType, $allowTypes)) {
                        //upload hinh anh len sv
                        if(move_uploaded_file($_FILES["file"]["tmp_name"],$targetFilePath)) {
                            $insert = $conn->prepare("INSERT INTO galery(PRODUCT_ID,DIR,FILENAME,CREATE_AT,UPDATE_AT) VALUES ('".$product_id."','".$targetDir."','".$fileName."',NOW(),'')");
                            if($insert->execute()) {
                                $GLOBALS['mes'] = "The file ".$fileName. " has been uploaded successfully.";
                            } else {
                                $GLOBALS['mes'] = "File upload failed, please try again.";
                            }
                        } else {
                            $GLOBALS['mes'] = "co van de trong qua trinh upload";
                        }
                    } else {
                        $GLOBALS['mes'] = "dinh dang file khong dung";
                    }
                }
                break;
    }           
?>

<?php
    //hien thi danh sach category
    function list_show($qr) {
        $listcate = $GLOBALS["conn"]->prepare($qr);
        $listcate->execute();
        $cate_data = $listcate->fetchAll(PDO::FETCH_ASSOC);
        if(count($cate_data)>0) {
            foreach($cate_data as $row) {
                echo '<option  value="'.$row['NAME'].'">'.$row['NAME'].'</option>';
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    
</head>
<body>
    <input  type="text" id="menuid" value="<?php echo $id ?>" hidden>
    <div class="container">
<!-- nhap thong tin tai khoan -->
        <div class="mt-5 num">
            <h3 class="text-center">Add new account</h3>
            <form action="" id="acount" method="POST">
                <div class="form-group mb-3 mt-6">
                    <label for="uname">User name</label>
                    <input type="text" class="form-control" id="uname" name="uname">
                </div>
                <div class="form-group mb-3">
                    <label for="pw">Password</label>
                    <input type="password" class="form-control" id="pw" name="pw">
                </div>
                <div class="form-group mb-3">
                    <label for="repw">Repassword</label>
                    <input type="password" class="form-control" id="repw" name="repw">
                </div>
                <button type="submit" class="btn btn-primary mb-2">Save</button>
                <button  class="btn btn-primary mb-2"> <a class="text-light" href="./manage.php">Back</a></button>
                <button class="btn btn-primary mb-2" onclick="window.history.go(-1); return false;">Cancel</button>
                <span><?php echo $mes ?></span>
            </form>
        </div>
<!-- nhap thong tin chi nhanh -->
        <div class="mt-5 num">
            <h3 class="text-center">Add new Branch</h3>
            <form action=""  method="POST">
                <div class="form-group mb-3 mt-6 purple-border">
                    <label for="branch_name">Branch name</label>
                    <input type="text" class="form-control" id="branch_name" name="branch_name">
                </div>
                <div class="form-group mb-3">
                    <label for="address">Address</label>
                    <input type="text" class="form-control" id="address" name="address">
                </div>
                <div class="form-group mb-3">
                    <label for="hotline">Hotline</label>
                    <input type="text" class="form-control" id="hotline" name="hotline">
                </div>
                <button type="submit" class="btn btn-primary mb-2">Save</button>
                <button  class="btn btn-primary mb-2"> <a class="text-light" href="./manage.php">Back</a></button>
                <span><?php echo $mes ?></span>
            </form>
        </div>
<!-- nhap thong tin nhan vien -->
        <div class="mt-5 num">
            <h3 class="text-center">Add new Employee</h3>
            <form action=""  method="POST">
                <div class="form-group mb-3 mt-6">
                    <label for="fname">First name</label>
                    <input type="text" class="form-control" id="fname" name="fname">
                </div>
                <div class="form-group mb-3">
                    <label for="mname">Mid Name</label>
                    <input type="text" class="form-control" id="mname" name="mname">
                </div>
                <div class="form-group mb-3">
                    <label for="lname">Last Name</label>
                    <input type="text" class="form-control" id="lname" name="lname">
                </div>
                <div class="form-group mb-3">
                    <label for="bod">Bod</label>
                    <input type="date" class="form-control" id="bod" name="bod">
                </div>
                <div class="form-group mb-3">
                    <label for="paddress">Address</label>
                    <input type="text" class="form-control" id="paddress" name="address">
                </div>
                <div class="form-group mb-3">
                    <label for="phone">Hotline</label>
                    <input type="text" class="form-control" id="phone" name="phone">
                </div>
                <div class="form-group mb-3">
                    <label for="bod">Hotline</label>
                    <select name="gender" id="gender" class="form-control">
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Other">Other</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary mb-2">Save</button>
                <button  class="btn btn-primary mb-2"> <a class="text-light" href="./manage.php">Back</a></button>
                <span><?php echo $mes ?></span>
            </form>
        </div>
        <!-- nhap thong tin the loai -->
        <div class="mt-5 num">
            <h3 class="text-center">Add new Category</h3>
            <form action=""  method="POST">
                <div class="form-group mb-3 mt-6">
                    <label for="category_name">Category name</label>
                    <input type="text" class="form-control" id="category_name" name="category_name">
                </div>
                <div class="form-group mb-3">
                    <label for="category_code">Code</label>
                    <input type="text" class="form-control" id="category_code" name="category_code">
                </div>
                <button type="submit" class="btn btn-primary mb-2">Save</button>
                <button  class="btn btn-primary mb-2"> <a class="text-light" href="./manage.php">Back</a></button>
                <span><?php echo $mes ?></span>
            </form>
        </div>
        <!-- nhap thong tin OS -->
        <div class="mt-5 num">
            <h3 class="text-center">Add new OS</h3>
            <form action=""  method="POST">
                <div class="form-group mb-3 mt-6">

                    <label class="label label-default" for="os_name">OS name</label>
                    <input type="text" class="form-control" id="name" name="name">
                </div>
                <div class="form-group mb-3">
                    <label for="category_code">Version</label>
                    <input type="text" class="form-control" id="version" name="version">
                </div>
                <button type="submit" class="btn btn-primary mb-2">Save</button>
                <button  class="btn btn-primary mb-2"> <a class="text-light" href="./manage.php">Back</a></button>
                <span><?php echo $mes ?></span>
            </form>
        </div>
        <!-- nhap thong tin san pham -->
        <div class="mt-5 num" >
            <h3 class="text-center">Add new Product</h3>
            <form action=""  method="POST">
                <div class="form-group mb-3 mt-6">
                    <label for="">Product name</label>
                    <input type="text" class="form-control"  name="product_name">
                </div>
                <div class="form-group mb-3">
                    <label for="">Category</label>
                    <select name="category" id="" class="form-control">
                        <?php
                            list_show('SELECT NAME FROM category');
                        ?>
                    </select>
                </div>
                <div class="form-group mb-3">
                    <label for="">OS</label>
                    <select name="os" id="" class="form-control">
                        <?php
                            list_show("SELECT NAME FROM deviceos");
                        ?>
                    </select>
                </div>
                <div class="form-group mb-3">
                    <label for="">Brand</label>
                    <select name="brand" id="" class="form-control">
                        <?php
                            list_show("SELECT NAME FROM brand");
                        ?>
                    </select>
                </div>
                <div class="form-group mb-3">
                    <label for="">Price</label>
                    <input type="number" class="form-control"  name="price">
                </div>
                <div class="form-group mb-3">
                    <label for="">Discount</label>
                    <input type="number" class="form-control"  name="discount">
                </div>
                <div class="form-group mb-3">
                    <label for="">Description</label>
                    <textarea name="descript" id="descript" class="form-control"  rows="3"></textarea>
                </div>
                <button type="submit" class="btn btn-primary mb-2">Save</button>
                <button  class="btn btn-primary mb-2"> <a class="text-light" href="./manage.php">Back</a></button>
                <span><?php echo $mes ?></span>
            </form>
        </div>
        <!-- nhap thong tin Brand -->
        <div class="mt-5 num">
            <h3 class="text-center">Add new Brand</h3>
            <form action=""  method="POST">
                <div class="form-group mb-3 mt-6">
                    <label  for="brand_name">Brand name</label>
                    <input type="text" class="form-control" id="brand_name" name="brand_name">
                </div>
                <div class="form-group mb-3">
                    <label for="category_code">Country</label>
                    <input type="text" class="form-control" id="country" name="country">
                </div>
                <button type="submit" class="btn btn-primary mb-2">Save</button>
                <button  class="btn btn-primary mb-2"> <a class="text-light" href="./manage.php">Back</a></button>
                <span><?php echo $mes ?></span>
            </form>
        </div>
        <!-- upload hinh anh -->
        <div class="mt-5 num">
            <h3 class="text-center">Add new galery</h3>
            <form action=""  method="POST" enctype="multipart/form-data">
                <div class="form-group mb-3 mt-6">
                    <label  for="product_name">Product Name</label>
                    <select name="product_name" id="product_name" class="form-control">
                        <?php
                            list_show("SELECT NAME FROM product");
                        ?>
                    </select>
                </div>
                <div class="form-group mb-3">
                    <label for="picture">Picture</label>
                    <input type="file" class="form-control" id="file" name="file">
                </div>
                <button type="submit" class="btn btn-primary mb-2">Save</button>
                <button  class="btn btn-primary mb-2"> <a class="text-light" href="./manage.php">Back</a></button>
                <span><?php echo $mes ?></span>
            </form>
        </div>

    </div>
    <script src="./assets/js/addnew.js"></script>
</body>
</html>


