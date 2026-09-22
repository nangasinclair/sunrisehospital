<?php
include "db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $patient_name = $_POST['patient_name'];
    $national_id = $_POST['national_id'];
    $gender = $_POST['gender'];
    $phone_number = $_POST['phone_number'];
    $email_address = $_POST['email_address'];
    $department = $_POST['department'];
    $appointment_date = $_POST['appointment_date'];

    if (
        empty($patient_name) || empty($national_id) || empty($gender) ||
        empty($phone_number) || empty($email_address) ||
        empty($department) || empty($appointment_date)
    ) {
        die("All fields are required.");
    }

    $sql = "INSERT INTO appointments 
    (patient_name, national_id, gender, phone_number, email_address, department, appointment_date)
    VALUES 
    ('$patient_name', '$national_id', '$gender', '$phone_number', '$email_address', '$department', '$appointment_date')";

    if ($conn->query($sql) === TRUE) {
        echo "<h2>Appointment booked successfully!</h2>";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>