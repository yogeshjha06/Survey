Here is the code with all HTML elements removed:

```php
<?php
if (isset($_POST['submit'])) {
    $scheme             =  mysqli_real_escape_string($con, $_POST['scheme']);
    $project            =  mysqli_real_escape_string($con, $_POST['project']);
    $month              =  mysqli_real_escape_string($con, $_POST['month']);
    $year               =  mysqli_real_escape_string($con, $_POST['year']);
    $pregnant           =  mysqli_real_escape_string($con, $_POST['pregnant']);
    $tt1eligible        =  mysqli_real_escape_string($con, $_POST['tt1eligible']);
    $tt1achieve         =  mysqli_real_escape_string($con, $_POST['tt1achieve']);
    $tt2eligible        =  mysqli_real_escape_string($con, $_POST['tt2eligible']);
    $tt2achieve         =  mysqli_real_escape_string($con, $_POST['tt2achieve']);
    $boostereligible    =  mysqli_real_escape_string($con, $_POST['boostereligible']);
    $boosterachieve     =  mysqli_real_escape_string($con, $_POST['boosterachieve']);

    $district1 =  $_POST['districtSelect'];
    $block1 =  $_POST['blockSelect'];
    $sector1 =  $_POST['sectorSelect'];

    date_default_timezone_set("Asia/Calcutta");
    $date_now = date("Y-m-d");

    //insert data query
    $res = mysqli_query($con, "INSERT INTO `1_immunization`(`schemename`, `district`, `block`, `sector`, `month`, `projectName`, `reg_preg_women`, `tt1_target`, `tt1_achieved`, `tt2_target`, `tt2_achieved`, `ttbooster_target`, `ttboster_achieved`, `submittedBy`, `submittedOn`, `forYear`, `submitedID`) VALUES 
    ('$scheme', '$district1', '$block1', '$sector1', '$month', '$project', '$pregnant', '$tt1eligible', '$tt1achieve', '$tt2eligible', '$tt2achieve', '$boostereligible', '$boosterachieve', '$name', '$date_now', '$year', '$id')");

    if ($res) {
        unset($_SESSION['ch1']);
        //inserted successfully            
            echo "Survey Successfully Added!";
    } 
    else 
    {
        echo "Unable to add survey!";
    }
}
?>
```