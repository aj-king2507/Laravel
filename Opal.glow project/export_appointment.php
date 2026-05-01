<?php
header("Content-Type: application/json");
include __DIR__ . "/db.php";
$query= "SELECT * FROM appointments";
$result=mysqli_query($conn,$query);
$appointments =[];
while ($row =mysqli_fetch_assoc($result)){
    $appointments[]=$row;
}
$json=json_encode($appointments,JSON_PRETTY_PRINT);
$filePath = "appointments.json";
if (file_put_contents($filePath,$json)){
    echo json_encode([
        "status"=> "success",
        "message"=> "JSON file created successfully",
        "file"=> $filePath,
        "records"=> count($appointments)
    ]);
}else {

    echo json_encode([
        "status" => "error",
        "message" => "Failed to create JSON file"
    ]);
}
$conn->close();
?>