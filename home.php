<?php
include 'db.php';
session_start();
if ($_SESSION['status_login'] != true) {
  echo '<script>window.location="login.php"</script>';
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Simontar</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/logo-qt1.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
    rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!--ajax -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="assets/js/ajax.js"></script>
  <!-- Panggil file AJAX eksternal -->

</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="home.php" class="logo d-flex align-items-center">
        <span class="d-none d-lg-block">Simontar</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->


    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">


        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="users-profile.php"
            data-bs-toggle="dropdown">
            <img src="assets/img/user.jpg" alt="Profile" class="rounded-circle">
            <span
              class="d-none d-md-block dropdown-toggle ps-2"><?php echo isset($_SESSION['nama']) ? $_SESSION['nama'] : 'Guest'; ?></span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6><?php echo isset($_SESSION['nama']) ? $_SESSION['nama'] : 'Guest'; ?></h6>
              <span><?php echo isset($_SESSION['prodi']) ? $_SESSION['prodi'] : 'Unknown Department'; ?></span>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="users-profile.php">
                <i class="bi bi-person"></i>
                <span>My Profile</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="users-profile.php">
                <i class="bi bi-gear"></i>
                <span>Account Settings</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="#">
                <i class="bi bi-question-circle"></i>
                <span>Need Help?</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="logout.php">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="home.php">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>Database</span><i
            class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="data.php">
              <i class="bi bi-circle"></i><span>Data Sensor</span>
            </a>
          </li>
        </ul>
      </li><!-- End Components Nav -->
      <li class="nav-heading">Pages</li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="logout.php">
          <i class="bi bi-box-arrow-right"></i>
          <span>Sign Out</span>
        </a>
      </li><!-- End Login Page Nav -->
    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="home.php">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
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
                  <h6>
                    <?php
                    // Query to get the latest PH value
                    $query = mysqli_query($conn, "SELECT ph_value FROM sensor_data ORDER BY id DESC LIMIT 1");
                    if ($query && mysqli_num_rows($query) > 0) {
                      $row = mysqli_fetch_assoc($query);
                      echo $row['ph_value'];
                    } else {
                      echo "No Data";
                    }
                    ?>
                  </h6>
                </div>
              </div>
            </div>
          </div>
        </div><!-- End PH Container -->

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
                  <h6>
                    <?php
                    // Query to get the latest TDS value
                    $query = mysqli_query($conn, "SELECT tds_value FROM sensor_data ORDER BY id DESC LIMIT 1");
                    if ($query && mysqli_num_rows($query) > 0) {
                      $row = mysqli_fetch_assoc($query);
                      echo $row['tds_value'];
                    } else {
                      echo "No Data";
                    }
                    ?>
                  </h6>
                </div>
              </div>
            </div>
          </div>
        </div><!-- End TDS Container -->

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
                  <h6>
                    <?php
                    // Query to get the latest Temperature value
                    $query = mysqli_query($conn, "SELECT temperature FROM sensor_data ORDER BY id DESC LIMIT 1");
                    if ($query && mysqli_num_rows($query) > 0) {
                      $row = mysqli_fetch_assoc($query);
                      echo $row['temperature'];
                    } else {
                      echo "No Data";
                    }
                    ?>
                  </h6>
                </div>
              </div>
            </div>
          </div>
        </div><!-- End Temperature Container -->
        <!-- Container for Water Quality using Fuzzy Logic Sugeno -->
        <div class="col-lg-12">
          <div class="card info-card" style="border-radius: 20px; text-align: center;">
            <div class="card-body">
              <div class="d-flex flex-column align-items-center">
                <!-- Ganti gambar dengan ikon baru atau gambar -->
                <div
                  class="icon-container rounded-circle d-flex align-items-center justify-content-center mb-3">
                  <img src="assets/img/Screenshot__529_-removebg-preview.png" alt="Water Quality Icon"
                    style="width: 120px; height: 120px;">
                </div>
                <div>
                  <h5 style="font-weight: bold; font-size: 1.5rem;">Water Quality</h5>
                  <h6 style="font-size: 1.2rem;">
                    <?php
                    // Query to get the latest sensor data
                    $query = mysqli_query($conn, "SELECT * FROM sensor_data ORDER BY id DESC LIMIT 1");
                    if ($query && mysqli_num_rows($query) > 0) {
                      $row = mysqli_fetch_assoc($query);
                      $ph_value = $row['ph_value'];
                      $tds_value = $row['tds_value'];
                      $temperature = $row['temperature'];

                      echo "pH Value: " . $ph_value . "<br>";
                      echo "TDS Value: " . $tds_value . " ppm<br>";
                      echo "Temperature: " . $temperature . " °C<br><br>";

                      // Fuzzy Membership Functions
                      function low_ph($ph)
                      {
                        if ($ph <= 6.5) return 1;
                        if ($ph > 6.5 && $ph < 7.0) return (7.0 - $ph) / 0.5;
                        return 0;
                      }
                      function normal_ph($ph)
                      {
                        if ($ph > 6.5 && $ph < 7.5) {
                          if ($ph <= 7.0) return ($ph - 6.5) / 0.5;
                          return (7.5 - $ph) / 0.5;
                        }
                        return 0;
                      }
                      function high_ph($ph)
                      {
                        if ($ph >= 8.5) return 1;
                        if ($ph > 7.5 && $ph < 8.5) return ($ph - 7.5) / 1.0;
                        return 0;
                      }

                      function low_tds($tds)
                      {
                        if ($tds <= 300) return 1;
                        if ($tds > 300 && $tds < 500) return (500 - $tds) / 200;
                        return 0;
                      }
                      function normal_tds($tds)
                      {
                        if ($tds > 300 && $tds < 1000) {
                          if ($tds <= 500) return ($tds - 300) / 200;
                          return (1000 - $tds) / 500;
                        }
                        return 0;
                      }
                      function high_tds($tds)
                      {
                        if ($tds >= 1000) return 1;
                        if ($tds > 500 && $tds < 1000) return ($tds - 500) / 500;
                        return 0;
                      }

                      function low_temp($temp)
                      {
                        if ($temp <= 20) return 1;
                        if ($temp > 20 && $temp < 25) return (25 - $temp) / 5;
                        return 0;
                      }
                      function normal_temp($temp)
                      {
                        if ($temp > 20 && $temp < 30) {
                          if ($temp <= 25) return ($temp - 20) / 5;
                          return (30 - $temp) / 5;
                        }
                        return 0;
                      }
                      function high_temp($temp)
                      {
                        if ($temp >= 30) return 1;
                        if ($temp > 25 && $temp < 30) return ($temp - 25) / 5;
                        return 0;
                      }

                      // Fuzzy Rules
                      $low_ph = low_ph($ph_value);
                      $normal_ph = normal_ph($ph_value);
                      $high_ph = high_ph($ph_value);

                      $low_tds = low_tds($tds_value);
                      $normal_tds = normal_tds($tds_value);
                      $high_tds = high_tds($tds_value);

                      $low_temp = low_temp($temperature);
                      $normal_temp = normal_temp($temperature);
                      $high_temp = high_temp($temperature);

                      // Sugeno Rules (Weighted Outputs)
                      $rule1 = min($low_ph, $low_tds, $low_temp) * 2; // Poor quality
                      $rule2 = min($normal_ph, $normal_tds, $normal_temp) * 4; // Good quality
                      $rule3 = min($high_ph, $high_tds, $high_temp) * 1; // Bad quality

                      // Aggregation and Defuzzification
                      $numerator = $rule1 + $rule2 + $rule3;
                      $denominator = $low_ph + $normal_ph + $high_ph + $low_tds + $normal_tds + $high_tds + $low_temp + $normal_temp + $high_temp;

                      $result = $denominator == 0 ? "No Data" : $numerator / ($low_ph + $normal_ph + $high_ph);

                      // Display Result
                      if ($result < 2.5) {
                        echo "Overall Quality: baik (Score: $result)";
                      } elseif ($result >= 2.5 && $result < 3.5) {
                        echo "Overall Quality: Sedang (Score: $result)";
                      } else {
                        echo "Overall Quality: buruk (Score: $result)";
                      }
                    } else {
                      echo "No Data";
                    }
                    ?>

                  </h6>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- End Water Quality Container -->

        <!-- pembaruan chart-->
        <section class="section dashboard">
          <div class="row">

            <!-- PH Chart -->
            <div class="col-lg-4">
              <div class="card" style="border-radius: 20px;">
                <div class="card-body">
                  <h5 class="card-title">pH Chart</h5>
                  <canvas id="phChart"></canvas>
                </div>
              </div>
            </div><!-- End PH Chart -->

            <!-- TDS Chart -->
            <div class="col-lg-4">
              <div class="card" style="border-radius: 20px;">
                <div class="card-body">
                  <h5 class="card-title">TDS Chart</h5>
                  <canvas id="tdsChart"></canvas>
                </div>
              </div>
            </div><!-- End TDS Chart -->

            <!-- Temperature Chart -->
            <div class="col-lg-4">
              <div class="card" style="border-radius: 20px;">
                <div class="card-body">
                  <h5 class="card-title">Temperature Chart</h5>
                  <canvas id="temperatureChart"></canvas>
                </div>
              </div>
            </div><!-- End Temperature Chart -->

          </div>
        </section>

        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
          // Fetch data from PHP for the charts
          <?php
          // Query for last 50 rows (order DESC and limit 50)
          $query = mysqli_query($conn, "SELECT * FROM sensor_data ORDER BY id DESC LIMIT 10");
          $phData = [];
          $tdsData = [];
          $temperatureData = [];
          $timestamps = [];

          if ($query && mysqli_num_rows($query) > 0) {
            while ($row = mysqli_fetch_assoc($query)) {
              array_unshift($phData, $row['ph_value']); // Add data to the beginning of array
              array_unshift($tdsData, $row['tds_value']);
              array_unshift($temperatureData, $row['temperature']);
              array_unshift($timestamps, $row['timestamp']); // Assuming there is a timestamp column
            }
          }
          ?>

          // Data from PHP
          const phData = <?php echo json_encode($phData); ?>;
          const tdsData = <?php echo json_encode($tdsData); ?>;
          const temperatureData = <?php echo json_encode($temperatureData); ?>;
          const timestamps = <?php echo json_encode($timestamps); ?>;

          // Chart configuration
          const config = (ctx, label, data, color) => ({
            type: 'line',
            data: {
              labels: timestamps,
              datasets: [{
                label: label,
                data: data,
                borderColor: color,
                backgroundColor: color + '33', // Light transparent background
                fill: true,
                tension: 0.4
              }]
            },
            options: {
              responsive: true,
              scales: {
                x: {
                  title: {
                    display: true,
                    text: 'Timestamp'
                  }
                },
                y: {
                  title: {
                    display: true,
                    text: label
                  }
                }
              }
            }
          });

          // Create charts
          new Chart(document.getElementById('phChart'), config('phChart', 'pH Value', phData, 'orange'));
          new Chart(document.getElementById('tdsChart'), config('tdsChart', 'TDS Value', tdsData, 'blue'));
          new Chart(document.getElementById('temperatureChart'), config('temperatureChart', 'Temperature (°C)',
            temperatureData, 'red'));
        </script>

        <!--end chart-->

      </div>
    </section>


  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>Simontar</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      Designed with ❤</a>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>