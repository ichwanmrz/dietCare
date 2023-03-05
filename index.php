<?php
 
require_once('ultramsg.class.php'); // if you download ultramsg.class.php

$servername = "localhost";
$username = "root";
$password = "";
$database = "dietcare";

$conn = new mysqli($servername, $username, $password, $database);

$name = "";
$phone = "";
$Age = "";
$Address = "";

$errorMessage = "";
$successMessage = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
$name = $_POST["name"];
$phone = $_POST["phone"];
$Age = $_POST["Age"];
$Address = $_POST["Address"];

do {
if(empty($name) || empty($phone) || empty($Age) || empty($Address)){
$errorMessage = "All the fields are required";
break;
}

$sql = "INSERT INTO dietcare(name, phone, Age, Address)".
"VALUES('$name','$phone','$Age','$Address')" ;
$result = $conn->query($sql);

if (!$result) {
$errorMessage="Invalid query:". $conn->error;
break;
}

$name = "";
$phone = "";
$Age = "";
$Address = "";

$token="c9hpegdjp26zwmxg"; // Ultramsg.com token
$instance_id="instance33577"; // Ultramsg.com instance id
$client = new UltraMsg\WhatsAppApi($token,$instance_id);

$to=$_POST["phone"];
$body="Registration Successfully";
$api=$client->sendChatMessage($to,$body);
print_r($api);

$successMessage = "User Added correctly";

header("location:/index.php");
exit;

} while (false);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!-- site metas -->
    <title>HomeCare</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- bootstrap css -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- style css -->
    <link rel="stylesheet" href="css/style.css">
    <!-- Responsive-->
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css"
        media="screen">
</head>

<body>
    <!-- header section start -->
    <div class="header_section ">
        <nav class="navbar navbar-expand-lg navbar-light p-4 ">
            <div class="logo">
                <a href="index.php" class="d-flex">
                    <img src=" images/logo apel.png">
                    <h2 class="mt-3">Kidney health</h2>
                </a>
            </div>
            <button class=" navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto ">
                    <li class="nav-item active">
                        <a class="nav-link" href="#index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./informasi.html">Informasi </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./health.html">Kesehatan Ginjal</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#registration-form">Registrasi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./login.php">
                            Login
                        </a>
                    </li>

                    <a class="nav-link" href="./admin.php">Admin</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><img src="images/search-icon.png"></a>
                    </li>
                </ul>
            </div>
        </nav>
        <!-- header section end -->

        <!-- health section start -->
        <div id="health" class="health_section layout_padding">
            <div class="container">
                <h1 class="health_title">DIET : Best Of Health care for you</h1>
                <p class="health_text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                    incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis</p>
                <div class="health_section layout_padding">
                    <div class="row">
                        <div class="col-sm-7">
                            <div class="image_main">
                                <div class="main">
                                    <img src="images/img-4.png" alt="Avatar" class="image" style="width:100%">
                                </div>
                                <div class="middle">
                                    <div class="text"><img src="images/icon-1.png" style="width: 40px;"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-5">
                            <div class="image_main_1">
                                <div class="main">
                                    <img src="images/img-8.png" alt="Avatar" class="image" style="width:100%">
                                </div>
                                <div class="middle">
                                    <div class="text"><img src="images/icon-1.png" style="width: 40px;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="getquote_bt_1"><a href="#registration-form">Daftar Member <span><img
                                    src="images/right-arrow.png"></span></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- health section end -->
        <div class="registrasi_section layout_padding margin_80">
            <div class="container">
                <h1 class="registrasi_title">Benefit :</h1>
                <div class="registrasi_section_2">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="icon_main">
                                <div class="icon_7"><img src="images/icon-7.png"></div>
                                <h4 class="diabetes_text">Diabetes and obesity Counselling </h4>
                            </div>
                            <div class="icon_main">
                                <div class="icon_7"><img src="images/icon-5.png"></div>
                                <h4 class="diabetes_text">Obstetrics and Gynsecology</h4>
                            </div>
                            <div class="icon_main">
                                <div class="icon_7"><img src="images/icon-6.png"></div>
                                <h4 class="diabetes_text">Surgical and medical Oncology</h4>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="registrasi_box">
                                <h1 class="book_title">Registrasi</h1>

                                <?php
                         if (!empty($errorMessage)) {
                         echo "
                         <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                            <strong>$errorMessage</strong>
                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                         </div>
                         ";
                      }
                      ?>

                                <form id="registration-form" method="post">
                                    <input type="text" class="Name_text" placeholder="Name" name="name"
                                        value="<?php echo $name;?>">
                                    <input type="text" class="Phone_text" placeholder="Phone Number" name="phone"
                                        value="<?php echo $phone;?>">
                                    <input type="number" class="Phone_text" placeholder="Age" name="Age"
                                        value="<?php echo $Age;?>">
                                    <textarea class="massage-bt" placeholder="Alamat Lengkap" rows="5" id="comment"
                                        name="Address" value="<?php echo $Address;?>"></textarea>

                                    <?php if (!empty($succesMessage)) { 
                            echo "
                            <div class='alert' role='alert'>
                            <strong>$errorMessage</strong>
                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                            </div>
                            " ; 
                            } 
                         ?>

                                    <div class="send_bt">
                                        <button type="submit">Register</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- footer section start -->
        <div class="footer_section layout_padding">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-sm-6">
                        <!-- <div class="footer_logo"><a href="index.html"><img src="images/footer-logo.png"></a></div> -->
                        <h1 class="adderss_text">Contact Us</h1>
                        <div class="map_icon"><img src="images/map-icon.png"><span class="paddlin_left_0">Page when
                                looking
                                at its</span></div>
                        <div class="map_icon"><img src="images/call-icon.png"><span
                                class="paddlin_left_0">+878787876</span>
                        </div>
                        <div class="map_icon"><img src="images/mail-icon.png"><span
                                class="paddlin_left_0">test@gmail.com</span></div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <h1 class="adderss_text">Doctors</h1>
                        <div class="hiphop_text_1">There are many variations of passages of Lorem Ipsum available, but
                            the
                            majority have suffered alteration in some form, by injected humour,</div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <h1 class="adderss_text">Useful Links</h1>
                        <div class="Useful_text">There are many variations of passages of Lorem Ipsum available, but the
                            majority have suffered ,</div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <h1 class="adderss_text">Newsletter</h1>
                        <input type="text" class="Enter_text" placeholder="Enter your Emil" name="Enter your Emil">
                        <div class="subscribe_bt"><a href="#">Subscribe</a></div>
                        <div class="social_icon">
                            <ul>
                                <li><a href="#"><img src="images/fb-icon.png"></a></li>
                                <li><a href="#"><img src="images/twitter-icon.png"></a></li>
                                <li><a href="#"><img src="images/linkedin-icon.png"></a></li>
                                <li><a href="#"><img src="images/instagram-icon.png"></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- footer section end -->
        <!-- copyright section start -->
        <div class="copyright_section">
            <div class="container">
                <p class="copyright_text">2023 All Rights Reserved. Design by <a href="#">Madani Dev</a></p>
            </div>
        </div>
        <!-- copyright section end -->
        <!-- Javascript files-->
        <script src="js/jquery.min.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.bundle.min.js"></script>
        <script src="js/jquery-3.0.0.min.js"></script>
        <script src="js/plugin.js"></script>
        <!-- sidebar -->
        <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
        <script src="js/custom.js"></script>
        <!-- javascript -->
        <script src="js/owl.carousel.js"></script>
        <script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
</body>

</html>