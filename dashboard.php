<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- style css -->
    <link rel="stylesheet" href="css/style.css">
    <!-- Responsive-->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- fevicon -->
    <link rel="icon" href="images/fevicon.png" type="image/gif" />
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
    <!-- Tweaks for older IEs-->
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
    <!-- owl stylesheets -->
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css"
        media="screen">
</head>

<body>
    <!-- <form id="registration-form" action="proses.php" method="post">

        <label for="">Name</label>
        <input type="text" name="name" autocomplete="off"><br />

        <label for="">Phone</label>
        <input type="number" name="phone" autocomplete="off"><br />

        <label for="">Email</label>
        <input type="email" name="email" autocomplete="off"><br />

        <label for="">age</label>
        <input type="number" name="age" autocomplete="off"><br />

        <label for="">Address</label>
        <input type="text" name="address" autocomplete="off"><br />

        <button type="submit" name="submit">Register</button>
    </form> -->

    <div class="header_section">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="logo"><a href="index.html"><img src="images/logo apel.png"></a></div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.html">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="health.html">Health</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="medicine.html">Program</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="news.html">Informasi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="client.html">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="registrasi.html">Register</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><img src="images/search-icon.png"></a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>

    <div class="dashboard_section  ">
        <h1 class="dashboard_title mt-3 mb-3 ms-5 "><u>Dashboard Admin</u>
        </h1>
        <br>
        <a class=" btn btn-primary ms-5 mb-3" href="/contact.php">Add New User</a>
        <br>
        <table class="table table-striped ms-5 w-75 text-center">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Age</th>
                    <th>Address</th>
                    <th>Created_at</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $database = "dietcare";

                $conn = new mysqli($servername, $username, $password, $database);
                if ($conn->connect_error) {
                    die("An error occurred. Please try again.".$conn->connect_error);
                  }
            
                $sql = "SELECT * FROM dietcare";
                $result = $conn->query($sql);  

                if (!$result) {
                    die("Invalid query". $conn->connect_error);
                  }
                
                while($row = $result->fetch_assoc()){
                    echo "  
                    <tr>
                    <td>$row[id]</td>
                    <td>$row[name]</td>
                    <td>$row[phone]</td>
                    <td>$row[Age]</td>
                    <td>$row[Address]</td>
                    <td>$row[created_at]</td>
                    <td>
                    <a class='btn btn-primary btn-sm' href='/edit.php?id=$row[id]'>Edit</a>
                    <a class='btn btn-danger btn-sm' href='/delete.php?id=$row[id]'>Delete</a>
                    </td>
                    </tr> 
                    ";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>