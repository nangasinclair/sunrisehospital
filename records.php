<section id="navbar">
    <div class="logo-container">
        <img src="img/logo1.png" alt="Sunrise Logo" class="logo">
        <span class="gradient-text">Sunrise Hospital</span>
    </div>

    <div class="nav-content">
        <a href="index.html#hero">Home</a>
        <a href="index.html#about">About Us</a>
        <a href="index.html#services">Services</a>
        <a href="index.html#contact">Contact Us</a>
        <a href="index.html#booking" class="nav-cta">Book Appointment</a>
    </div>
</section>

<?php
include "db.php";

$search = "";

if (isset($_GET['search'])) {
    $search = $_GET['search'];
    $sql = "SELECT * FROM appointments 
            WHERE patient_name LIKE '%$search%' 
            OR national_id LIKE '%$search%'";
} else {
    $sql = "SELECT * FROM appointments";
}

$result = $conn->query($sql);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>Appointment Records</title>
    <link rel="stylesheet" href="record.css">
</head>
<body>

<section class="records-section">
    <div class="section-container">

        <h1>Booked Appointments</h1>
        <p class="intro">Manage all patient appointment records here.</p>

        <!-- Search Form -->
        <form method="GET" class="search-form">
            <input 
                type="text" 
                name="search" 
                placeholder="Search by name or ID"
                value="<?php echo $search; ?>"
            >
            <button type="submit">Search</button>
        </form>

        <!-- Records Table -->
        <div class="table-container">
            <table>
                <tr>
                    <th>ID</th>
                    <th>Patient Name</th>
                    <th>National ID</th>
                    <th>Gender</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Department</th>
                    <th>Date</th>
                    <th>Action</th>
                </tr>

                <?php while($row = $result->fetch_assoc()) { ?>
                <tr>
                    <td><?php echo $row['appointment_id']; ?></td>
                    <td><?php echo $row['patient_name']; ?></td>
                    <td><?php echo $row['national_id']; ?></td>
                    <td><?php echo $row['gender']; ?></td>
                    <td><?php echo $row['phone_number']; ?></td>
                    <td><?php echo $row['email_address']; ?></td>
                    <td><?php echo $row['department']; ?></td>
                    <td><?php echo $row['appointment_date']; ?></td>
                    <td>
                        <a href="delete.php?id=<?php echo $row['appointment_id']; ?>" class="delete-btn">
                            Delete
                        </a>
                    </td>
                </tr>
                <?php } ?>

            </table>
        </div>

    </div>
</section>

  <footer id="site-footer">
    <div class="footer-container">

        <div class="footer-brand">
            <span class="footer-logo-text">Sunrise Hospital</span>
            <p>Quality healthcare with compassion and excellence.</p>
        </div>

        <div class="footer-meta">
            <p>&copy; 2026 Sunrise Community Hospital. All rights reserved.</p>

            <p class="footer-credit">
                Designed & Created by:
                <span class="designer-name">
                    <a href="https://portfolio-tireitos-projects.vercel.app/" target="_blank">
                        Jeff
                    </a>
                </span>
            </p>

            <div class="footer-socials">
                <a href="#">Facebook</a>
                <a href="#">X (Twitter)</a>
                <a href="#">LinkedIn</a>
            </div>
        </div>

    </div>
</footer>
</body>
</html>