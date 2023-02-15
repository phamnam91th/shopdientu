<?php
    require "config.php";
    require "show-index.php";


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DIGISHOP</title>
    <link rel="stylesheet" href="./assets/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container-xl ">
        <header>
            <nav class="nav-1">
                <li><a href="">Home</a></li>
                <li><a href="">Product</a></li>
                <li><a href="">Cart</a></li>
                <li><a href="">About Us</a></li>
                <li><a href="./login.php">Login</a></li>
            </nav>
        </header>

        <section>
            <div class="sidebar">
                <nav class="nav-2">
                    <li onclick="showContent(0)" value="12"><a href="#">Top Sale</a></li>
                    <li onclick="showContent(1)"><a href="#">Phone</a></li>
                    <li onclick="showContent(2)"><a href="#">Laptop</a></li>
                    <li onclick="showContent(3)"><a href="#">Smart Watch</a></li>
                    <li onclick="showContent(4)"><a href="#">Tablet</a></li>
                </nav>
            </div>
            <div class="content">
                <div class="slide">
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

                <div class="content-menu">
                    <div class="top-sale">
                        <h3>Top san pham ban chay</h3>
                    </div>
                    
                    <div class=" content-menu-1 aa">
                        
                    </div>
                </div>
                <div class="content-menu">
                    <div class="top-sale">
                        <h3>TOP PHONE</h3>
                    </div>
                    <div class="sort-item">              
                        <span class="sortTitle" onclick="sort_select()">Lua chon cua ban</span>
                        <ion-icon name="caret-down-outline"></ion-icon>
                        <ul class="sortMenu">
                            <li onclick="sortUP(1)">Gia tang dan</li>
                            <li onclick="sortDOWN(1)">Gia giam dan</li>
                            <li onclick="sortNAME(1)">A-Z</li>
                        </ul>
                    </div>
                    <div class="content-menu-2 aa">
                        <?php 
                            for($s=0; $s<count($list_phone);$s++) {
                                echo $list_phone[$s];
                            }
                        ?>
                    </div>
                </div>

                <div class="content-menu">
                    <div class="top-sale">
                        <h3>Top Laptop</h3>
                    </div>
                    <div class="content-menu-3 aa">
                    <?php 
                            for($s=0; $s<count($list_laptop);$s++) {
                                echo $list_laptop[$s];
                            }
                        ?>
                    </div>
                </div>
                <div class="content-menu">
                    <div class="top-sale">
                        <h3>Top SmartWatch</h3>
                    </div>
                    <div class="content-menu-4 aa">
                    <?php 
                            for($s=0; $s<count($list_smartwatch);$s++) {
                                echo $list_smartwatch[$s];
                            }
                        ?>
                    </div>
                </div>

                <div class="content-menu">
                    <div class="top-sale">
                        <h3>Top Tablet</h3>
                    </div>
                    <div class="content-menu-5 aa">
                        <?php 
                            for($s=0; $s<count($list_tablet);$s++) {
                                echo $list_tablet[$s];
                            }
                        ?>
                    </div>
                </div>

                <div class="content-menu">
                    <div class="top-sale">
                        <h3>Infor</h3>
                    </div>
                    <div class="content-menu-5 aa">
                        <?php 
                            for($s=0; $s<count($list_tablet);$s++) {
                                echo $list_tablet[$s];
                            }
                        ?>
                    </div>
                </div>
                <!-- <div class="pic">
                    <a href="index.php?id=2">
                        <img src="" alt="">
                    </a>
                </div> -->
                
            </div>
        </section>
    
        <footer>
            <p>Lien he voi chung toi. <a href="mailto:phamnam1991@gmail.com">phamnam1991@gmail.com</a></p>        
        </footer>
    </div>


    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

    <script src="./assets/js/index.js"></script>
</body>
</html>