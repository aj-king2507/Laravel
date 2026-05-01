<?php
header("Content-Type: application/json");
include __DIR__ ."/db.php";
$name=$_POST['name'] ?? '';
$email=$_POST['email'] ?? '';
$phone=$_POST['phone'] ?? '';
$service=$_POST['service'] ?? '';
$date=$_POST['date'] ?? '';
$timeslot=$_POST['timeslot'] ?? '';

if (empty($name) || empty($email) || empty($phone) || empty($service) || empty($date) || empty($timeslot)) {
    echo json_encode([
        "status" => "error",
        "message" => "All fields are required"
    ]);
    exit();
}
$stmt = $conn->prepare("
    INSERT INTO appointments
    (customer_name, email, phone, service, time_slot, appointment_date)
    VALUES (?, ?, ?, ?, ?, ?)
");
$stmt->bind_param(
    "ssssss",
    $name,
    $email,
    $phone,
    $service,
    $timeslot,
    $date
);
if ($stmt->execute()) {
    echo json_encode([
       "status"=> "success",
        "message" => "Appointment booked successfully.",
        "data"=>[
            "name"=> $name,
            "service"=> $service,
            "date"=> $date,
            "time"=> $timeslot
        ]
    ]);
}else {
    echo json_encode([
        "status"=>"error",
        "message"=> "Booking failed. Try again."
    ]);
}
$stmt -> close();
$conn -> close();
?>