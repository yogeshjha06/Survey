<?php
session_start();
include('db.php');

// Enhanced session validation with exit()
if (!isset($_SESSION['is_login'])) {
    header('location: index.php');
    exit();
}

if (!isset($_SESSION['ch1'])) {
    header('location: survey.php');
    exit();
}

// CSRF Token Generation
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}
$csrf_token = $_SESSION['csrf_token'];

// User data fetch with prepared statement
$id = $_SESSION['id'];
$query = "SELECT * FROM tbl_login WHERE id = ?";
$stmt = mysqli_prepare($con, $query);
mysqli_stmt_bind_param($stmt, 'i', $id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if (!$row = mysqli_fetch_assoc($result)) {
    session_destroy();
    header('location: index.php');
    exit();
}

// Assign user data to variables
extract($row, EXTR_PREFIX_ALL, 'user');

// Close statement
mysqli_stmt_close($stmt);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="Immunization Survey Management System" />
    <meta name="author" content="" />
    <title>Survey - Admin</title>
    
    <!-- Consolidated CSS and JS imports -->
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <link rel="icon" type="image/x-icon" href="assets/img/logo.png">
    
    <!-- Single SweetAlert import -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="sb-nav-fixed">
    <?php require('header.php'); ?>

    <div id="layoutSidenav_content">
        <main class="container-fluid px-4">
            <section class="section">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card shadow">
                            <div class="card-body">
                                <h5 class="card-title mb-4">Immunization Survey</h5>

                                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" id="surveyForm">
                                    <input type="hidden" name="csrf_token" value="<?php echo $csrf_token; ?>">

                                    <!-- Form Fields -->
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label">Scheme</label>
                                        <div class="col-sm-10">
                                            <select id="scheme" name="scheme" class="form-select" required>
                                                <option value="" disabled selected>Select Scheme</option>
                                                <?php
                                                $query = "SELECT * FROM tbl_scheme WHERE status='0'";
                                                $result = mysqli_query($con, $query);
                                                while ($row = mysqli_fetch_assoc($result)) {
                                                    echo "<option value='" . htmlspecialchars($row['scheme']) . "'>" . htmlspecialchars($row['scheme']) . "</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>

                                    <!-- Other form elements with similar structure... -->

                                    <div class="row mb-4">
                                        <label for="year" class="col-sm-2 col-form-label">Year</label>
                                        <div class="col-sm-10">
                                            <input id="year" name="year" type="number" 
                                                   class="form-control" min="2000" max="<?php echo date('Y') + 5; ?>" 
                                                   required>
                                        </div>
                                    </div>

                                    <!-- Additional form fields with proper validation... -->

                                    <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-4">
                                        <button type="reset" class="btn btn-outline-secondary">Reset</button>
                                        <button type="submit" name="submit" class="btn btn-primary">
                                            <i class="fas fa-save me-2"></i>Save
                                        </button>
                                    </div>
                                </form>

                                <?php
                                if (isset($_POST['submit'])) {
                                    // CSRF Validation
                                    if (!hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'])) {
                                        die("CSRF token validation failed");
                                    }

                                    // Input validation and sanitization
                                    $required_fields = [
                                        'scheme', 'project', 'month', 'year', 'pregnant',
                                        'tt1eligible', 'tt1achieve', 'tt2eligible', 
                                        'tt2achieve', 'boostereligible', 'boosterachieve',
                                        'districtSelect', 'blockSelect', 'sectorSelect'
                                    ];

                                    foreach ($required_fields as $field) {
                                        if (empty($_POST[$field])) {
                                            die("Required field $field is missing");
                                        }
                                    }

                                    // Sanitize inputs
                                    $inputs = array_map(function($field) use ($con) {
                                        return mysqli_real_escape_string($con, $_POST[$field]);
                                    }, array_combine($required_fields, $required_fields));

                                    // Check for duplicate entry
                                    $check_query = "SELECT id FROM 1_immunization 
                                                  WHERE district = ? 
                                                  AND block = ? 
                                                  AND sector = ? 
                                                  AND month = ? 
                                                  AND forYear = ?";
                                    $stmt = mysqli_prepare($con, $check_query);
                                    mysqli_stmt_bind_param($stmt, 'sssss', 
                                        $inputs['districtSelect'], 
                                        $inputs['blockSelect'], 
                                        $inputs['sectorSelect'], 
                                        $inputs['month'], 
                                        $inputs['year']
                                    );
                                    mysqli_stmt_execute($stmt);
                                    mysqli_stmt_store_result($stmt);

                                    if (mysqli_stmt_num_rows($stmt) > 0) {
                                        echo "<script>
                                            Swal.fire('Error', 'Entry for this sector and period already exists!', 'error');
                                        </script>";
                                        exit();
                                    }

                                    // Insert with prepared statement
                                    $insert_query = "INSERT INTO 1_immunization (...) VALUES (...)";
                                    $stmt = mysqli_prepare($con, $insert_query);
                                    // Bind parameters appropriately...

                                    if (mysqli_stmt_execute($stmt)) {
                                        unset($_SESSION['ch1']);
                                        echo "<script>
                                            Swal.fire({
                                                icon: 'success',
                                                title: 'Success',
                                                text: 'Survey submitted successfully!'
                                            }).then(() => {
                                                window.location.href = 'survey.php';
                                            });
                                        </script>";
                                    } else {
                                        error_log("Database error: " . mysqli_error($con));
                                        echo "<script>
                                            Swal.fire({
                                                icon: 'error',
                                                title: 'Error',
                                                text: 'Failed to submit survey. Please try again.'
                                            });
                                        </script>";
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
        <?php require('footer.php'); ?>
    </div>

    <!-- Enhanced JavaScript with error handling -->
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Dynamic dropdown handling with error messages
        const handleDropdown = async (url, params, target) => {
            try {
                const response = await fetch(`${url}?${new URLSearchParams(params)}`);
                if (!response.ok) throw new Error('Network response was not ok');
                
                const data = await response.json();
                target.innerHTML = '<option disabled selected>Select...</option>';
                data.forEach(item => {
                    const option = document.createElement('option');
                    option.value = item.value;
                    option.textContent = item.text;
                    target.appendChild(option);
                });
            } catch (error) {
                console.error('Error:', error);
                Swal.fire('Error', 'Failed to load data. Please try again.', 'error');
            }
        };

        // Event listeners for dynamic dropdowns...
    });

    // Form validation
    document.getElementById('surveyForm').addEventListener('submit', function(e) {
        const year = document.getElementById('year').value;
        const currentYear = new Date().getFullYear();
        
        if (year < 2000 || year > currentYear + 5) {
            e.preventDefault();
            Swal.fire('Invalid Year', 'Please enter a valid year between 2000 and ' + (currentYear + 5), 'warning');
        }
    });
    </script>
</body>
</html>
