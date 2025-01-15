<?php
include 'koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Real-Time Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css"
        rel="stylesheet">
    <style>
    .icon-container {
        width: 60px;
        height: 60px;
    }
    </style>
</head>

<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Real-Time Sensor Dashboard</h1>
        <div class="row">
            <!-- PH Container -->
            <div class="col-lg-4">
                <div class="card info-card" style="border-radius: 20px;">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div
                                class="icon-container bg-primary rounded-circle d-flex align-items-center justify-content-center me-3">
                                <i class="bi bi-droplet text-white" style="font-size: 30px;"></i>
                            </div>
                            <div>
                                <h5>PH</h5>
                                <h6 id="ph-value">Loading...</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- TDS Container -->
            <div class="col-lg-4">
                <div class="card info-card" style="border-radius: 20px;">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div
                                class="icon-container bg-success rounded-circle d-flex align-items-center justify-content-center me-3">
                                <i class="bi bi-water text-white" style="font-size: 30px;"></i>
                            </div>
                            <div>
                                <h5>TDS</h5>
                                <h6 id="tds-value">Loading...</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Temperature Container -->
            <div class="col-lg-4">
                <div class="card info-card" style="border-radius: 20px;">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div
                                class="icon-container bg-warning rounded-circle d-flex align-items-center justify-content-center me-3">
                                <i class="bi bi-thermometer-half text-white" style="font-size: 30px;"></i>
                            </div>
                            <div>
                                <h5>Temperature</h5>
                                <h6 id="temperature-value">Loading...</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
    // Function to fetch data
    function fetchSensorData() {
        fetch('data.php') // Request data from the server
            .then(response => response.json()) // Parse JSON response
            .then(data => {
                // Update values on the webpage
                document.getElementById('ph-value').textContent = data.ph;
                document.getElementById('tds-value').textContent = data.tds;
                document.getElementById('temperature-value').textContent = data.temperature;
            })
            .catch(error => console.error('Error fetching data:', error));
    }

    // Fetch data every 1 second
    setInterval(fetchSensorData, 1000);
    fetchSensorData(); // Fetch data immediately on page load
    </script>
</body>

</html>