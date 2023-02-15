<?php
    $conn = require "config.php";
    require "request.php";

    $edit = $_GET['editid'];
    $getid = $_GET['id'];
    $mes = "";
    

    switch($getid) {
        case 0:
            if(!empty($_POST["save"])) {
                $oldpw = $_POST['oldPass'];
                $newpw = $_POST['newPass'];
                if($oldpw != null && $newpw != null) {
                    $tsql = $conn->prepare("SELECT passwd FROM logins WHERE logins_id = $edit");
                    $tsql->execute();
                    $result = $tsql->fetchAll(PDO::FETCH_ASSOC);
                    // var_dump($result);
                    if($result[0]["passwd"]==$oldpw) {
                        $qr = $conn->prepare("UPDATE logins SET passwd='".$newpw."' WHERE logins_id = '".$edit."'");
                        $qr->execute();
                        echo '<script type="text/javascript">
                                alert("Update success");
                                window.location.href = "manage.php"; 
                             </script>'; 
                    }
                     else {
                        $mes = "Password cu khong dung";
                    }
                } else {
                    $mes = "Khong de trong thong tin";
                }
            };
        break;
        //edit branch
        case 1:
            $gbname = $_GET['bname'];
            $gbaddress = $_GET['baddress'];
            $gbhotline = $_GET['bhotline'];
            if(!empty($_POST)) {
                $pbname = $_POST['branch_name'];
                $pbaddress = $_POST['address'];
                $pbhotline = $_POST['hotline'];
                if($pbname != null && $pbaddress != null && $pbhotline != null) {
                        $qr = $conn->prepare("UPDATE branch SET NAME='".$pbname."',ADDRESS='".$pbaddress."',HOTLINE='".$pbhotline."' WHERE BRANCH_ID = '".$edit."' ");
                        $qr->execute();
                        header("location: manage.php");
                } else {
                    $mes = "Khong de trong thong tin";
                }
            };
        break;

        case 2:
            $fname = $_GET['fname'];
            $mname = $_GET['mname'];
            $lname = $_GET['lname'];
            $bod = $_GET['bod'];
            $address = $_GET['address'];
            $phone = $_GET['phone'];
            $gender = $_GET['gender'];
            if(!empty($_POST)) {
                $pfname = $_POST['fname'];
                $pmname = $_POST['mname'];
                $plname = $_POST['lname'];
                $pbod = $_POST['bod'];
                $paddress = $_POST['address'];
                $pphone = $_POST['phone'];
                $pgender = $_POST['gender'];
                if($pfname != null && $pmname != null && $plname != null && $pbod != null && $paddress != null && $pphone != null && $pgender != null) {
                        $qr = $conn->prepare("UPDATE employee SET FNAME='".$pfname."',MNAME='".$pmname."',LNAME='".$plname."',BOD='".$pbod."',ADDRESS='".$paddress."',PHONE='".$pphone."',GENDER='".$pgender."' WHERE EMPLOYEE_ID = '".$edit."' ");
                        $qr->execute();
                        header("location: manage.php");
                } else {
                    $mes = "Khong de trong thong tin";
                }
            };
        break;
            
        case 3:
            $cate_name = $_GET["name"];
            $cate_code = $_GET["code"];
            if(!empty($_POST)) {
                $pname = $_POST["category_name"];
                $pcode = $_POST["category_code"];
                if(!empty($pname) && !empty($pcode)) {
                    $qr = $conn->prepare("UPDATE category SET NAME = '".$pname."',CODE = '".$pcode."' WHERE CATEGORY_ID = '".$edit."' ");
                    $qr->execute();
                    header("location: manage.php");
                } else {
                    $mes = "Khong de trong thong tin";
                }
            }
        break;

        case 4:
            $os_name = $_GET["name"];
            $os_version = $_GET["version"];
            if(!empty($_POST)) {
                $pname = $_POST["os_name"];
                $pversion = $_POST["version"];
                if(!empty($pname) && !empty($pversion)) {
                    $qr = $conn->prepare("UPDATE deviceos SET NAME = '".$pname."',VERSION = '".$pversion."' WHERE DEVICEOS_ID = '".$edit."' ");
                    $qr->execute();
                    header("location: manage.php");
                } else {
                    $mes = "Khong de trong thong tin";
                }
            }
        break;
        
        case 5:
            $pd_name = $_GET["pname"];
            $pd_cname = $_GET["cname"];
            $pd_dname = $_GET["dname"];
            $pd_bname = $_GET["bname"];
            $pd_price = $_GET["price"];
            $pd_discount = $_GET["discount"];
            $pd_description = $_GET["description"];
            if(!empty($_POST)) {
                // var_dump($_POST);
                $product_name = $_POST["product_name"];
                $category = $_POST["category"];
                $os = $_POST["os"];
                $brand = $_POST["brand"];
                $price = $_POST["price"];
                $discount = $_POST["discount"];
                $descript = $_POST["descript"];
                echo $os;
                if($product_name!=null && $category!=null && $os!=null && $brand!=null && $price!=null && $discount!=null && $descript!=null) {
                    $qr_cate = "SELECT CATEGORY_ID FROM category WHERE NAME = '".$category."' ";    
                    $cata_id = $conn->prepare($qr_cate);
                    $cata_id->execute();
                    $ctid = $cata_id->fetchColumn();
                    // echo $ctid;
                    $qr_os = "SELECT DEVICEOS_ID FROM DEVICEOS WHERE NAME= '".$os."' ";
                    $os_id = $conn->prepare($qr_os);
                    $os_id->execute();
                    $osid = $os_id->fetchColumn();
                    echo $osid;
                    $qr_brand = "SELECT BRAND_ID FROM BRAND WHERE NAME= '".$brand."' ";
                    $brand_id = $conn->prepare($qr_brand);
                    $brand_id->execute();
                    $brandid = $brand_id->fetchColumn();
                    echo $brandid;
                    $tsql = $conn->prepare("UPDATE PRODUCT SET NAME = '".$product_name."',CATEGORY_ID = '".$ctid."',DEVICEOS_ID = '".$osid."',BRAND_ID = '".$brandid."',PRICE = '".$price."',DISCOUNT = '".$discount."',DESCRIPTION = '".$descript."',UPDATE_AT = NOW() WHERE PRODUCT_ID = '".$edit."' ");
                    $tsql->execute();
                    header("location: manage.php");
                } else {
                    $mes = "Khong de trong thong tin";
                }
            }
        break;
        
        case 6:
            $get_name = $_GET["name"];
            $get_country = $_GET["country"];
            if(!empty($_POST)) {
                $brand_name = $_POST["brand_name"];
                $country = $_POST["country"];
                if(!empty($brand_name) && !empty($country)) {
                    $qr = $conn->prepare("UPDATE brand SET NAME = '".$brand_name."',COUNTRY = '".$country."' WHERE BRAND_ID = '".$edit."' ");
                    $qr->execute();
                    header("location: manage.php");
                } else {
                    $mes = "Khong de trong thong tin";
                }
            }
        break;
        
        case 7:
            if(!empty($_FILES["file"]["name"])) {
                $filename = $_FILES["file"]["name"];
                echo $filename;
            }
            
        break;


    }



?>

<?php
    //hien thi danh sach lua chon product
    if($getid == 5) {
        $cname = $_GET["cname"];
        $dname = $_GET["dname"];
        $bname = $_GET["bname"];
    }
    //hien thi danh sach lua chon
    function list_show($qr,$name) {
        $listcate = $GLOBALS["conn"]->prepare($qr);
        $listcate->execute();
        $cate_data = $listcate->fetchAll(PDO::FETCH_ASSOC);
        if(count($cate_data)>0) {
            foreach($cate_data as $row) {
                if($row["NAME"] == $name) {
                    echo '<option  value="'.$row['NAME'].'" selected>'.$row['NAME'].'</option>';
                } else {
                    echo '<option  value="'.$row['NAME'].'" >'.$row['NAME'].'</option>';
                } 
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
    <title>Edit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <input type="number" id="check" value="<?php echo $getid ?>" hidden>
    <div class="container">

        <div class="num">
            <form action="" method="POST">
                <h3 class="mt-5">Edit Password</h3>
                <div class="form-group mb-3">
                    <label for="">Old Password</label>
                    <input type="password" class="form-control" name="oldPass" id="oldPass">
                </div>
                <div class="form-group mb-3">
                    <label for="">New Password</label>
                    <input type="password" class="form-control" name="newPass" id="newPass">
                </div>
                <button type="submit" class="btn btn-primary mb-2" name="save" value="save">Update</button>
                <button  class="btn btn-primary mb-2"> <a class="text-light" href="./manage.php">Back</a></button>
                <span><?php echo $mes ?></span>
            </form>
        </div>

        <div class="num">
            <form action="" id="branch" method="POST">
                <h3 class="mt-5">Edit Branch</h3>
                <div class="form-group mb-3 mt-6">
                    <label for="branch_name">Branch name</label>
                    <input type="text" class="form-control" id="branch_name" name="branch_name" value="<?php echo $gbname ?>">
                </div>
                <div class="form-group mb-3">
                    <label for="Address">Address</label>
                    <input type="text" class="form-control" id="Address" name="address" value="<?php echo $gbaddress ?>">
                </div>
                <div class="form-group mb-3">
                    <label for="hotline">Hotline</label>
                    <input type="text" class="form-control" id="hotline" name="hotline" value="<?php echo $gbhotline ?>">
                </div>
                <button type="submit" class="btn btn-primary mb-2">Save</button>
                <button  class="btn btn-primary mb-2"> <a class="text-light" href="./manage.php">Back</a></button>
                <span><?php echo $mes ?></span>
            </form>
        </div>

        <div class="num">
            <h3 class="text-center">Add new Employee</h3>
            <form action=""  method="POST">
                <div class="form-group mb-3 mt-6">
                    <label for="fname">First name</label>
                    <input type="text" class="form-control" id="fname" name="fname" value="<?php echo $fname ?>">
                </div>
                <div class="form-group mb-3">
                    <label for="mname">Mid Name</label>
                    <input type="text" class="form-control" id="mname" name="mname" value="<?php echo $mname ?>">
                </div>
                <div class="form-group mb-3">
                    <label for="lname">Last Name</label>
                    <input type="text" class="form-control" id="lname" name="lname" value="<?php echo $lname ?>">
                </div>
                <div class="form-group mb-3">
                    <label for="bod">Bod</label>
                    <input type="date" class="form-control" id="bod" name="bod" required pattern="\d{4}-\d{2}-\d{2}" value="<?php echo $bod ?>">
                </div>
                <div class="form-group mb-3">
                    <label for="address">Address</label>
                    <input type="text" class="form-control" id="address" name="address" value="<?php echo $address ?>">
                </div>
                <div class="form-group mb-3">
                    <label for="phone">Hotline</label>
                    <input type="text" class="form-control" id="phone" name="phone" value="<?php echo $phone ?>">
                </div>
                <div class="form-group mb-3">
                    <label for="bod">Hotline</label>
                    <select name="gender" id="gender" class="form-control" value="<?php echo $gender ?>">
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

        <div class="num">
            <h3 class="text-center">Edit Category</h3>
            <form action=""  method="POST">
                <div class="form-group mb-3 mt-6">
                    <label for="category_name">Category name</label>
                    <input type="text" class="form-control" id="category_name" name="category_name" value="<?php echo $cate_name ?>">
                </div>
                <div class="form-group mb-3">
                    <label for="category_code">Code</label>
                    <input type="text" class="form-control" id="category_code" name="category_code" value="<?php echo $cate_code ?>">
                </div>
                <button type="submit" class="btn btn-primary mb-2">Save</button>
                <button  class="btn btn-primary mb-2"> <a class="text-light" href="./manage.php">Back</a></button>
                <span><?php echo $mes ?></span>
            </form>
        </div>

        <div class="mt-5 num">
            <h3 class="text-center">Edit new OS</h3>
            <form action=""  method="POST">
                <div class="form-group mb-3 mt-6">
                    <label class="label label-default" for="os_name">OS name</label>
                    <input type="text" class="form-control" id="os_name" name="os_name" value="<?php echo $os_name ?>">
                </div>
                <div class="form-group mb-3">
                    <label for="category_code">Version</label>
                    <input type="text" class="form-control" id="version" name="version" value="<?php echo $os_version ?>">
                </div>
                <button type="submit" class="btn btn-primary mb-2">Save</button>
                <button  class="btn btn-primary mb-2"> <a class="text-light" href="./manage.php">Back</a></button>
                <span><?php echo $mes ?></span>
            </form>
        </div>
<!-- edit product -->
        <div class="mt-5 num" >
            <h3 class="text-center">Add new Product</h3>
            <form action=""  method="POST">
                <div class="form-group mb-3 mt-6">
                    <label for="">Product name</label>
                    <input type="text" class="form-control"  name="product_name" value="<?php echo $pd_name ?>">
                </div>
                <div class="form-group mb-3">
                    <label for="">Category</label>
                    <select name="category" class="form-control">
                        <?php
                            list_show("SELECT NAME FROM category",$cname);
                        ?>
                    </select>
                </div>
                <div class="form-group mb-3">
                    <label for="">OS</label>
                    <select name="os" class="form-control">
                        <?php
                            list_show("SELECT NAME FROM deviceos",$dname);
                        ?>
                    </select>
                </div>
                <div class="form-group mb-3">
                    <label for="">Brand</label>
                    <select name="brand" class="form-control" value="">
                        <?php
                            list_show("SELECT NAME FROM brand", $bname);
                        ?>
                    </select>
                </div>
                <div class="form-group mb-3">
                    <label for="">Price</label>
                    <input type="number" class="form-control"  name="price" value="<?php echo $pd_price ?>">
                </div>
                <div class="form-group mb-3">
                    <label for="">Discount</label>
                    <input type="number" class="form-control"  name="discount" value="<?php echo $pd_discount ?>">
                </div>
                <div class="form-group mb-3">
                    <label for="">Description</label>
                    <textarea name="descript" id="descript" class="form-control"  rows="3" ><?php echo $pd_description ?></textarea>
                </div>
                <button type="submit" class="btn btn-primary mb-2">Save</button>
                <button  class="btn btn-primary mb-2"> <a class="text-light" href="./manage.php">Back</a></button>
                <span><?php echo $mes ?></span>
            </form>
        </div>
        
        <!-- edit brand -->
        <div class="mt-5 num">
            <h3 class="text-center">Edit new Brand</h3>
            <form action=""  method="POST">
                <div class="form-group mb-3 mt-6">
                    <label  for="brand_name">Brand name</label>
                    <input type="text" class="form-control" id="brand_name" name="brand_name" value="<?php echo $get_name ?>">
                </div>
                <div class="form-group mb-3">
                    <label for="category_code">Country</label>
                    <input type="text" class="form-control" id="country" name="country" value="<?php echo $get_country ?>">
                </div>
                <button type="submit" class="btn btn-primary mb-2">Save</button>
                <button  class="btn btn-primary mb-2"> <a class="text-light" href="./manage.php">Back</a></button>
                <span><?php echo $mes ?></span>
            </form>
        </div>

        <!-- edit galery -->
        <div class="mt-5 num">
            <h3 class="text-center">Add new galery</h3>
            <form action=""  method="POST" enctype="multipart/form-data">
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
    <script src="./assets/js/edit.js"></script>
</body>
</html>