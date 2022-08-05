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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/6.4.8/swiper-bundle.min.css"/>

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
            <button class="navbar-toggler btn-dark" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"><i class="fa fa-bars" aria-hidden="true"></i></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
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

    <div class="header mb-5 py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-12 col-12 my-5 px-5">
                    <h1>Get Your Personal Vip Number at minimal costs.</h1>
                    <h5>Get your numbers at your location delivered safely. Reach us now!</h5>
                    <a href="contactus.php">Contact Us</a>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 col-12 my-5 px-5">
                    <img src="./images/image.png" alt="" class="img-fluid">
                </div>
            </div>
        </div>
    </div>

    <section class="search container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12 col-12 mb-5 px-5">
                <h2>Search Your Number Now</h2>
                <form action="vipnumber.php" method="GET" class="form-inline my-2 my-lg-0">
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

    <section class="my-5 categories container">
        <h2 class="text-center">Our Categories</h2>
        <span class="section-separator"></span>

        <div class="row text-center">
            <div class="col-lg-3 col-md-3 col-sm-6 col-6">
                <img src="./images/786.png" alt="">
                <a href="vipnumber.php?cat=786">786 786</a>
                <p>786 Lover starts from 3000</p>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-6">
                <img src="./images/420.png" alt="" >
                <a href="vipnumber.php?cat=420">420 420</a>
                <p>420 Lover starts from 3000</p>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-6">
                <img src="./images/000.png" alt="">
                <a href="vipnumber.php?cat=000">Triple 000</a>
                <p>Triple 000 Lover starts from 3000</p>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-6">
                <img src="./images/xyxy.png" alt="">
                <a href="vipnumber.php?cat=xyxy">XY XY</a>
                <p>XY twice Lover starts from 3000</p>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-6">
                <img src="./images/symmetry.png" alt="">
                <a href="vipnumber.php?cat=symmetry">XA XB XC XD XE</a>
                <p>Symmetry Number starts from 3000</p>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-6">
                <img src="./images/xxyyzz.png" alt="">
                <a href="vipnumber.php?cat=doublets">XX YY ZZ</a>
                <p>Doublets Lover starts from 3000</p>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-6">
                <img src="./images/mirror.png" alt="">
                <a href="vipnumber.php?cat=mirror">Mirror</a>
                <p>Mirror Lover starts from 3000</p>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-6">
                <img src="./images/semimirror.png" alt="">
                <a href="vipnumber.php?cat=Semimirror">SemiMirror</a>
                <p>SemiMirror Lover starts from 3000</p>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-6">
                <img src="./images/tetra.png" alt="">
                <a href="vipnumber.php?cat=mirror">Mirror</a>
                <p>Mirror Lover starts from 3000</p>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-6">
                <img src="./images/penta.png" alt="">
                <a href="vipnumber.php?cat=penta">Penta</a>
                <p>Penta Lover starts from 3000</p>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-6">
                <img src="./images/2213420.png" alt="">
                <a href="vipnumber.php?cat=2213420">2213420</a>
                <p>2213420 Lover starts from 3000</p>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-6">
                <img src="./images/hexa.png" alt="">
                <a href="vipnumber.php?cat=hexa">Hexa</a>
                <p>Hexa Lover starts from 3000</p>
            </div>
        </div>
    </section>


    <section class="review">
        <div class="container">
            <div class="section-title">
                <h2>Word From Our Clients</h2>
                <span class="section-separator"></span>
                <!-- <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p> -->
            </div>
        </div>
        <div class="testimonials-carousel-wrap">
            <div class="listing-carousel-button listing-carousel-button-next"><i class="fa fa-caret-right" style="color: #fff"></i></div>
            <div class="listing-carousel-button listing-carousel-button-prev"><i class="fa fa-caret-left" style="color: #fff"></i></div>
            <div class="testimonials-carousel">
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="testi-item">
                                <div class="testi-avatar"><img src="./images/21.jpg"></div>
                                <div class="testimonials-text-before"><i class="fa fa-quote-right"></i></div>
                                <div class="testimonials-text">
                                    <div class="listing-rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
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
                                <div class="testi-avatar"><img src="./images/3.jpg"></div>
                                <div class="testimonials-text-before"><i class="fa fa-quote-right"></i></div>
                                <div class="testimonials-text">
                                    <div class="listing-rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
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
                                <div class="testi-avatar"><img src="./images/4.jpg"></div>
                                <div class="testimonials-text-before"><i class="fa fa-quote-right"></i></div>
                                <div class="testimonials-text">
                                    <div class="listing-rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
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
                                <div class="testi-avatar"><img src="./images/6.jpg"></div>
                                <div class="testimonials-text-before"><i class="fa fa-quote-right"></i></div>
                                <div class="testimonials-text">
                                    <div class="listing-rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
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


    <section class="premium text-center my-5 container">
        <h2>Our Premiums</h2>
        <span class="section-separator"></span>
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-6 col-12 mb-5">
              <div class="card">
                <div class="card-body">
                  <h6 class="card-title ">Paring Doublet</h6>
                  <h3 class="card-title">Starts From 10k</h3>
                  <p class="card-text">AA BB CC DD EE</p>
                  <hr>
                  <p class="card-text">AB AB AB AB AB</p>
                  <hr>
                  <p class="card-text">X AA BB CC DD X</p>
                  <hr>
                  <a href="#" class="btn">Contact Now</a>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-12 mb-5">
              <div class="card" style="background-color: #03045E;">
                <div class="card-body text-white">
                    <h6 class="card-title text-white">Tetra Lover</h6>
                    <h3 class="card-title text-white">Starts From 15k</h3>
                    <p class="card-text text-white">XXX00 00XXX</p>
                    <hr class="bg-white">
                    <p class="card-text text-white">XXXXX X0000</p>
                    <hr class="bg-white">
                    <p class="card-text text-white">XXXXX 0000X</p>
                    <hr class="bg-white">
                    <a href="#" class="btn" style="background-color: #6C6CAC;">Contact Now</a>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-12 mb-5">
                <div class="card">
                  <div class="card-body">
                    <h6 class="card-title">Penta Lover</h6>
                  <h3 class="card-title">Starts From 20k</h3>
                  <p class="card-text">XX000 00XXX</p>
                  <hr>
                  <p class="card-text">XXXXX 00000</p>
                  <hr>
                  <p class="card-text">XXXX0 0000X</p>
                  <hr>
                  <a href="#" class="btn">Contact Now</a>
                  </div>
                </div>
              </div>
              <div class="col-lg-3 col-md-3 col-sm-6 col-12 mb-5">
                <div class="card">
                  <div class="card-body">
                    <h6 class="card-title">Hexa Lover</h6>
                  <h3 class="card-title">Starts From 25k</h3>
                  <p class="card-text">XX000 000XX</p>
                  <hr>
                  <p class="card-text">XXXX0 00000</p>
                  <hr>
                  <p class="card-text">XXX00 0000X</p>
                  <hr>
                  <a href="#" class="btn">Contact Now</a>
                  </div>
                </div>
              </div>
          </div>

    </section>

    <section class="footer">
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
                    <li><a href="v  ipnumber.php">VIP Numbers</a></li>
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
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>       -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/6.4.8/swiper-bundle.min.js"></script>

</body>

</html>