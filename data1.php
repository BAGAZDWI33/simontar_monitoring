<?php
include 'koneksi.php';

$query = mysqli_query($conn, "SELECT * FROM sensor_data ORDER BY id DESC LIMIT 1");
if ($query && mysqli_num_rows($query) > 0) {
    $row = mysqli_fetch_assoc($query);
    echo json_encode([
        'ph' => $row['ph_value'],
        'tds' => $row['tds_value'],
        'temperature' => $row['temperature'],
    ]);
} else {
    echo json_encode([
        'ph' => 'No Data',
        'tds' => 'No Data',
        'temperature' => 'No Data',
    ]);
}
