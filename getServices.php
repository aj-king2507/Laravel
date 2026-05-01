<?php
include "db_connect.php";

sleep(2); //simulate slow loading

$query = "SELECT id, service_name FROM services";
$result = mysqli_query($conn, $query);

if(!$result){
    die("Query failed: " . mysqli_error($conn));
}

$services = [];

while($row = mysqli_fetch_assoc($result)){
    $services[] = $row;
}

echo json_encode($services);
?>