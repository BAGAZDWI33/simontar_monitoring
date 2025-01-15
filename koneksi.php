<?php
$servername = "localhost"; // Server database
$username = "root";        // Username database
$password = "";            // Password database
$dbname = "sensor_data"; // Nama database

// Membuat koneksi
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Cek koneksi
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
