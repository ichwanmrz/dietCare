<?php
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

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    
    if ( !isset($_GET["id"]) ) {
        header('location:/dashboard.php');
        exit;
    }
    
    $id = $_GET["id"];

    $sql = "SELECT * FROM dietcare WHERE id=$id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc(); 
            
    
    if (!$row) {
        header('location:/dashboard.php');
        exit;
    }
    
    $name = $row["name"];
    $phone = $row["phone"];
    $Age = $row["Age"];
    $Address = $row["Address"];
}
else {
    $id = $_POST["id"];
    $name = $_POST["name"];
    $phone = $_POST["phone"];
    $Age = $_POST["Age"];
    $Address = $_POST["Address"];

    do {
        if ( empty($name) || empty($phone) || empty($Age) || empty($Address)){
            $errorMessage = "All the fields are required";
            break;
        }
            $sql = "UPDATE dietcare SET name='$name', phone='$phone', Age='$Age', Address='$Address' WHERE id=$id";
            $result = $conn->query($sql); 
           
            
            if (!$result) {
                $errorMessage="Invalid query:".$conn->error;
                break;
            }

            $successMessage = "User Updated correctly";
            
            header('location:/dashboard.php');
            exit;
          
    } while (false);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</head>

<body>
    <div class='container my-5'>
        <h2>New User</h2>
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
        <form method="post">
            <input type="hidden" name="id" value="<?php echo $id;?>">
            <div class='row mb-3'>
                <label class='col-sm-3 col-form-label'>Name</label>
                <div class='col-sm-6'>
                    <input type='text' class='form-control' name='name' value="<?php echo $name;?>">
                </div>
            </div>

            <div class='row mb-3'>
                <label class='col-sm-3 col-form-label'>Phone</label>
                <div class='col-sm-6'>
                    <input type='text' class='form-control' name='phone' value="<?php echo $phone;?>">
                </div>
            </div>

            <div class='row mb-3'>
                <label class='col-sm-3 col-form-label'>Age</label>
                <div class='col-sm-6'>
                    <input type='number' class='form-control' name='Age' value="<?php echo $Age;?>">
                </div>
            </div>

            <div class='row mb-3'>
                <label class='col-sm-3 col-form-label'>Address</label>
                <div class='col-sm-6'>
                    <input type='text' class='form-control' name='Address' value="<?php echo $Address;?>">
                </div>
            </div>

            <?php if (!empty($succesMessage)) { 
                echo "
                <div class='alert' role='alert'>
                <strong>$errorMessage</strong>
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                </div>
                " ; 
            } 
            ?>

            <div class='row mb-3'>
                <div class='offset-sm-3 col-sm-3 d-grid'>
                    <button type='submit' class='btn btn-primary'>Submit</button>
                </div>
                <div class='col-sm-3 d-grid'>
                    <a class='btn btn-outline-primary' href='/dashboard.php'>Cancel</a>
                </div>
            </div>
        </form>
    </div>
</body>

</html>