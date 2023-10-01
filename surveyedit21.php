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
                                    
                                <center><h5 class="card-title text-primary">Infrastructure Details Survey Edit</h5></center> 
                                    <!-- General Form Elements -->
                                    <form action="#" method="POST">
                         <?php
                            $sql = "SELECT * FROM `21_infra` WHERE `id` = '$survey_id'";
                            $result = mysqli_query($con, $sql);
                            $row = mysqli_fetch_array($result);

                                        $opv1      = $row['total_awc'];
                                        $opv2      = $row['gov_building'];
                                        $opv3      = $row['rent_building'];
                                        $opv4      = $row['other_rent'];

                                        $opv5      = $row['school'];
                                        $opv6      = $row['panchyat'];
                                        $opv7      = $row['open_area'];
                                        $opv8      = $row['water'];

                                        $opv9      = $row['toilet'];
                                        $opv10     = $row['rain_water'];
                                        $opv11     = $row['electricity'];
                         ?>
                                        
                                        <div class="row mb-4">
                                            <h5>Stage One Survey</h5>
                                        </div>
                                        <div class="row mb-4">
                                            <label for="opv1" class="col-sm-2 col-form-label">Number of AWC</label>
                                            <div class="col-sm-10">
                                                <input id="opv1" value="<?php echo$opv1; ?>" placeholder="Enter Number" name="opv1" type="number" class="form-control" required>
                                            </div>
                                        </div>

                                        <div class="row mb-4">
                                            <label for="opv2" class="col-sm-2 col-form-label">Number of Government Building</label>
                                            <div class="col-sm-10">
                                                <input id="opv2" value="<?php echo$opv2; ?>" placeholder="Enter Number" name="opv2" type="number" class="form-control" required>
                                            </div>
                                        </div>   
                                        
                                        
                                        <div class="row mb-4">
                                            <label for="opv3" class="col-sm-2 col-form-label">Number of Rented AWH/AWW Building</label>
                                            <div class="col-sm-10">
                                                <input id="opv3" value="<?php echo$opv3; ?>" placeholder="Enter Number" name="opv3" type="number" class="form-control" required>
                                            </div>
                                        </div>

                                        <div class="row mb-4">
                                            <label for="opv4" class="col-sm-2 col-form-label">Number of Rented AWH/AWW Building (Other)</label>
                                            <div class="col-sm-10">
                                                <input id="opv4" value="<?php echo$opv4; ?>" placeholder="Enter Number" name="opv4" type="number" class="form-control" required>
                                            </div>
                                        </div>

                                        <div class="row mb-4">
                                            <h5>Stage Two Survey</h5>
                                        </div>
                                        <div class="row mb-4">
                                            <label for="opv5" class="col-sm-2 col-form-label">School</label>
                                            <div class="col-sm-10">
                                                <input id="opv5" value="<?php echo$opv5; ?>" placeholder="Enter Number" name="opv5" type="number" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <label for="opv6" class="col-sm-2 col-form-label">Group/Panchyat (Other)</label>
                                            <div class="col-sm-10">
                                                <input id="opv6" value="<?php echo$opv6; ?>" placeholder="Enter Number" name="opv6" type="number" class="form-control" required>
                                            </div>
                                        </div>

                                        <div class="row mb-4">
                                            <label for="opv7" class="col-sm-2 col-form-label">Open Area</label>
                                            <div class="col-sm-10">
                                                <input id="opv7" value="<?php echo$opv7; ?>" placeholder="Enter Number" name="opv7" type="number" class="form-control" required>
                                            </div>
                                        </div>


                                        <div class="row mb-4">
                                            <h5>Stage Three Survey</h5>
                                        </div>

                                        <div class="row mb-4">
                                            <label for="opv8" class="col-sm-2 col-form-label">Drinking Water Zone</label>
                                            <div class="col-sm-10">
                                                <input id="opv8" value="<?php echo$opv8; ?>" placeholder="Enter Number" name="opv8" type="number" class="form-control" required>
                                            </div>
                                        </div>

                                        <div class="row mb-4">
                                            <label for="opv9" class="col-sm-2 col-form-label">Toilet</label>
                                            <div class="col-sm-10">
                                                <input id="opv9" value="<?php echo$opv9; ?>" placeholder="Enter Number" name="opv9" type="number" class="form-control" required>
                                            </div>
                                        </div>

                                        <div class="row mb-4">
                                            <label for="opv10" class="col-sm-2 col-form-label">Rain Water Hearvesting</label>
                                            <div class="col-sm-10">
                                                <input id="opv10" value="<?php echo$opv10; ?>" placeholder="Enter Number" name="opv10" type="number" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <label for="opv11" class="col-sm-2 col-form-label">Power Supply</label>
                                            <div class="col-sm-10">
                                                <input id="opv11" value="<?php echo$opv11; ?>" placeholder="Enter Number" name="opv11" type="number" class="form-control" required>
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

                                        $opv1       =  $_POST['opv1'];
                                        $opv2       =  $_POST['opv2'];
                                        $opv3       =  $_POST['opv3'];
                                        $opv4       =  $_POST['opv4'];

                                        $opv5       =  $_POST['opv5'];
                                        $opv6       =  $_POST['opv6'];
                                        $opv7       =  $_POST['opv7'];
                                        $opv8       =  $_POST['opv8'];

                                        $opv9       =  $_POST['opv9'];
                                        $opv10      =  $_POST['opv10'];
                                        $opv11      =  $_POST['opv11'];


                                                        
                                        date_default_timezone_set("Asia/Calcutta");
                                        $date_now = date("Y-m-d");

                                        //insert data query
                                        $res = mysqli_query($con, "UPDATE `21_infra` SET `total_awc`='$opv1',`gov_building`='$opv2',`rent_building`='$opv3',`other_rent`='$opv4',`school`='$opv5',`panchyat`='$opv6',`open_area`='$opv7',`water`='$opv8',`toilet`='$opv9',`rain_water`='$opv10',`electricity`='$opv11',`date`='$date_now' WHERE `id`='$survey_id'");


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