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
                                    
                                <center><h5 class="card-title text-primary">MTC Survey Edit</h5></center> 
                                    <!-- General Form Elements -->
                                    <form action="#" method="POST">
                         <?php
                         $sql = "SELECT * FROM `16_mtc` WHERE `id` = '$survey_id'";
                            $result = mysqli_query($con, $sql);
                            $row = mysqli_fetch_array($result);

                                        $opv0           = $row['name_mtc'];
                                        $opv0_done      = $row['total_bed'];
                                        $opv1           = $row['occupied_bed'];
                         ?>
                                        
                                        <div class="row mb-4">
                                            <h5>Stage One Survey</h5>
                                        </div>
                                        <div class="row mb-4">
                                            <label for="opv0" class="col-sm-2 col-form-label">MTC Name</label>
                                            <div class="col-sm-10">
                                                <input id="opv0" name="opv0" type="text" class="form-control" value="<?php echo$opv0; ?>"  required>
                                            </div>
                                        </div>

                                        <div class="row mb-4">
                                            <label for="opv0_done" class="col-sm-2 col-form-label">Total Bed</label>
                                            <div class="col-sm-10">
                                                <input id="opv0_done" name="opv0_done" type="number" class="form-control" value="<?php echo$opv0_done; ?>"  required>
                                            </div>
                                        </div>


                                        <div class="row mb-4">
                                            <label for="opv1" class="col-sm-2 col-form-label">Total Bed Occupied</label>
                                            <div class="col-sm-10">
                                                <input id="opv1" name="opv1" type="number" class="form-control" value="<?php echo$opv1; ?>"  required>
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

                                        $opv0       =  mysqli_real_escape_string($con, $_POST['opv0']);
                                        $opv0_done  =  $_POST['opv0_done'];
                                        $opv1       =  $_POST['opv1'];                                        
                                                        
                                        date_default_timezone_set("Asia/Calcutta");
                                        $date_now = date("Y-m-d");

                                        //insert data query
                                        $res = mysqli_query($con, "UPDATE `16_mtc` SET `name_mtc`='$opv0',`total_bed`='$opv0_done',`occupied_bed`='$opv1',`date`='$date_now' WHERE `id`='$survey_id'");


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