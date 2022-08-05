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
    <link rel="stylesheet" href="style.css">

    <!-- swiper -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/6.4.8/swiper-bundle.min.css" />

    <!-- font awesome -->

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
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
    }else{
    $sql_query = "SELECT * FROM `number`";
    }
    $result = mysqli_query($conn , $sql_query);
    
?>
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
                    <li class="nav-item ">
                        <a class="nav-link" href="index.php">HOME <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item active">
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
                    <li class="nav-item">
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
        <section class="container my-5">
            <h2 class="text-center">About Us</h2>
            <p><i class="fa fa-arrow-right" aria-hidden="true"></i>VIP’s by ricky was started in 2014 with purposing of
                selling the best numbers to VIP.</p>
            <p><i class="fa fa-arrow-right" aria-hidden="true"></i>We served more than 20K persons in the last 8 years.
                We believe in customer satisfaction with best choice of number.</p>
            <p><i class="fa fa-arrow-right" aria-hidden="true"></i>We have large amount of customers because of our
                pricing.</p>
            <p><strong>Get your VIP number now all you need is :-</strong></p>
            <p><i class="fa fa-arrow-right" aria-hidden="true"></i>ID proof & address proof of the person who is taking
                the connection</p>
            <p><i class="fa fa-arrow-right" aria-hidden="true"></i> 1 Latest passport size photograph</p>
            <p>Book Your Vip Number Now! <a href="contactus.php">Contact Us</a></p>
        </section>
    </div>

    <section class="review">
        <div class="container">
            <div class="section-title">
                <h2>Word From Our Clients</h2>
                <span class="section-separator"></span>
                <!-- <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p> -->
            </div>
        </div>
        <div class="testimonials-carousel-wrap">
            <div class="listing-carousel-button listing-carousel-button-next"><i class="fa fa-caret-right"
                    style="color: #fff"></i></div>
            <div class="listing-carousel-button listing-carousel-button-prev"><i class="fa fa-caret-left"
                    style="color: #fff"></i></div>
            <div class="testimonials-carousel">
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="testi-item">
                                <div class="testi-avatar"><img src="./images./21.jpg"></div>
                                <div class="testimonials-text-before"><i class="fa fa-quote-right"></i></div>
                                <div class="testimonials-text">
                                    <div class="listing-rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                        Ipsum has been the industry's standard dummy text ever since the 1500s, when an
                                        unknown printer took a galley of type and scrambled it to make a type specimen
                                        book.</p>
                                    <a href="#" class="text-link"></a>
                                    <div class="testimonials-avatar">
                                        <h3>John Doe</h3>
                                        <h4>Owner</h4>
                                    </div>
                                </div>
                                <div class="testimonials-text-after"><i class="fa fa-quote-left"></i></div>
                            </div>
                        </div>

                        <!--second--->
                        <div class="swiper-slide">
                            <div class="testi-item">
                                <div class="testi-avatar"><img src="./images./3.jpg"></div>
                                <div class="testimonials-text-before"><i class="fa fa-quote-right"></i></div>
                                <div class="testimonials-text">
                                    <div class="listing-rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                        Ipsum has been the industry's standard dummy text ever since the 1500s, when an
                                        unknown printer took a galley of type and scrambled it to make a type specimen
                                        book.</p>
                                    <a href="#" class="text-link"></a>
                                    <div class="testimonials-avatar">
                                        <h3>Doe Boe</h3>
                                        <h4>Director</h4>
                                    </div>
                                </div>
                                <div class="testimonials-text-after"><i class="fa fa-quote-left"></i></div>
                            </div>
                        </div>
                        <!--third-->

                        <div class="swiper-slide">
                            <div class="testi-item">
                                <div class="testi-avatar"><img src="./images./4.jpg"></div>
                                <div class="testimonials-text-before"><i class="fa fa-quote-right"></i></div>
                                <div class="testimonials-text">
                                    <div class="listing-rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                        Ipsum has been the industry's standard dummy text ever since the 1500s, when an
                                        unknown printer took a galley of type and scrambled it to make a type specimen
                                        book.</p>
                                    <a href="#" class="text-link"></a>
                                    <div class="testimonials-avatar">
                                        <h3>Boe Doe</h3>
                                        <h4>Developer</h4>
                                    </div>
                                </div>
                                <div class="testimonials-text-after"><i class="fa fa-quote-left"></i></div>
                            </div>
                        </div>

                        <!--fourth-->
                        <div class="swiper-slide">
                            <div class="testi-item">
                                <div class="testi-avatar"><img src="./images./6.jpg"></div>
                                <div class="testimonials-text-before"><i class="fa fa-quote-right"></i></div>
                                <div class="testimonials-text">
                                    <div class="listing-rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                        Ipsum has been the industry's standard dummy text ever since the 1500s, when an
                                        unknown printer took a galley of type and scrambled it to make a type specimen
                                        book.</p>
                                    <a href="#" class="text-link"></a>
                                    <div class="testimonials-avatar">
                                        <h3>Doe John</h3>
                                        <h4>Designer</h4>
                                    </div>
                                </div>
                                <div class="testimonials-text-after"><i class="fa fa-quote-left"></i></div>
                            </div>
                        </div>
                        <!--testi end-->

                    </div>
                </div>
            </div>

            <div class="text-center tc-pagination"></div>
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


    <section class="footer my-5">
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
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct"
        crossorigin="anonymous"></script>

    <!-- Swiper scripts -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/6.4.8/swiper-bundle.min.js"></script>

</body>

</html>