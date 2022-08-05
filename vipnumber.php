<?php 
require_once  "./connection.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RVIP</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <!-- CSS -->
    <link rel="stylesheet" href="./style/style.css">

    <!-- swiper -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/6.4.8/swiper-bundle.min.css"/>

    <!-- font awesome -->
    
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>

    <!-- navbar -->
    <div style="background-color: #03045E;">
        <nav class="navbar navbar-expand-lg container">
            <a class="navbar-brand text-white" href="#"><img src="./images/logo0.png" height="70px" width="70px"
                    alt=""></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"><i class="fa fa-bars" aria-hidden="true"></i></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">HOME <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="aboutus.php">ABOUT US</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="vipnumbers.php" role="button" data-toggle="dropdown"
                            aria-expanded="false">
                            CATEGORIES
                        </a>
                        <div class="dropdown-menu">
                        <?php 

                        $sql_query = "SELECT * FROM `category`";
                        $result = mysqli_query($conn , $sql_query);
                        while( $rows = mysqli_fetch_assoc($result) ){
                            echo '<a class="dropdown-item" href="vipnumber.php?cat='.$rows['name'].'">'.$rows['name'].'</a>';
                        }

                        ?>
                        </div>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="vipnumber.php">VIP NUMBERS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contactus.php">CONTACT US</a>
                    </li>

                </ul>
            </div>
        </nav>
    </div>

    <div class="header">
        <section class="container mb-5 mt-2">
            <h2 class="text-center">VIP Numbers</h2>
            <p><strong>Get your VIP number now all you need is :-</strong></p>
            <p><i class="fa fa-arrow-right" aria-hidden="true"></i>ID proof & address proof of the person who is taking
                the connection</p>
            <p><i class="fa fa-arrow-right" aria-hidden="true"></i> 1 Latest passport size photograph</p>
            <p>Book Your Vip Number Now! <a href="">Contact Us</a></p>
        </section>
    </div>

    <section class="search container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12 col-12 mb-5 px-5">
                <h2>Search Your Number Now</h2>
                <form action="" method="GET" class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" name="search" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn my-2 my-sm-0" type="submit">Find Now</button>
                </form>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-12 d-inline mb-5 px-5">
                <div class="d-inline"><a href="vipnumber.php?cat=786">786 Lover</a></div>
                <div class="d-inline"><a href="vipnumber.php?cat=420">420 Lover</a></div>
                <div class="d-inline"><a href="vipnumber.php?cat=000">000 Lover</a></div>
                <div class="d-inline"><a href="vipnumber.php?cat=xyxy">XY XY</a></div>
                <div class="d-inline"><a href="vipnumber.php?cat=xyxyxy">XY XY XY</a></div>
                <div class="d-inline"><a href="vipnumber.php?cat=xxyyzz">XX YY ZZ</a></div>
                <div class="d-inline"><a href="vipnumber.php?cat=Semimirror">SemiMirror</a></div>
                <div class="d-inline"><a href="vipnumber.php?cat=mirror">Mirror</a></div>
            </div>
        </div>
    </section>

    <section class="my-5 gold container">
        <h2 class="text-center"> VIP's</h2>
        <span class="section-separator"></span>

        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-12 col-12">
                <ul>
                    <li><a class="dropdown-item" href="vipnumber.php?vip_section=gold">Gold VIP</a></li>
                    <li><a class="dropdown-item" href="vipnumber.php?vip_section=premium">PREMIUM VIP</a></li>
                </ul>
            </div>
            <div class="col-lg-9 col-md-9 col-sm-12 col-12">
                <div class="row text-center">
                    <?php 
                        // <td>'.$rows['name'].'</td>
                        if(isset($_GET['cat']))
                        {
                           $cat = $_GET['cat']; 
                            $sql_query = "SELECT * FROM `number` where `cat_name` = '$cat'";
                        }else if(isset($_GET['search']))
                        {
                           $cat = $_GET['search']; 
                            $sql_query = "SELECT * FROM `number` where `number` Like '%$cat%'";
                        }else if(isset($_GET['vip_section']))
                        {
                           $vip_section = $_GET['vip_section']; 
                            $sql_query = "SELECT * FROM `number` where `vip_section` = '$vip_section'";
                        }else{
                        $sql_query = "SELECT * FROM `number`";
                        }
                        $result = mysqli_query($conn , $sql_query);
                        while( $rows = mysqli_fetch_assoc($result) ){
                            echo '
                            <div class="col-lg-4 col-md-4 col-sm-6 col-6 my-3" style="display:none;">
                            <div class="teamblock-categories">
                                <div class="py-4">
                                    <h6 class="mb-2 text-center d-block">'.$rows['vip_section'].'</h6>
                                    <h6 class="my-0 mr-3 text-left">'.$rows['cat_name'].'</h6>
                                    <h6 class="my-0 ml-3 text-right">RS '.$rows['prize'].'</h6>
                                    <hr class="mt-0">
                                    <p>'.$rows['number'].'</p>
                                    <a target="_blank" href="https://api.WhatsApp.com/send?phone=919592343609&text=Number: '.$rows['number'].' Price: '.$rows['prize'].'" class="m-2">Buy Now</a>
                                    <a href="contactus.php">Contact Now</a>
                                </div>
                            </div>
                        </div>
                            ';
                        }
                        
                    ?>
                </div>
                <button type="submit" class="m-auto load-more">Load More</button>
            </div>
            
        </div>
    </section>


    

    <span class="section-separator"></span>

    <section class="details text-center text-white pb-4">
        <ul>
            <li>20K+</li>
            <li>Customer</li>
        </ul>
        <ul>
            <li>25K+</li>
            <li>Sold Out</li>
        </ul>
        <ul>
            <li>5K+</li>
            <li>Reviews</li>
        </ul>
        <ul>
            <li>20K+</li>
            <li>Vip Numbers</li>
        </ul>
    </section>



    <section class="footer mt-5">
        <div class="container">

        <div class="row p-4">
            <div class="col-lg-3 col-md-3 col-sm-6 col-12">
                <img src="./images/logo0.png" alt="" class="img-fluid w-50">
                <p>Get your numbers at your location delivered safely. Reach us now!</p>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-12">
                <h2>Quick Links</h2>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="aboutus.php">About us</a></li>
                    <li><a href="vipnumber.php">VIP Numbers</a></li>
                    <li><a href="#">Categories</a></li>
                    <li><a href="contactus.php">Contant Us</a></li>
                </ul>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-12">
                <h2>Premium</h2>
                <ul>
                    <li><a href="vipnumber.php?cat=tetra">Tetra Lover</a></li>
                    <li><a href="vipnumber.php?cat=penta">Penta Lover</a></li>
                    <li><a href="vipnumber.php?cat=hexa">Hexa Lover</a></li>
                    <li><a href="vipnumber.php?cat=Doublets">Doublets Us</a></li>
                </ul>    
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-12">
                <h2>Contact Us</h2>
                <ul>
                    <li><i class="fa fa-envelope" aria-hidden="true"></i><a href="mailto:rajnishmadaan47@gmail.com"> rajnishmadaan47@gmail.com</a></li>
                    <li><i class="fa fa-phone" aria-hidden="true"></i><a href="tel:919592343609"> +91- 95923 43609</a></li>
                </ul>
                <h2>Follow Us on</h2>
                <ul class="icons">
                    <li><a target="_blank" href="https://instagram.com/rickymadaan?igshid=YmMyMTA2M2Y="><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                    <li><a target="_blank" href="https://www.facebook.com/ricky.madaan.1"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                    <li><a target="_blank"  href="https://api.WhatsApp.com/send?phone=919592343609"><i class="fa fa-whatsapp" aria-hidden="true"></i></a></li>
                </ul>
            </div>
        </div>
        
    </div>
    <hr class="bg-white">
        <p class="text-center">© Copyright Ⓒ 2022. All Rights Reserved.</p>
    </section>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="./index.js"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" -->
        <!-- crossorigin="anonymous"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct"
        crossorigin="anonymous"></script>

    <!-- Swiper scripts -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/6.4.8/swiper-bundle.min.js"></script> -->
    <!-- <script src="scripts.js"></script> -->

</body>

</html>