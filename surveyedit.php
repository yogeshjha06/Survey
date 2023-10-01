<?php
include('db.php');
if (!isset($_SESSION['is_login'])) {
    header('location: index.php');
    die();
} else {

    $id = $_SESSION['id'];
    //code to fetch all details of user
    $query = "SELECT * FROM tbl_login WHERE id='$id'";
    $stmt = mysqli_query($con, $query);
    $row = mysqli_fetch_array($stmt); {

        $name = $row['officerName'];
        $email = $row['email'];
        $phone = $row['officerMObile'];

        $address = $row['bcode'] . ", " . $row['dcodeb'];
        $designation = $row['designation'];
        $role = $row['urole'];

        $id = $row[0];

        $password = $row['password'];

        $district = $row['dcodeb'];
        $block = $row['bcode'];
        $sector = $row['sector']; //sector name


        $survey_id = $_GET['id'];

    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Survey - Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <link rel="icon" type="image/x-icon" href="assets/img/logo.png">


    <!-- sweet alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="sweetalert2.all.min.js"></script>
    <script src="sweetalert2.min.js"></script>
    <link rel="stylesheet" href="sweetalert2.min.css">
    <script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>
</head>

<body class="sb-nav-fixed">

<?php require('header.php'); ?>

        </div>
        <div id="layoutSidenav_content">
            <main  style="padding: 15px;">
                <!-- start form add new admin -->
                <section class="section">
                    <div class="row">
                        <div class="col-lg-12">

                            <div class="card">
                                <div class="card-body">
                                    <center><h5 class="card-title text-primary">Immunization Survey Edit</h5></center> 

                                    <!-- General Form Elements -->
                                    <form action="#" method="POST">
                         <?php
                         $sql = "SELECT * FROM `1_immunization` WHERE `id` = '$survey_id'";
                            $result = mysqli_query($con, $sql);
                            $row = mysqli_fetch_array($result);
                            $pregnant = $row['reg_preg_women'];
                            $tt1e = $row['tt1_target'];
                            $tt1a = $row['tt1_achieved'];

                            $tt2e = $row['tt2_target'];
                            $tt2a = $row['tt2_achieved'];

                            $boo = $row['ttbooster_target'];
                            $boo1 = $row['ttboster_achieved'];

                         ?>
                                        <div class="row mb-4">
                                            <label for="pregnant" class="col-sm-2 col-form-label">Number of Pregnant Women</label>
                                            <div class="col-sm-10">
                                                <input id="pregnant" name="pregnant" type="number" class="form-control" value="<?php echo$pregnant; ?>" required>
                                            </div>
                                        </div>

                                        <div class="row mb-4">
                                            <h5>Stage One Info</h5>
                                        </div>
                                        <div class="row mb-4">
                                            <label for="tt1eligible" class="col-sm-2 col-form-label">Number of T.T.1 Elligible Women</label>
                                            <div class="col-sm-10">
                                                <input id="tt1eligible" name="tt1eligible" type="number" class="form-control" value="<?php echo$tt1e; ?>"  required>
                                            </div>
                                        </div>

                                        <div class="row mb-4">
                                            <label for="tt1achieve" class="col-sm-2 col-form-label">Number of T.T.1 Achieved Women</label>
                                            <div class="col-sm-10">
                                                <input id="tt1achieve" name="tt1achieve" type="number" class="form-control" value="<?php echo$tt1a; ?>" required>
                                            </div>
                                        </div>

                                        <div class="row mb-4">
                                            <h5>Stage Two Info</h5>
                                        </div>
                                        <div class="row mb-4">
                                            <label for="tt2eligible" class="col-sm-2 col-form-label">Number of T.T.2 Elligible Women</label>
                                            <div class="col-sm-10">
                                                <input id="tt2eligible" name="tt2eligible" type="number" class="form-control" value="<?php echo$tt2e; ?>" required>
                                            </div>
                                        </div>

                                        <div class="row mb-4">
                                            <label for="tt2achieve" class="col-sm-2 col-form-label">Number of T.T.2 Achieved Women</label>
                                            <div class="col-sm-10">
                                                <input id="tt2achieve" name="tt2achieve" type="number" class="form-control" value="<?php echo$tt2a; ?>"  required>
                                            </div>
                                        </div>

                                        <div class="row mb-4">
                                            <h5>Stage Three Info</h5>
                                        </div>
                                        <div class="row mb-4">
                                            <label for="boostereligible" class="col-sm-2 col-form-label">Number of T.T.Booster Elligible Women</label>
                                            <div class="col-sm-10">
                                                <input id="boostereligible" name="boostereligible" type="number" class="form-control" value="<?php echo$boo; ?>" required>
                                            </div>
                                        </div>

                                        <div class="row mb-4">
                                            <label for="boosterachieve" class="col-sm-2 col-form-label">Number of T.T.Booster Achieved Women</label>
                                            <div class="col-sm-10">
                                                <input id="boosterachieve" name="boosterachieve" type="number" class="form-control" value="<?php echo$boo1; ?>" required>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <center>
                                                <div class="col-sm-10">
                                                    <button id="submit" name="submit" type="submit" class="btn btn-outline-primary"><i class="fa-solid fa-floppy-disk"></i>&nbsp;Save</button>
                                                </div>
                                            </center>
                                        </div>

                                    </form><!-- End General Form Elements -->



                                    <?php
                                    if (isset($_POST['submit'])) {
                                        // Sanitize and retrieve the POST data

                                        $pregnant =  $_POST['pregnant'];
                                        $tt1eligible =  $_POST['tt1eligible'];
                                        $tt1achieve =  $_POST['tt1achieve'];
                                        $tt2eligible =  $_POST['tt2eligible'];
                                        $tt2achieve =  $_POST['tt2achieve'];
                                        $boostereligible =  $_POST['boostereligible'];
                                        $boosterachieve =  $_POST['boosterachieve'];
                                                        
                                        date_default_timezone_set("Asia/Calcutta");
                                        $date_now = date("Y-m-d");

                                        //insert data query
                                        $res = mysqli_query($con, "UPDATE `1_immunization` SET `reg_preg_women`='$pregnant',`tt1_target`='$tt1eligible',`tt1_achieved`='$tt1achieve',`tt2_target`='$tt2eligible',`tt2_achieved`='$tt2achieve',`ttbooster_target`='$boostereligible',`ttboster_achieved`='$boosterachieve',`updatedBy`='$name',`updatedOn`='$date_now' WHERE id='$survey_id'");


                                        if ($res) {
                                            //inserted successfully                                            
                                                echo "<script>                
                                                   swal({
                                                       icon: 'success',
                                                       title: 'Success',
                                                       text: 'Survey Successfully Updated!',
                                                       }).then(function() {
                                                           window.location = 'listsurvey.php';
                                                       });                        
                                                       </script>";
                                            } 
                                        else 
                                        {
                                                echo "
                                                   <script>                
                                                       swal({
                                                           icon: 'info',
                                                           title:'Failed',
                                                           text: 'Unable to update survey!',
                                                           }).then(function() {
                                                           window.location = 'listsurvey.php';
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
                <!-- end form -->
            </main>
            

            <?php require('footer.php'); ?>


</body>

</html>