<?php
session_start();
require_once 'db.php'; // Use require_once to prevent multiple inclusions

// Check sessions and redirects first
if (!isset($_SESSION['is_login'])) {
    header('Location: index.php');
    exit();
}

if (!isset($_SESSION['ch21'])) {
    header('Location: survey.php');
    exit();
}

// Database connection
if (!$con) {
    die("Database connection failed: " . mysqli_connect_error());
}

// Fetch user data using prepared statement
$user = [];
$id = $_SESSION['id'];
$query = "SELECT officerName, email, officerMobile, bcode, dcodeb, designation, urole, sector, password 
          FROM tbl_login WHERE id = ?";
$stmt = mysqli_prepare($con, $query);
mysqli_stmt_bind_param($stmt, 'i', $id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if ($row = mysqli_fetch_assoc($result)) {
    $user = $row;
    $address = $row['bcode'] . ", " . $row['dcodeb'];
    $district = $row['dcodeb'];
    $block = $row['bcode'];
    $sector = $row['sector'];
} else {
    // Handle case where user doesn't exist
    session_destroy();
    header('Location: index.php');
    exit();
}

// Process form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    // Validate and sanitize inputs
    $required_fields = [
        'scheme', 'project', 'month', 
        'opv1', 'opv2', 'opv3', 'opv4',
        'districtSelect', 'blockSelect', 'sectorSelect'
    ];
    
    foreach ($required_fields as $field) {
        if (empty($_POST[$field])) {
            die("Required field $field is missing");
        }
    }

    // Prepare statement for insertion
    $insert_query = "INSERT INTO 20_beneficiary_adol 
        (project, scheme, month, district, block, sector, m1, f1, m2, f2, date, submitted, submitedID)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    
    $stmt = mysqli_prepare($con, $insert_query);
    
    // Bind parameters
    $date_now = date("Y-m-d");
    mysqli_stmt_bind_param(
        $stmt,
        'ssssssiiiisss',
        $_POST['project'],
        $_POST['scheme'],
        $_POST['month'],
        $_POST['districtSelect'],
        $_POST['blockSelect'],
        $_POST['sectorSelect'],
        $_POST['opv1'],
        $_POST['opv2'],
        $_POST['opv3'],
        $_POST['opv4'],
        $date_now,
        $user['officerName'],
        $id
    );

    if (mysqli_stmt_execute($stmt)) {
        unset($_SESSION['ch21']);
        echo "<script>
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: 'Survey Successfully Added!'
            }).then(() => window.location = 'survey.php');
        </script>";
        exit();
    } else {
        error_log("Database error: " . mysqli_error($con));
        echo "<script>
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Failed to save survey!'
            });
        </script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Survey - Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <link rel="icon" type="image/x-icon" href="assets/img/logo.png">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="sb-nav-fixed">
    <?php require('header.php'); ?>

    <div id="layoutSidenav_content">
        <main style="padding: 15px;">
            <section class="section">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Beneficiary Details Adolescent Survey</h5>

                                <form method="POST">
                                    <!-- Scheme Dropdown -->
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label">Scheme</label>
                                        <div class="col-sm-10">
                                            <select id="scheme" name="scheme" class="form-select" required>
                                                <option value="" disabled selected>Select Scheme</option>
                                                <?php
                                                $schemes = mysqli_query($con, "SELECT scheme FROM tbl_scheme WHERE status='0'");
                                                while ($scheme = mysqli_fetch_column($schemes)) {
                                                    echo "<option value='$scheme'>$scheme</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>

                                    <!-- Project Dropdown -->
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label">Project</label>
                                        <div class="col-sm-10">
                                            <select id="project" name="project" class="form-select" required>
                                                <option value="" disabled selected>Select Project</option>
                                                <?php
                                                $projects = mysqli_query($con, "SELECT project FROM tbl_project WHERE status='0'");
                                                while ($project = mysqli_fetch_column($projects)) {
                                                    echo "<option value='$project'>$project</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>

                                    <!-- Dynamic Dropdowns -->
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label">District</label>
                                        <div class="col-sm-10">
                                            <select id="districtSelect" name="districtSelect" class="form-select" required>
                                                <option disabled value="" selected>Select District</option>
                                                <?php
                                                $districts = mysqli_query($con, "SELECT district_code, district_name FROM tbl_district");
                                                while ($district = mysqli_fetch_assoc($districts)) {
                                                    echo "<option value='{$district['district_code']}'>{$district['district_name']}</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>

                                    <!-- Remaining form elements... -->

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
        <?php require('footer.php'); ?>
    </div>

    <script>
        // Optimized dropdown handling
        const handleDropdown = async (url, target, param) => {
            try {
                const response = await fetch(`${url}?${param}`);
                if (!response.ok) throw new Error('Network response was not ok');
                
                const data = await response.json();
                target.innerHTML = data.reduce((acc, item) => 
                    acc + `<option value="${item.value}">${item.text}</option>`, 
                    '<option disabled selected>Select...</option>'
                );
            } catch (error) {
                console.error('Error:', error);
                target.innerHTML = '<option>Error loading options</option>';
            }
        };

        document.getElementById('districtSelect').addEventListener('change', function() {
            const blockSelect = document.getElementById('blockSelect');
            handleDropdown(
                'get_blocks.php',
                blockSelect,
                `district_code=${this.value}`
            );
        });

        document.getElementById('blockSelect').addEventListener('change', function() {
            const sectorSelect = document.getElementById('sectorSelect');
            handleDropdown(
                'get_sectors.php',
                sectorSelect,
                `district_code=${document.getElementById('districtSelect').value}&block_code=${this.value}`
            );
        });
    </script>
</body>
</html>
