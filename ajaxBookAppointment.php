<?php
header('Content-Type: application/json');
include "db_connect.php";

$name = $_POST['name'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$service = $_POST['service-type'];
$timeslot = $_POST['time'];
$date = $_POST['date'];

if(empty($name) || empty($phone) || empty($email) || empty($service) || empty($timeslot) || empty($date)){
    echo json_encode(["status" => "error"]);
} else {
    $query = "INSERT INTO appointments (customer_name, phone, email, service, time_slot, appointment_date)
              VALUES ('$name', '$phone', '$email', '$service', '$timeslot', '$date')";

    if(mysqli_query($conn, $query)){
        echo json_encode(["status" => "success"]);
    } else {
        echo json_encode(["status" => "error"]);
    }
}
?>