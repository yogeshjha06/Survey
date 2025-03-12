Here's how you can structure your code:

**PHP File (e.g., `config.php` or `survey.php`)**

```php
<?php

// Configuration and database connection
$conn = mysqli_connect("your_host", "your_username", "your_password", "your_database");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Sanitize and retrieve the POST data
$scheme             =  mysqli_real_escape_string($conn, $_POST['scheme']);
$project            =  mysqli_real_escape_string($conn, $_POST['project']);
$month              =  mysqli_real_escape_string($conn, $_POST['month']);
$year               =  mysqli_real_escape_string($conn, $_POST['year']);
$pregnant           =  mysqli_real_escape_string($conn, $_POST['pregnant']);
$tt1eligible        =  mysqli_real_escape_string($conn, $_POST['tt1eligible']);
$tt1achieve         =  mysqli_real_escape_string($conn, $_POST['tt1achieve']);
$tt2eligible        =  mysqli_real_escape_string($conn, $_POST['tt2eligible']);
$tt2achieve         =  mysqli_real_escape_string($conn, $_POST['tt2achieve']);
$boostereligible    =  mysqli_real_escape_string($conn, $_POST['boostereligible']);
$boosterachieve     =  mysqli_real_escape_string($conn, $_POST['boosterachieve']);

// Fetch district, block, and sector from POST data
$district1 =  $_POST['districtSelect'];
$block1 =  $_POST['blockSelect'];
$sector1 =  $_POST['sectorSelect'];

// Insert data query
$res = mysqli_query($conn, "INSERT INTO `1_immunization`(`schemename`, `district`, `block`, `sector`, `month`, `projectName`, `reg_preg_women`, `tt1_target`, `tt1_achieved`, `tt2_target`, `tt2_achieved`, `ttbooster_target`, `ttboster_achieved`, `submittedBy`, `submittedOn`, `forYear`, `submitedID`) VALUES 
('$scheme', '$district1', '$block1', '$sector1', '$month', '$project', '$pregnant', '$tt1eligible', '$tt1achieve', '$tt2eligible', '$tt2achieve', '$boostereligible', '$boosterachieve', '$name', '$date_now', '$year', '$id')");

// Close database connection
mysqli_close($conn);

?>
```

**HTML File (e.g., `index.php` or `o1imu.html`)**

```html
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Immunization Survey</title>
    <link rel="stylesheet" href="styles.css"> <!-- Import CSS file -->
</head>
<body>
    <div class="container">
        <form id="survey-form">
            <h2>Immunization Survey</h2>
            <label for="scheme">Scheme:</label>
            <input type="text" id="scheme" name="scheme"><br><br>
            <label for="project">Project:</label>
            <input type="text" id="project" name="project"><br><br>
            <label for="month">Month:</label>
            <select id="month" name="month">
                <option value="">Select Month</option>
                <option value="January">January</option>
                <option value="February">February</option>
                <!-- Add more months as needed -->
            </select><br><br>
            <label for="year">Year:</label>
            <input type="number" id="year" name="year"><br><br>
            <label for="pregnant">Pregnant:</label>
            <input type="text" id="pregnant" name="pregnant"><br><br>
            <!-- Other fields (tt1eligible, tt1achieve, etc.) -->
            <button type="submit" id="submit">Save</button>
        </form>
    </div>

    <?php
    include 'survey.php'; // Include PHP file with survey logic
    ?>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script> <!-- Import SweetAlert library -->
    <script>
        swal({
            icon: 'success',
            title: 'Success',
            text: 'Survey Successfully Added!',
        }).then(function() {
            window.location = 'survey.php';
        });
    </script>

    <div class="bottom-footer">
        <?php require('footer.php'); ?>
    </div>
</body>
</html>
```

**footer.php**

```php
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Immunization Survey</title>
    <link rel="stylesheet" href="styles.css"> <!-- Import CSS file -->
</head>
<body>
    <!-- Footer content here -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script> <!-- Import SweetAlert library -->
    <script>
        swal({
            icon: 'success',
            title: 'Success',
            text: 'Survey Successfully Added!',
        }).then(function() {
            window.location = 'survey.php';
        });
    </script>
</body>
</html>
```

Note that this is just a basic structure, and you'll need to modify the PHP file (`survey.php`) to fit your specific survey logic. You'll also need to create a CSS file (`styles.css`) for styling purposes.

This way, the survey logic and database connection are handled by a separate PHP file, while the HTML file contains the user interface. The SweetAlert library is used to display a success message after submitting the form.