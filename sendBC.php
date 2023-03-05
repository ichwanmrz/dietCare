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

require_once('ultramsg.class.php'); 

// Retrieve phone numbers from broadcast list
$result = $conn->query('SELECT phone FROM dietcare');
$phones = [];
while ($row = $result->fetch_assoc()) {
    $phones[] = $row['phone'];
}

// Send message to each phone number
foreach ($phones as $phone) {
    $token="c9hpegdjp26zwmxg"; 
    $instance_id="instance33577"; 
    $client = new UltraMsg\WhatsAppApi($token,$instance_id);

    $to=$phone;
    $body="Hello world";
    $api=$client->sendChatMessage($to,$body);
    print_r($api);
}

$conn->close();
?>