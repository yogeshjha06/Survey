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
                                <center><h5 class="card-title text-primary">BCG Survey Edit</h5></center> 

                                    <!-- General Form Elements -->
                                    <form action="#" method="POST">
                         <?php
                         $sql = "SELECT * FROM `03_bcg` WHERE `id` = '$survey_id'";
                            $result = mysqli_query($con, $sql);
                            $row = mysqli_fetch_array($result);

                            $anc1       = $row['bcg1'];
                            $anc1_done  = $row['bcg2'];

                         ?>
                                        
                                        <div class="row mb-4">
                                            <h5>Edit BCG Survey</h5>
                                        </div>
                                        <div class="row mb-4">
                                            <label for="anc1" class="col-sm-2 col-form-label">BCG (Target)</label>
                                            <div class="col-sm-10">
                                                <input id="anc1" name="anc1" type="number" class="form-control" value="<?php echo$anc1; ?>"  required>
                                            </div>
                                        </div>

                                        <div class="row mb-4">
                                            <label for="anc1_done" class="col-sm-2 col-form-label">BCG (Achived)</label>
                                            <div class="col-sm-10">
                                                <input id="anc1_done" name="anc1_done" type="number" class="form-control" value="<?php echo$anc1_done; ?>"  required>
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

                                        $anc1       =  $_POST['anc1'];
                                        $anc1_done  =  $_POST['anc1_done'];
                                                        
                                        date_default_timezone_set("Asia/Calcutta");
                                        $date_now = date("Y-m-d");

                                        //insert data query
                                        $res = mysqli_query($con, "UPDATE `03_bcg` SET `bcg1`='$anc1',`bcg2`='$anc1_done',`date`='$date_now' WHERE `id`='$survey_id'");


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