<?php
header("Content-Type: application/json");

$service = $_GET['service'] ?? '';

$therapists = [
    "Japanese Head Spa" => ["Seema", "Lucy"],
    "Keratin Hair Treatment" => ["Sara", "Lina"],
    "Glow Revival Facial" => ["Nadia", "Tina"],
    "Microdermabrasion" => ["Sophie", "Anna"],
    "Serenity Massage" => ["Emma", "Lana"],
    "Body Scrub & Wrap" => ["Zara", "Gabby"]
];

if (isset($therapists[$service])) {
    echo json_encode([
        "status" => "success",
        "therapists" => $therapists[$service]
    ]);
} else {
    echo json_encode([
        "status" => "error",
        "therapists" => []
    ]);
}
?>