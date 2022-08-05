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
                    <li class="nav-item">
                        <a class="nav-link" href="vipnumber.php">VIP NUMBERS</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="contactus.php">CONTACT US</a>
                    </li>

                </ul>
            </div>
        </nav>
    </div>

    <section class="container mb-5 pb-5">
        <div class="row text-center py-5">
            <div class="col-md-4 col-sm-6 mb-3">
                <div class="teamblock-contact">
                    <div class="col-md-12 py-4">
                        <i class="fa fa-map-marker fa-3x " aria-hidden="true"></i>
                        <p>Adarsh Nagar Gali No. 6 , Sri Muktsar Sahib, Punjab 152026</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 mb-3">
                <div class="teamblock-contact">
                    <div class="col-md-12 py-4">
                        <i class="fa fa-envelope fa-3x" aria-hidden="true"></i>
                        <p class="mb-1">Mail us on</p>
                        <a href="#">rajnishmadaan47@gmail.com</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 mb-3">
                <div class="teamblock-contact">
                    <div class="col-md-12 py-4">
                        <i class="fa fa-phone fa-3x" aria-hidden="true"></i>
                        <a href="#">+91  95923 43609</a>
                        <p>Call time :- 9am to 9pm</p>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="contact container pb-5 mb-5">
        <!-- <div class="row">
          <div class="col-lg-6 col-md-6 col-sm-12 col-12"> -->
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7795.545118767229!2d74.50886602481606!3d30.48586400879031!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x391768c7d91b1953%3A0xe221f7febf43d8bc!2sAdarsh%20Nagar%2C%20Sri%20Muktsar%20Sahib%2C%20Punjab%20152026!5e0!3m2!1sen!2sin!4v1659084966570!5m2!1sen!2sin" class="w-100" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>        <!-- </div>
          <div class="col-lg-6 col-md-6 col-sm-12 col-12">
            <div class="teamblock-contact">
                <form>
                    <div class="row mb-2 px-2 py-2">
                      <div class="col">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name">
                      </div>
                      <div class="col">
                        <label for="email">Name</label>
                        <input type="email" class="form-control" name="email">
                      </div>
                    </div>
                    <div class="row px-2">
                        <div class="col">
                            <label for="number">Phone Number</label>
                            <input type="text" class="form-control" name="Phone" pattern="[7-9]{1}[0-9]{9}" 
                            title="Phone number with 7-9 and remaing 9 digit with 0-9">
                          </div>
                    </div>
                    <div class="row px-2">
                        <div class="col">
                          <label for="inputCity">City</label>
                          <input type="text" class="form-control" id="inputCity">
                        </div>
                        <div class="col">
                            <label for="inputZip">Zip</label>
                            <input type="text" class="form-control" id="inputZip">
                        </div>
                    </div>
                    <div class="row px-2 py-2">
                        <div class="col">
                            <textarea name="comment" cols="4" rows="5" class="form-control w-100"></textarea>
                          </div>
                    </div>
                    <button type="submit" class="btn">Submit</button>
                  </form>
            </div>
          </div>
        </div> -->
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
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/6.4.8/swiper-bundle.min.js"></script> -->

</body>

</html>