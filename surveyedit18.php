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
                                    
                                <center><h5 class="card-title text-primary">Beneficiary Details (0-3 years) Survey Edit</h5></center> 
                                    <!-- General Form Elements -->
                                    <form action="#" method="POST">
                         <?php
                         $sql = "SELECT * FROM `18_beneficiary` WHERE `id` = '$survey_id'";
                            $result = mysqli_query($con, $sql);
                            $row = mysqli_fetch_array($result);

                                        $opv0           = $row['m1'];
                                        $opv0_done      = $row['f1'];
                                        $opv1           = $row['m2'];
                                        $opv1_done      = $row['f2'];

                                        $opv2           = $row['m3'];
                                        $opv2_done      = $row['f3'];
                                        $opv3           = $row['m4'];
                                        $opv3_done      = $row['f4'];

                                        $opv4           = $row['m5'];
                                        $opv4_done      = $row['f5'];
                                        $opv5           = $row['m6'];
                                        $opv5_done      = $row['f6'];

                                        $opv6           = $row['m7'];
                                        $opv6_done      = $row['f7'];
                                        $opv7           = $row['m8'];
                                        $opv7_done      = $row['f8'];
                         ?>
                                        
                                        <div class="row mb-4">
                                            <h5>Stage One Survey (0-6 Month)</h5>
                                        </div>
                                        <div class="row mb-4">
                                            <label for="opv0" class="col-sm-2 col-form-label">Number of Male As Per Survey Data</label>
                                            <div class="col-sm-10">
                                                <input id="opv0" name="opv0" type="number" class="form-control" value="<?php echo$opv0; ?>"  required>
                                            </div>
                                        </div>

                                        <div class="row mb-4">
                                            <label for="opv0_done" class="col-sm-2 col-form-label">Number of Female As Per Survey Data</label>
                                            <div class="col-sm-10">
                                                <input id="opv0_done" name="opv0_done" type="number" class="form-control" value="<?php echo$opv0_done; ?>"  required>
                                            </div>
                                        </div>


                                        <div class="row mb-4">
                                            <label for="opv1" class="col-sm-2 col-form-label">Number of Male In Anganwadi Center</label>
                                            <div class="col-sm-10">
                                                <input id="opv1" name="opv1" type="number" class="form-control" value="<?php echo$opv1; ?>"  required>
                                            </div>
                                        </div>

                                        <div class="row mb-4">
                                            <label for="opv1_done" class="col-sm-2 col-form-label">Number of Female In Anganwadi Center</label>
                                            <div class="col-sm-10">
                                                <input id="opv1_done" name="opv1_done" type="number" class="form-control" value="<?php echo$opv1_done; ?>"  required>
                                            </div>
                                        </div>



                                        <div class="row mb-4">
                                            <h5>Stage Two Survey (0 Month - 6 Years)</h5>
                                        </div>
                                        <div class="row mb-4">
                                            <label for="opv2" class="col-sm-2 col-form-label">Number of Male As Per Survey Data</label>
                                            <div class="col-sm-10">
                                                <input id="opv2" name="opv2" type="number" class="form-control" value="<?php echo$opv2; ?>"  required>
                                            </div>
                                        </div>

                                        <div class="row mb-4">
                                            <label for="opv2_done" class="col-sm-2 col-form-label">Number of Female As Per Survey Data</label>
                                            <div class="col-sm-10">
                                                <input id="opv2_done" name="opv2_done" type="number" class="form-control" value="<?php echo$opv2_done; ?>"  required>
                                            </div>
                                        </div>

                                        <div class="row mb-4">
                                            <label for="opv3" class="col-sm-2 col-form-label">Number of Male In Anganwadi Center</label>
                                            <div class="col-sm-10">
                                                <input id="opv3" name="opv3" type="number" class="form-control" value="<?php echo$opv3; ?>"  required>
                                            </div>
                                        </div>

                                        <div class="row mb-4">
                                            <label for="opv3_done" class="col-sm-2 col-form-label">Number of Female In Anganwadi Center</label>
                                            <div class="col-sm-10">
                                                <input id="opv3_done" name="opv3_done" type="number" class="form-control" value="<?php echo$opv3_done; ?>"  required>
                                            </div>
                                        </div>




                                        <div class="row mb-4">
                                            <h5>Stage Three Survey (1-2 Years)</h5>
                                        </div>
                                        <div class="row mb-4">
                                            <label for="opv4" class="col-sm-2 col-form-label">Number of Male As Per Survey Data</label>
                                            <div class="col-sm-10">
                                                <input id="opv4" name="opv4" type="number" class="form-control" value="<?php echo$opv4; ?>"  required>
                                            </div>
                                        </div>

                                        <div class="row mb-4">
                                            <label for="opv4_done" class="col-sm-2 col-form-label">Number of Female As Per Survey Data</label>
                                            <div class="col-sm-10">
                                                <input id="opv4_done" name="opv4_done" type="number" class="form-control" value="<?php echo$opv4_done; ?>"  required>
                                            </div>
                                        </div>

                                        <div class="row mb-4">
                                            <label for="opv5" class="col-sm-2 col-form-label">Number of Male In Anganwadi Center</label>
                                            <div class="col-sm-10">
                                                <input id="opv5" name="opv5" type="number" class="form-control" value="<?php echo$opv5; ?>"  required>
                                            </div>
                                        </div>

                                        <div class="row mb-4">
                                            <label for="opv5_done" class="col-sm-2 col-form-label">Number of Female In Anganwadi Center</label>
                                            <div class="col-sm-10">
                                                <input id="opv5_done" name="opv5_done" type="number" class="form-control" value="<?php echo$opv5_done; ?>"  required>
                                            </div>
                                        </div>




                                        <div class="row mb-4">
                                            <h5>Stage Four Survey (2-3 Years)</h5>
                                        </div>
                                        <div class="row mb-4">
                                            <label for="opv6" class="col-sm-2 col-form-label">Number of Male As Per Survey Data</label>
                                            <div class="col-sm-10">
                                                <input id="opv6" name="opv6" type="number" class="form-control" value="<?php echo$opv6; ?>"  required>
                                            </div>
                                        </div>

                                        <div class="row mb-4">
                                            <label for="opv6_done" class="col-sm-2 col-form-label">Number of Female As Per Survey Data</label>
                                            <div class="col-sm-10">
                                                <input id="opv6_done" name="opv6_done" type="number" class="form-control" value="<?php echo$opv6_done; ?>"  required>
                                            </div>
                                        </div>

                                        <div class="row mb-4">
                                            <label for="opv7" class="col-sm-2 col-form-label">Number of Male In Anganwadi Center</label>
                                            <div class="col-sm-10">
                                                <input id="opv7" name="opv7" type="number" class="form-control" value="<?php echo$opv7; ?>"  required>
                                            </div>
                                        </div>

                                        <div class="row mb-4">
                                            <label for="opv7_done" class="col-sm-2 col-form-label">Number of Female In Anganwadi Center</label>
                                            <div class="col-sm-10">
                                                <input id="opv7_done" name="opv7_done" type="number" class="form-control" value="<?php echo$opv7_done; ?>"  required>
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

                                        $opv0       =  $_POST['opv0'];
                                        $opv0_done  =  $_POST['opv0_done'];
                                        $opv1       =  $_POST['opv1'];
                                        $opv1_done  =  $_POST['opv1_done'];

                                        $opv2       =  $_POST['opv2'];
                                        $opv2_done  =  $_POST['opv2_done'];
                                        $opv3       =  $_POST['opv3'];
                                        $opv3_done  =  $_POST['opv3_done'];

                                        $opv4       =  $_POST['opv4'];
                                        $opv4_done  =  $_POST['opv4_done'];
                                        $opv5       =  $_POST['opv5'];
                                        $opv5_done  =  $_POST['opv5_done'];

                                        $opv6       =  $_POST['opv6'];
                                        $opv6_done  =  $_POST['opv6_done'];
                                        $opv7       =  $_POST['opv7'];
                                        $opv7_done  =  $_POST['opv7_done'];
                                                        
                                        date_default_timezone_set("Asia/Calcutta");
                                        $date_now = date("Y-m-d");

                                        //insert data query
                                        $res = mysqli_query($con, "UPDATE `18_beneficiary` SET `m1`='$opv0',`f1`='$opv0_done',`m2`='$opv1',`f2`='$opv1_done',`m3`='$opv2',`f3`='$opv2_done',`m4`='$opv3',`f4`='$opv3_done',`m5`='$opv4',`f5`='$opv4_done',`m6`='$opv5',`f6`='$opv5_done',`m7`='$opv6',`f7`='$opv6_done',`m8`='$opv7',`f8`='$opv7_done',`date`='$date_now' WHERE `id`='$survey_id'");


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