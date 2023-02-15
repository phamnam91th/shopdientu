<?php
    $conn = require "config.php";
    require "show-index.php";
    if(isset($_GET["product"])) {
        $title = $_GET["product"];
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>DIGISHOP-<?php echo $title ?></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://www.freestyleacademy.rocks/jquery/minified.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="icon" href="./assets/img/logo/multidoge.PNG" type="image/x-icon" />
  <link rel="stylesheet" href="./assets/css/test.css">
</head>
<body>
    <div class="container-lg"> 
        <div class="row">
            <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active" data-bs-interval="5000">
                        <img src="./assets/img/slide/800-200-800x200-111.png" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item" data-bs-interval="5000">
                        <img src="./assets/img/slide/800-200-800x200-142.png" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item" data-bs-interval="5000">
                        <img src="./assets/img/slide/800-200-800x200-167.png" class="d-block w-100" alt="...">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
        <div class="row">
            <div>
                <div>
                    <div class="row py-1 justify-content-end">
                        <form class="d-flex w-50 " role="search" method="get" action="index.php">
                            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search">
                            <button class="btn btn-warning" type="submit" name="btn_search" value="submit">Search</button>
                        </form>
                    </div>
                </div>

                <nav  class="navbar navbar-expand-lg bg-success  text-bg-light">
                    <div class="container-fluid">
                        <button class="aka navbar-toggler text-light" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon text-light"></span>
                        </button>
                        <a class="navbar-brand  text-light" href="#">DIGISHOP</a>
                        
                        <div class="ake collapse navbar-collapse" id="navbarTogglerDemo03">
                            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                <li class="nav-item d-flex  align-items-baseline flex-wrap pe-3">
                                    <i class="bi bi-phone text-light fs-5"></i>
                                    <a class="nav-link text-light table-hover" href="index.php?product=phone"  value="12"> Phone</a>
                                </li>
                                <li class="nav-item d-flex  align-items-baseline flex-wrap pe-3">
                                    <i class="bi bi-laptop text-light fs-5"></i>
                                    <a class="nav-link text-light table-hover" href="index.php?product=laptop" > Laptop</a>
                                </li>
                                <li class="nav-item d-flex  align-items-baseline flex-wrap pe-3">
                                    <i class="bi bi-tablet-landscape text-light fs-5"></i>
                                    <a class="nav-link text-light table-hover" href="index.php?product=tablet" > Tablet</a>
                                </li>
                                <li class="nav-item d-flex  align-items-baseline flex-wrap pe-3">
                                    <i class="bi bi-smartwatch text-light fs-5"></i>
                                    <a class="nav-link text-light table-hover" href="index.php?product=smartwatch" > Smartwatch</a>
                                </li>
                                <li class="nav-item dropdown d-flex  align-items-baseline flex-wrap pe-3">
                                    <i class="bi bi-headphones text-light fs-5"></i>
                                    <a class="nav-link text-light table-hover dropdown-toggle" href="" role="button" data-bs-toggle="dropdown" aria-expanded="false"> Accessory</a>
                                    <ul class="dropdown-menu bg-warning">
                                        <li><a class="dropdown-item " href="index.php?product=accessory">Sac Du Phong</a></li>
                                        <li><a class="dropdown-item" href="#">Tai Nghe</a></li>
                                        <li><hr class="dropdown-divider"></li>
                                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                                    </ul>
                                </li>
                                <li class="nav-item d-flex align-items-baseline flex-wrap">
                                    <i class="bi bi-box-arrow-in-right text-light fs-5"></i>
                                    <a class="nav-link text-light table-hover" href="login.php" > Login</a>
                                </li>
                            </ul>
                            <!-- <form class="d-flex pb-1" role="search" method="get" action="index.php">
                                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_product">
                                <button class="btn btn-warning" type="submit" name="btn_search" value="submit">Search</button>
                            </form> -->
                        </div>
                        <a href="" class="navbar-brand m-lg-1"><i class="bi bi-cart4 text-bg-danger p-2  rounded "></i></a>
                        
                    </div>
                </nav>
                
            </div>
        </div>

        <div class="row my-2 ms-2">
            <ul class="d-flex flex-wrap">
                <li class="list-group-item pe-2 text-warning">Nhan hieu: </li>
                <?php  showbrand($GLOBALS["qr"]);   ?>
                <li class="list-group-item  me-2  text-center "> <a class="text-center border rounded-pill px-3" href="index.php?product=<?php echo $title  ?>&brand=all">All</a> </li>
            </ul>
        </div>
        
        <!-- list product style="margin-left: 0; margin-right: 0;" -->
        <div class="row g-1 gy-1 digiMenu bg-white" >
            <?php 
                showlist($sql,$GLOBALS["note"]);
                // showlist($GLOBALS["sql"]);
            ?>
        </div>
       
    </div>


    <script>
        var boxHovered, boxNumber, selector, targetedBox, adjustX, adjustY;
        $(".popup").hide();//This hides all the pop-ups when page loads
        $(".box").hover(function(){//This executes when you hover ON the box
            boxHovered = $(this).attr("id");//Gets the id of the box such as "box1", "box2"
            // console.log(boxHovered);
            targetedBox = "#" + boxHovered;//creates a value of "#box1", "#box2", etc for future use
            boxNumber = boxHovered.substr(3,5);//extracts the # from the id, such as 1, 2, 3
            // console.log(boxNumber);
            selector = "#popup"+boxNumber;//creates a value of "#popup1", "#popup2", etc for future use
            $(selector).show();//This reveals the popup inside the hovered box
            moveBox();//This calls on the function below to execute
        },function(){//This executes when you hover OFF the box
            $(selector).hide();//This hides the popup inside the hovered box
        });
        function moveBox(){
            $(targetedBox).bind('mousemove',function(event){//Executes when the mouse MOVES
                adjustX = $(this).find(".popup").outerWidth(true)-150;//gets the width of the targeted popup
                adjustY = $(this).find(".popup").outerHeight(true);//gets the height of the targeted popup
                console.log(adjustX,adjustY);
                //event.pageY or event.pageX = the mouse position relative to the top left of the targeted box
                var my = event.pageY-$(this).offset().top-adjustY;//my = mouse y position with some adjustment relateive to top of box
                var mx = event.pageX-$(this).offset().left-adjustX; //mx = mouse x position with some adjustment relateive to left of box
                $(selector).css({//set the selected popup box coordinates near the mouse as the mouse moves
                    "left":mx,
                    "top":my
                });
            });
        }
    </script>
    <script src="./assets/js/index.js"></script>
</body>
</html>