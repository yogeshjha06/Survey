<?php
include('db.php');
if (!isset($_SESSION['is_login'])) {
    header('location: index.php');
    die();
} else {
ob_start();
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
                                    <h5 class="card-title">Survey Master</h5>

                                    <!-- General Form Elements -->
                                    <form method="post">

                                        <div class="row mb-3">
                                            <label class="col-sm-2 col-form-label">Survey Type</label>
                                            <div class="col-sm-10">
                                                <select id="survey" name="survey" class="form-select" aria-label="Default select example" required>
                                                    <option value="" disabled selected>Select Type </option>
                                                    <option value="t1">T.T 1, T.T 2 & T.T Booster Survey</option>
                                                    <option value="anc">ANC Survey</option>
                                                    <option value="delivery">Institutional Delivery Survey</option>
                                                    <option value="bcg">BCG Survey</option>
                                                    <option value="opv">OPV- 0 at birth, OPV- 1 at , 2 & 3 Survey</option>
                                                    <option value="penta">PENTA 1, 2 & 3 Survey</option>
                                                    <option value="rota">Rota Virus- 1, 2 & 3 Survey</option>
                                                    <option value="pcv">PCV-1, 2 & Booster Survey</option>
                                                    <option value="ipv">IPV- 1 & 2 Survey</option>
                                                    <option value="mr">MR, JE & Vit. A Survey</option>
                                                    <option value="full">Full Imunization Survey</option>
                                                    <option value="child">Child Birth Status Survey</option>
                                                    <option value="bd">Birth and Death Certificate Survey</option>
                                                    <option value="vhsnd">VHSND Survey</option>
                                                    <option value="snp">SNP Survey</option>
                                                    <option value="mal">Mal Nutritions Survey</option>
                                                    <option value="mtc">MTC Survey</option>
                                                    <option value="ifa">IFA Survey</option>
                                                    <option value="03">Beneficiary 0-3 yrs Survey</option>
                                                    <option value="36">Beneficiary  3-6 yrs Survey</option>
                                                    <option value="adol">Beneficiary Adolscent Survey</option>
                                                    <option value="infrastructure">Infrastructure Survey</option>
                                                </select>
                                            </div>
                                        </div>







                                        <div class="row mb-4">
                                            <h5>Basic Info</h5>
                                        </div>
                                        <div class="row mb-4">
                                            <label for="date" class="col-sm-2 col-form-label">Date of Survey</label>
                                            <div class="col-sm-10">
                                                <input id="date" name="date" type="date" class="form-control" required>
                                            </div>
                                        </div>

                                        <div class="row mb-4">
                                            <label for="name" class="col-sm-2 col-form-label">Surveyor Name </label>
                                            <div class="col-sm-10">
                                                <input id="name" name="name" type="text" class="form-control" required>
                                            </div>
                                        </div>



                                        <div class="row mb-3">
                                            <center>
                                                <div class="col-sm-10">
                                                    <button id="ok1" name="ok1" type="submit" class="btn btn-outline-primary"><i class="fa-solid fa-solid- fa-forward"></i>&nbsp;Next</button>
                                                </div>
                                            </center>
                                        </div>

                                    </form><!-- End General Form Elements -->



                                    <?php
                                    if (isset($_POST['ok1'])) 
                                    {
                                        ob_clean();
                                        ob_flush();
                                        // Sanitize and retrieve the POST data
                                        $survey1 =  mysqli_real_escape_string($con, $_POST['survey']);
                                        // $date1   =  mysqli_real_escape_string($con, $_POST['date']);
                                        // $name1   =  mysqli_real_escape_string($con, $_POST['name']);
                                            if($survey1=="t1")
                                                {
                                                    $_SESSION['ch1']=true;
                                                    header("location: 01imu.php");                                                    
                                                }                                                
                                            elseif ($survey1=="anc")
                                                {
                                                    $_SESSION['ch2']=true;
                                                    header("location: 02anc.php");
                                                }
                                            elseif ($survey1=="delivery")
                                                {
                                                    $_SESSION['ch3']=true;
                                                    header("location: 03delivery.php");
                                                }
                                            
                                            elseif ($survey1=="bcg")
                                                {
                                                    $_SESSION['ch4']=true;
                                                    header("location: 04bcg.php");
                                                }
                                            elseif ($survey1=="opv")
                                                {
                                                    $_SESSION['ch5']=true;
                                                    header("location: 05opv.php");
                                                }
                                            elseif ($survey1=="penta")
                                                {
                                                    $_SESSION['ch6']=true;
                                                    header("location: 06penta.php");
                                                }
                                            elseif ($survey1=="rota")
                                                {
                                                    $_SESSION['ch7']=true;
                                                    header("location: 07rota.php");
                                                }                                            
                                            elseif ($survey1=="pcv")
                                                {
                                                    $_SESSION['ch8']=true;
                                                    header("location: 08pcv.php");
                                                }
                                            elseif ($survey1=="ipv")
                                                {
                                                    $_SESSION['ch9']=true;
                                                    header("location: 09ipv.php");
                                                }
                                            elseif ($survey1=="mr")
                                                {
                                                    $_SESSION['ch10']=true;
                                                    header("location: 10mr.php");
                                                }
                                            elseif ($survey1=="full")
                                                {
                                                    $_SESSION['ch11']=true;
                                                    header("location: 11full.php");
                                                }                                            
                                            elseif ($survey1=="child")
                                                {
                                                    $_SESSION['ch12']=true;
                                                    header("location: 12child.php");
                                                }
                                            elseif ($survey1=="bd")
                                                {
                                                    $_SESSION['ch13']=true;
                                                    header("location: 13bd.php");
                                                }
                                            elseif ($survey1=="vhsnd")
                                                {
                                                    $_SESSION['ch14']=true;
                                                    header("location: 14vhsnd.php");
                                                }
                                            elseif ($survey1=="snp")
                                                {
                                                    $_SESSION['ch15']=true;
                                                    header("location: 15snp.php");
                                                }                                            
                                            elseif ($survey1=="mal")
                                                {
                                                    $_SESSION['ch16']=true;
                                                    header("location: 16mal.php");
                                                }
                                            elseif ($survey1=="mtc")
                                                {
                                                    $_SESSION['ch17']=true;
                                                    header("location: 17mtc.php");
                                                }
                                            elseif ($survey1=="ifa")
                                                {
                                                    $_SESSION['ch18']=true;
                                                    header("location: 18ifa.php");
                                                }
                                            elseif ($survey1=="03")
                                                {
                                                    $_SESSION['ch19']=true;
                                                    header("location: 19three.php");
                                                }
                                            elseif ($survey1=="36")
                                                {
                                                    $_SESSION['ch20']=true;
                                                    header("location: 20six.php");
                                                }                                            
                                            elseif ($survey1=="adol")
                                                {
                                                    $_SESSION['ch21']=true;
                                                    header("location: 21adol.php");
                                                }
                                            elseif ($survey1=="infrastructure")
                                                {
                                                    $_SESSION['ch22']=true;
                                                    header("location: 22infra.php");
                                                }
                                            else 
                                                {
                                                        echo "
                                                           <script>                
                                                               swal({
                                                                   icon: 'info',
                                                                   title:'Failed',
                                                                   text: 'Invalid Request, Please try again!',
                                                                   }).then(function() {
                                                                   window.location = 'survey.php';
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