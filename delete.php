<?php
include "db.php";

$id = $_GET['id'];

$sql = "DELETE FROM appointments WHERE appointment_id = $id";

if ($conn->query($sql) === TRUE) {
    header("Location: records.php");
}
?>