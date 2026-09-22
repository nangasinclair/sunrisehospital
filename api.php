<?php
include "db.php";

$sql = "SELECT * FROM appointments";
$result = $conn->query($sql);

$appointments = [];

while($row = $result->fetch_assoc()) {
    $appointments[] = $row;
}

header('Content-Type: application/json');
echo json_encode($appointments);
?>