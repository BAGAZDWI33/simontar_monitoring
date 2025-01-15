<?php
include 'koneksi.php';

// Cek koneksi ke database
if (!$conn) {
    echo json_encode([
        'error' => true,
        'message' => 'Database connection failed: ' . mysqli_connect_error()
    ]);
    exit;
}

// Jika menggunakan metode GET, ambil data sensor terbaru
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $query = "SELECT * FROM sensor_data ORDER BY id DESC LIMIT 1";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        // Kirim data dalam format JSON
        echo json_encode([
            'error' => false,
            'pH' => $row['ph_value'],
            'TDS' => $row['tds_value'],
            'temperature' => $row['temperature']
        ]);
    } else {
        echo json_encode([
            'error' => true,
            'message' => 'No sensor data available'
        ]);
    }
    exit;
}

// Jika menggunakan metode POST, masukkan data baru
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $ph = $_POST['ph'];
    $tds = $_POST['tds'];
    $temperature = $_POST['temperature'];

    $query = "INSERT INTO sensor_data (ph_value, tds_value, temperature) VALUES ('$ph', '$tds', '$temperature')";
    if (mysqli_query($conn, $query)) {
        echo json_encode([
            'error' => false,
            'message' => 'Data inserted successfully'
        ]);
    } else {
        echo json_encode([
            'error' => true,
            'message' => 'Error inserting data: ' . mysqli_error($conn)
        ]);
    }
    exit;
}

// Jika metode tidak valid
echo json_encode([
    'error' => true,
    'message' => 'Invalid request method'
]);
