Here's the refactored PHP code with a focus on Object-Oriented Programming (OOP) concepts and added class design to improve professionalism and reusability:

```php
<?php

class Database {
    private $conn;

    public function __construct() {
        $this->conn = new mysqli("localhost", "username", "password", "database");
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    public function query($query) {
        return $this->conn->query($query);
    }

    public function close() {
        $this->conn->close();
    }
}

class SurveyData {
    private $db;
    private $name;

    public function __construct(Database $db, $name) {
        $this->db = $db;
        $this->name = $name;
    }

    public function insertSurveyData($scheme, $district, $block, $sector, $month, $project, $pregnant, $tt1eligible, $tt1achieve, $tt2eligible, $tt2achieve, $boostereligible, $boosterachieve) {
        $query = "INSERT INTO `1_immunization`(`schemename`, `district`, `block`, `sector`, `month`, `projectName`, `reg_preg_women`, `tt1_target`, `tt1_achieved`, `tt2_target`, `tt2_achieved`, `ttbooster_target`, `ttboster_achieved`, `submittedBy`, `submittedOn`, `forYear`, `submitedID`) VALUES 
                   ('$scheme', '$district', '$block', '$sector', '$month', '$project', '$pregnant', '$tt1eligible', '$tt1achieve', '$tt2eligible', '$tt2achieve', '$boostereligible', '$boosterachieve', '$name', NOW(), '$year', '')";

        $result = $this->db->query($query);

        if ($result) {
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
            echo "<script>                
                swal({
                    icon: 'info',
                    title:'Failed',
                    text: 'Unable to add survey!',
                }).then(function() {
                    window.location = 'survey.php';
                });
            </script>";
        }

    }
}

class SurveyController {
    private $db;
    private $name;

    public function __construct(Database $db, $name) {
        $this->db = $db;
        $this->name = $name;
    }

    public function handleSubmission() {
        if (isset($_POST['submit'])) {
            // Sanitize and retrieve the POST data
            $scheme             =  mysqli_real_escape_string($this->db->conn, $_POST['scheme']);
            $project            =  mysqli_real_escape_string($this->db->conn, $_POST['project']);
            $month              =  mysqli_real_escape_string($this->db->conn, $_POST['month']);
            $year               =  mysqli_real_escape_string($this->db->conn, $_POST['year']);
            $pregnant           =  mysqli_real_escape_string($this->db->conn, $_POST['pregnant']);
            $tt1eligible        =  mysqli_real_escape_string($this->db->conn, $_POST['tt1eligible']);
            $tt1achieve         =  mysqli_real_escape_string($this->db->conn, $_POST['tt1achieve']);
            $tt2eligible        =  mysqli_real_escape_string($this->db->conn, $_POST['tt2eligible']);
            $tt2achieve         =  mysqli_real_escape_string($this->db->conn, $_POST['tt2achieve']);
            $boostereligible    =  mysqli_real_escape_string($this->db->conn, $_POST['boostereligible']);
            $boosterachieve     =  mysqli_real_escape_string($this->db->conn, $_POST['boosterachieve']);

            //insert data query
            $surveyData = new SurveyData($this->db, $this->name);
            $surveyData->insertSurveyData($scheme, $_POST['districtSelect'], $_POST['blockSelect'], $_POST['sectorSelect'], $_POST['month'], $_POST['project'], $pregnant, $tt1eligible, $tt1achieve, $tt2eligible, $tt2achieve, $boostereligible, $boosterachieve);
        }
    }
}

// Create a new database instance
$db = new Database();

// Create a new survey controller instance
$surveyController = new SurveyController($db, "Survey Data");

// Handle submission
$surveyController->handleSubmission();
```

In this refactored code:

1.  We created three classes: `Database`, `SurveyData`, and `SurveyController`. Each class has its own responsibility and follows the Single Responsibility Principle (SRP).
2.  The `Database` class encapsulates database-related functionality, including connection establishment and query execution.
3.  The `SurveyData` class handles survey data insertion into the database, encapsulating the logic for inserting survey data while maintaining a connection to the database instance used by the controller.
4.  The `SurveyController` class is responsible for handling submission requests, sanitizing input data, and calling the `insertSurveyData` method of the `SurveyData` class to perform the actual insertion into the database.

These classes promote reusability, maintainability, and separation of concerns in your codebase.