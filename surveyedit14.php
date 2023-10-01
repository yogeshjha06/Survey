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
                                    
                                <center><h5 class="card-title text-primary">SNP Survey Edit</h5></center> 
                                    <!-- General Form Elements -->
                                    <form action="#" method="POST">
                         <?php
                         $sql = "SELECT * FROM `14_snp` WHERE `id` = '$survey_id'";
                            $result = mysqli_query($con, $sql);
                            $row = mysqli_fetch_array($result);

                                        $opv0           = $row['chld1'];
                                        $opv0_done      = $row['child1_done'];

                                        $opv1           = $row['child2'];
                                        $opv1_done      = $row['child2_done'];

                                        $opv2           = $row['women1'];
                                        $opv2_done      = $row['women1_done'];

                                        $opv3           = $row['women2'];
                                        $opv3_done      = $row['women2_done'];
                         ?>
                                        
                                        <div class="row mb-4">
                                            <h5>Stage One Survey</h5>
                                        </div>
                                        <div class="row mb-4">
                                            <label for="opv0" class="col-sm-2 col-form-label">Children Enroll (3-6 years) (Target)</label>
                                            <div class="col-sm-10">
                                                <input id="opv0" name="opv0" type="number" class="form-control" value="<?php echo$opv0; ?>"  required>
                                            </div>
                                        </div>

                                        <div class="row mb-4">
                                            <label for="opv0_done" class="col-sm-2 col-form-label">Children HCM (Achivement)</label>
                                            <div class="col-sm-10">
                                                <input id="opv0_done" name="opv0_done" type="number" class="form-control" value="<?php echo$opv0_done; ?>"  required>
                                            </div>
                                        </div>


                                        <div class="row mb-4">
                                            <label for="opv1" class="col-sm-2 col-form-label">Children Enroll (6-3 years) (Target)</label>
                                            <div class="col-sm-10">
                                                <input id="opv1" name="opv1" type="number" class="form-control" value="<?php echo$opv1; ?>"  required>
                                            </div>
                                        </div>

                                        <div class="row mb-4">
                                            <label for="opv1_done" class="col-sm-2 col-form-label">Children THR (Achivement)</label>
                                            <div class="col-sm-10">
                                                <input id="opv1_done" name="opv1_done" type="number" class="form-control" value="<?php echo$opv1_done; ?>"  required>
                                            </div>
                                        </div>


                                        <div class="row mb-4">
                                            <h5>Stage Two Survey</h5>
                                        </div>


                                        <div class="row mb-4">
                                            <label for="opv2" class="col-sm-2 col-form-label">Pregnant Women Enroll (Target)</label>
                                            <div class="col-sm-10">
                                                <input id="opv2" name="opv2" type="number" class="form-control" value="<?php echo$opv2; ?>"  required>
                                            </div>
                                        </div>

                                        <div class="row mb-4">
                                            <label for="opv2_done" class="col-sm-2 col-form-label">Pregnant Women THR (Achivement)</label>
                                            <div class="col-sm-10">
                                                <input id="opv2_done" name="opv2_done" type="number" class="form-control" value="<?php echo$opv2_done; ?>"  required>
                                            </div>
                                        </div>


                                        <div class="row mb-4">
                                            <label for="opv3" class="col-sm-2 col-form-label">Nursing Mother (Target)</label>
                                            <div class="col-sm-10">
                                                <input id="opv3" name="opv3" type="number" class="form-control" value="<?php echo$opv3; ?>"  required>
                                            </div>
                                        </div>

                                        <div class="row mb-4">
                                            <label for="opv3_done" class="col-sm-2 col-form-label">Nursing Mother THR (Achivement)</label>
                                            <div class="col-sm-10">
                                                <input id="opv3_done" name="opv3_done" type="number" class="form-control" value="<?php echo$opv3_done; ?>"  required>
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
                                                        
                                        date_default_timezone_set("Asia/Calcutta");
                                        $date_now = date("Y-m-d");

                                        //insert data query
                                        $res = mysqli_query($con, "UPDATE `14_snp` SET `chld1`='$opv0',`child1_done`='$opv0_done',`child2`='$opv1',`child2_done`='$opv1_done',`women1`='$opv2',`women1_done`='$opv2_done',`women2`='$opv3',`women2_done`='$opv3_done',`date`='$date_now' WHERE `id`='$survey_id'");


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