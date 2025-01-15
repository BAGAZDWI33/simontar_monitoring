<?php
include 'koneksi.php';

$statusMessage = "";
$statusType = "";

if ($conn) {
    $statusMessage = "Database Connected Successfully!";
    $statusType = "success"; // Tipe pesan sukses
} else {
    $statusMessage = "Failed to Connect to Database: " . mysqli_connect_error();
    $statusType = "error"; // Tipe pesan error
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $ph = $_POST['ph'];
    $tds = $_POST['tds'];
    $temperature = $_POST['temperature'];

    $query = "INSERT INTO sensor_data (ph_value, tds_value, temperature) VALUES ('$ph', '$tds', '$temperature')";
    if (mysqli_query($conn, $query)) {
        $dataMessage = "Data inserted successfully!";
        $dataType = "success"; // Pesan sukses untuk data
    } else {
        $dataMessage = "Error inserting data: " . mysqli_error($conn);
        $dataType = "error"; // Pesan error untuk data
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connection Status</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
            text-align: center;
        }

        .container {
            margin-top: 50px;
            padding: 20px;
        }

        .message {
            display: inline-block;
            padding: 15px 20px;
            border-radius: 5px;
            margin-top: 20px;
            font-size: 1.2rem;
            color: white;
        }

        .success {
            background-color: #28a745;
        }

        .error {
            background-color: #dc3545;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Connection Status</h1>
        <div class="message <?= $statusType; ?>">
            <?= $statusMessage; ?>
        </div>

        <?php if (isset($dataMessage)): ?>
            <h2>Data Submission</h2>
            <div class="message <?= $dataType; ?>">
                <?= $dataMessage; ?>
            </div>
        <?php endif; ?>
    </div>
</body>

</html>