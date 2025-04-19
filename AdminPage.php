<?php

include 'config.php';
session_start();

if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
} 

$dept = isset($_POST['dept']) ? $_POST['dept'] : 'null';
$batch = isset($_POST['batch']) ? $_POST['batch'] : '0';
$table = $dept . $batch;

// Check if the CSV export is requested
if (isset($_GET['export_csv']) && $_GET['export_csv'] === 'true') {
    $checkTableQuery = "SHOW TABLES LIKE '$table'";
    $tableExists = $con->query($checkTableQuery)->num_rows > 0;

    if ($table === 'null0') {
        // Do not show alert on page refresh
    } else {
        if (!$tableExists) {
            $_SESSION['alert'] = 'No Table Found';
            // Redirect to avoid CSV output
            header("Location: AdminPage.php"); // Adjust the filename as needed
            exit;
        } else {
            $sql = "SELECT * FROM $table";
            $result = $con->query($sql);

            if ($result->num_rows > 0) {
                header('Content-Type: text/csv');
                header("Content-Disposition: attachment; filename=\"$table.csv\"");

                $csv_file = fopen('php://output', 'w');

                // Output column headers
                $row = $result->fetch_assoc();
                fputcsv($csv_file, array_keys($row));

                // Output data rows
                fputcsv($csv_file, $row);
                while ($row = $result->fetch_assoc()) {
                    fputcsv($csv_file, $row);
                }

                fclose($csv_file);
                exit;
            } else {
                $_SESSION['alert'] = 'No data found.';
                // Redirect to avoid CSV output
                header("Location: AdminPage.php"); // Adjust the filename as needed
                exit;
            }
        }
    }
}

// Show alert if set in the session
if (isset($_SESSION['alert'])) {
    echo "<script>alert('" . $_SESSION['alert'] . "');</script>";
    unset($_SESSION['alert']); // Clear the alert after displaying it
}
?>



<html>
<link
      rel="shortcut icon"
      href="./assets/images/Logo 1.avif"
      type="image/x-icon"
    />
<link rel="stylesheet" href=".\admin.css">
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
      crossorigin="anonymous"
    />
<body><nav class="navbar navbar-expand-lg bg-body-white border">
      <div class="container">
        <a href="#" class="navbar-brand mx-auto mx-md-0">
          <img
            src="assets\images\kce.png"
            class="mb-2 navbar-logo mb-sm-0"
            alt="Karpagam College Logo"
          />
        </a>
      </div>
    </nav>


    <center>
    <form method="POST" action="">
        <div class="justify-content-center">
                <h4>Alumni Feedback Report</h4>
                <div class="my-3">
                    <b>Select Dept: &ensp;</b>
                </div>
                <select name="dept" class='form-select'>   
                    <option value="IT">IT</option>
                    <option value="AD">AI&DS</option>
                    <option value="CE">Civil</option>
                    <option value="CD">CSD</option>
                    <option value="CS">CSE</option>
                    <option value="CT">CST</option>
                    <option value="CY">Cyber Security</option>
                    <option value="EC">ECE</option>
                    <option value="EE">EEE</option>
                    <option value="ET">ETE</option>
                    <option value="ME">Mech</option>
                </select>
            </div>
            <br>
            <br>
            <div class="my-3">
                <b>Select Batch: &ensp;</b>
            </div>
            <select name="batch" class='form-select' onchange="this.form.submit()">
                    <option value="2023">2019 - 2023</option>
                    <option value="2024">2020 - 2024</option>
                    <option value="2025">2021 - 2025</option>
                    <option value="2026">2022 - 2026</option>
                    <option value="2027">2023 - 2027</option>
            </select>
            <br><br>
            <button type="submit" name="submit" class="btn btn-primary"  formaction="?export_csv=true">Export to CSV</button>
        </div>
    </form>
    </center>
</body>
</html>
