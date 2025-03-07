Based on the code provided, here are some suggestions for optimizing the HTML and PHP files:

**HTML File (`index.html`)**

Create a new file named `index.html` with the following content:
```html
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Survey Form</title>
    <link rel="stylesheet" href="style.css"> <!-- link to your CSS file -->
</head>
<body>
    <form id="survey-form">
        <!-- form fields will be generated dynamically using PHP -->
    </form>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.1.15/dist/sweetalert2.all.min.js"></script> <!-- include SweetAlert library -->
</body>
</html>
```
**PHP File (`submit.php`)**

Create a new file named `submit.php` with the following content:
```php
<?php
// database connection settings
$conn = mysqli_connect("localhost", "username", "password", "database");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// sanitize and retrieve POST data
$scheme = mysqli_real_escape_string($conn, $_POST['scheme']);
$project = mysqli_real_escape_string($conn, $_POST['project']);
$month = mysqli_real_escape_string($conn, $_POST['month']);
$year = mysqli_real_escape_string($conn, $_POST['year']);
$pregnant = mysqli_real_escape_string($conn, $_POST['pregnant']);
$tt1eligible = mysqli_real_escape_string($conn, $_POST['tt1eligible']);
$tt1achieve = mysqli_real_escape_string($conn, $_POST['tt1achieve']);
$tt2eligible = mysqli_real_escape_string($conn, $_POST['tt2eligible']);
$tt2achieve = mysqli_real_escape_string($conn, $_POST['tt2achieve']);
$boostereligible = mysqli_real_escape_string($conn, $_POST['boostereligible']);
$boosterachieve = mysqli_real_escape_string($conn, $_POST['boosterachieve']);

// insert data query
$query = "INSERT INTO `1_immunization`(`schemename`, `district`, `block`, `sector`, `month`, `projectName`, `reg_preg_women`, `tt1_target`, `tt1_achieved`, `tt2_target`, `tt2_achieved`, `ttbooster_target`, `ttboster_achieved`, `submittedBy`, `submittedOn`, `forYear`, `submitedID`) VALUES 
            ('$scheme', '$district', '$block', '$sector', '$month', '$project', '$pregnant', '$tt1eligible', '$tt1achieve', '$tt2eligible', '$tt2achieve', '$boostereligible', '$boosterachieve', '$name', '$date_now', '$year', '$id')";

if (mysqli_query($conn, $query)) {
    unset($_SESSION['ch1']);
    echo "<script> 
        swal({
            icon: 'success',
            title: 'Success',
            text: 'Survey Successfully Added!',
        }).then(function() {
            window.location = 'survey.php';
        });
    </script>";
} else {
    echo "Error: " . mysqli_error($conn);
}

mysqli_close($conn); // close database connection
?>
```
**Linking the PHP File to the HTML**

In your `index.html` file, add a link to the `submit.php` file:
```html
<a href="submit.php">Submit Survey</a>
```
**Optimizing the Code**

To optimize the code, consider the following suggestions:

1. Use prepared statements instead of concatenating user input into SQL queries.
2. Validate and sanitize user input before using it in your code.
3. Use a consistent coding style throughout your files.
4. Consider using a framework or library to simplify your code and improve performance.

Here is an updated version of the `submit.php` file with prepared statements:
```php
<?php
// database connection settings
$conn = new mysqli("localhost", "username", "password", "database");

if (!$conn) {
    die("Connection failed: " . $conn->error);
}

// sanitize and retrieve POST data
$scheme = $_POST['scheme'];
$project = $_POST['project'];
$month = $_POST['month'];
$year = $_POST['year'];
$pregnant = $_POST['pregnant'];
$tt1eligible = $_POST['tt1eligible'];
$tt1achieve = $_POST['tt1achieve'];
$tt2eligible = $_POST['tt2eligible'];
$tt2achieve = $_POST['tt2achieve'];
$boostereligible = $_POST['boostereligible'];
$boosterachieve = $_POST['boosterachieve'];

// prepare insert query
$stmt = $conn->prepare("INSERT INTO `1_immunization`(`schemename`, `district`, `block`, `sector`, `month`, `projectName`, `reg_preg_women`, `tt1_target`, `tt1_achieved`, `tt2_target`, `tt2_achieved`, `ttbooster_target`, `ttboster_achieved`, `submittedBy`, `submittedOn`, `forYear`, `submitedID`) VALUES 
                        (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

$stmt->bind_param("sssssssssss", $scheme, $_SESSION['ch1'], $_POST['district'], $_POST['block'], $_POST['sector'], $_POST['project'], $_POST['pregnant'], $_POST['tt1eligible'], $_POST['tt1achieve'], $_POST['tt2eligible'], $_POST['tt2achieve'], $_POST['boostereligible'], $_POST['boosterachieve']);

if ($stmt->execute()) {
    unset($_SESSION['ch1']);
    echo "<script> 
        swal({
            icon: 'success',
            title: 'Success',
            text: 'Survey Successfully Added!',
        }).then(function() {
            window.location = 'survey.php';
        });
    </script>";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close(); // close database connection
?>
```