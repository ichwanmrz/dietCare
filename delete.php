<?php

if ( isset($_GET["id"]) ) {
    $id = $_GET["id"];

$servername = "localhost";
$username = "root";
$password = "";
$database = "dietcare";
$conn = new mysqli($servername, $username, $password, $database);

$sql = "DELETE FROM dietcare WHERE id=$id";
$conn->query($sql);
}

header('location:/dashboard.php');
exit;
?>