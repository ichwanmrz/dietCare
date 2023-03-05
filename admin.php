<?php


$servername = "localhost";
$username = "root";
$password = "";
$database = "dietcare";

$conn = new mysqli($servername, $username, $password, $database);

// include 'config.php';
 
error_reporting(0);
 
session_start();
 
if (isset($_SESSION['name'])) {
    header("Location: dashboard.php");
}
 
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $phone = $_POST['phone'];

    $sql = "SELECT * FROM dietcare WHERE name='$name' AND phone='$phone'";
    $result = mysqli_query($conn, $sql);
    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['name'] = $row['name'];
        header("Location: dashboard.php");
    } else {
        echo "<script>alert('Email atau password Anda salah. Silahkan coba lagi!')</script>";
    }
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
    <title>Admin</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- bootstrap css -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- style css -->
    <link rel="stylesheet" href="css/style.css">
    <!-- Responsive-->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- fevicon -->
    <!-- <link rel="icon" href="images/fevicon.png" type="image/gif" /> -->
    <!-- Scrollbar Custom CSS -->
    <!-- <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css"> -->
    <!-- Tweaks for older IEs-->
    <!-- <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css"> -->
    <!-- owl stylesheets -->
    <!-- <link rel="stylesheet" href="css/owl.carousel.min.css"> -->
    <!-- <link rel="stylesheet" href="css/owl.theme.default.min.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css"
        media="screen">
</head>

<body>
    <!-- header section start -->
    <div class="header_section">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="logo"><a href="index.php"><img src="images/logo apel.png"></a></div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="informasi.html">Informasi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="health.html">Kesehatan Ginjal</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">Login as User</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#"><img src="images/search-icon.png"></a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
    <!-- header section end -->
    <!-- registrasi section start -->
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
                            <h1 class="book_title">Admin Login</h1>



                            <form id="registration-form" method="post">
                                <input type="text" class="Name_text" placeholder="Name" name="name"
                                    value="<?php echo $_POST['name']; ?>">
                                <input type="text" class="Phone_text" placeholder="Phone Number" name="phone"
                                    value="<?php echo $_POST['phone']; ?>">

                                <div class="send_bt">
                                    <button type="submit" name="submit">Login</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- registrasi section end -->
    <!-- footer section start -->
    <div class="footer_section layout_padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-sm-6">
                    <div class="footer_logo"><a href="index.html"><img src="images/footer-logo.png"></a></div>
                    <h1 class="adderss_text">Contact Us</h1>
                    <div class="map_icon"><img src="images/map-icon.png"><span class="paddlin_left_0">Page when looking
                            at its</span></div>
                    <div class="map_icon"><img src="images/call-icon.png"><span
                            class="paddlin_left_0">+7586656566</span></div>
                    <div class="map_icon"><img src="images/mail-icon.png"><span
                            class="paddlin_left_0">volim@gmail.com</span></div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <h1 class="adderss_text">Doctors</h1>
                    <div class="hiphop_text_1">There are many variations of passages of Lorem Ipsum available, but the
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
            <p class="copyright_text">2023 All Rights Reserved. Design by <a href="https://html.design">Nooraini</a></p>
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